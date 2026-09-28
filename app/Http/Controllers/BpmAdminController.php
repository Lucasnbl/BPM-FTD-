<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use App\Models\Member;
use App\Models\SiteCard;
use App\Models\Suggestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BpmAdminController extends Controller
{
    public function showLogin(Request $request): View|RedirectResponse
    {
        if ($request->session()->get('bpm_admin_authenticated', false)) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'nim' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $expectedNim = (string) config('bpm.admin_nim', '');
        $passwordHash = (string) config('bpm.admin_password_hash', '');
        $nimMatches = $expectedNim !== '' && hash_equals($expectedNim, $credentials['nim']);
        $passwordMatches = $passwordHash !== '' && password_verify($credentials['password'], $passwordHash);

        if (! $nimMatches || ! $passwordMatches) {
            return back()
                ->withErrors(['nim' => 'NIM atau password tidak sesuai.'])
                ->onlyInput('nim');
        }

        $request->session()->regenerate();
        $request->session()->put('bpm_admin_authenticated', true);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('bpm_admin_authenticated');
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function dashboard(): View
    {
        $content = HomeContent::first() ?? HomeContent::create([
            'hero_label' => 'Badan Perwakilan Mahasiswa',
            'hero_title' => 'BPM FTD',
            'hero_description' => 'Mewujudkan representasi mahasiswa yang transparan, aspiratif, dan inovatif demi kemajuan Fakultas. Bersinergi bersama membangun pergerakan yang nyata.',
            'profile_intro' => 'Mari berkenalan dengan para pengurus Badan Perwakilan Mahasiswa Fakultas Teknologi dan Desain yang siap mewujudkan aspirasi Anda.',
        ]);

        return view('admin.dashboard', [
            'content' => $content,
            'members' => Member::orderBy('sort_order')->orderBy('id')->get(),
            'profileGroups' => collect(Member::TIERS)->map(function (array $tier, string $key) {
                return [
                    ...$tier,
                    'members' => Member::where('tier', $key)->orderBy('sort_order')->orderBy('id')->get(),
                ];
            }),
            'suggestions' => Suggestion::latest()->limit(50)->get(),
            'siteCards' => SiteCard::orderBy('section')->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function updateHomeContent(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'hero_label' => ['required', 'string', 'max:150'],
            'hero_title' => ['required', 'string', 'max:150'],
            'hero_description' => ['required', 'string', 'max:2000'],
            'profile_intro' => ['required', 'string', 'max:1000'],
        ]);

        $content = HomeContent::first() ?? new HomeContent();
        $content->fill($validated)->save();

        return back()->with('success', 'Konten Beranda berhasil disimpan.');
    }

    public function storeMember(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'tier' => ['required', 'in:'.implode(',', array_keys(Member::TIERS))],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        $tierLimit = Member::TIERS[$validated['tier']]['target'];
        if (Member::where('tier', $validated['tier'])->count() >= $tierLimit) {
            return back()->withErrors([
                'tier' => 'Kuota '.$tierLimit.' anggota untuk '.Member::TIERS[$validated['tier']]['label'].' sudah terpenuhi.',
            ])->withInput();
        }

        Member::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'tier' => $validated['tier'],
            'photo_path' => $request->hasFile('photo') ? $this->savePhoto($request->file('photo')) : null,
            'sort_order' => (Member::where('tier', $validated['tier'])->max('sort_order') ?? 0) + 1,
        ]);

        return back()->with('success', 'Anggota baru berhasil ditambahkan.');
    }

    public function editMember(Member $member): View
    {
        return view('admin.member-edit', compact('member'));
    }

    public function updateMember(Request $request, Member $member): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'tier' => ['required', 'in:'.implode(',', array_keys(Member::TIERS))],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        if ($member->tier !== $validated['tier']) {
            $tierLimit = Member::TIERS[$validated['tier']]['target'];
            if (Member::where('tier', $validated['tier'])->count() >= $tierLimit) {
                return back()->withErrors([
                    'tier' => 'Kuota '.$tierLimit.' anggota untuk '.Member::TIERS[$validated['tier']]['label'].' sudah terpenuhi.',
                ])->withInput();
            }
        }

        $member->fill([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'tier' => $validated['tier'],
        ]);

        if ($member->isDirty('tier')) {
            $member->sort_order = (Member::where('tier', $validated['tier'])->where('id', '<>', $member->getKey())->max('sort_order') ?? 0) + 1;
        }

        if ($request->hasFile('photo')) {
            $previousPhoto = $member->photo_path;
            $member->photo_path = $this->savePhoto($request->file('photo'));
        }

        $member->save();

        if (isset($previousPhoto)) {
            $this->deletePhoto($previousPhoto);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Profil anggota berhasil diperbarui.');
    }

    public function destroyMember(Member $member): RedirectResponse
    {
        $this->deletePhoto($member->photo_path);
        $member->delete();

        return back()->with('success', 'Anggota berhasil dihapus dari profil.');
    }

    public function storeSiteCard(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->siteCardRules());
        $validated['sort_order'] = (SiteCard::where('section', $validated['section'])->max('sort_order') ?? 0) + 1;
        SiteCard::create($validated);

        return back()->with('success', 'Konten berhasil ditambahkan.');
    }

    public function editSiteCard(SiteCard $siteCard): View
    {
        return view('admin.card-edit', compact('siteCard'));
    }

    public function updateSiteCard(Request $request, SiteCard $siteCard): RedirectResponse
    {
        $siteCard->update($request->validate($this->siteCardRules()));

        return redirect()->route('admin.dashboard')->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroySiteCard(SiteCard $siteCard): RedirectResponse
    {
        $siteCard->delete();

        return back()->with('success', 'Konten berhasil dihapus.');
    }

    private function siteCardRules(): array
    {
        return [
            'section' => ['required', 'in:program,news'],
            'label' => ['required', 'string', 'max:120'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:2000'],
            'pic_name' => ['nullable', 'string', 'max:120'],
            'action_label' => ['nullable', 'string', 'max:120'],
            'action_url' => ['nullable', 'url', 'max:2048'],
        ];
    }

    private function savePhoto(\Illuminate\Http\UploadedFile $photo): string
    {
        $directory = public_path('uploads/profiles');
        File::ensureDirectoryExists($directory);

        $filename = Str::uuid().'.'.$photo->extension();
        $photo->move($directory, $filename);

        return $filename;
    }

    private function deletePhoto(?string $filename): void
    {
        if ($filename) {
            File::delete(public_path('uploads/profiles/'.$filename));
        }
    }
}
