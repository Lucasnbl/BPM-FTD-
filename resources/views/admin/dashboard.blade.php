@extends('admin.layout')

@section('title', 'Kelola Website — BPM FTD')

@section('content')
<div class="mb-7 overflow-hidden rounded-3xl border border-emerald-100 bg-gradient-to-br from-white via-white to-emerald-50 shadow-sm shadow-emerald-950/5">
    <div class="flex flex-col justify-between gap-5 p-6 md:flex-row md:items-center md:p-8">
        <div>
            <p class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1 text-xs font-extrabold uppercase tracking-[.16em] text-emerald-800"><span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>Panel Pengelola</p>
            <h1 class="mt-3 text-3xl font-black tracking-tight text-slate-900 md:text-4xl">Kelola Website</h1>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600 md:text-base">Perbarui informasi beranda, susunan anggota, program kerja, dan pengumuman BPM FTD dari satu tempat.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-emerald-800 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-900/15 transition hover:-translate-y-0.5 hover:bg-emerald-900">Lihat Website <span aria-hidden="true">↗</span></a>
    </div>
    <nav aria-label="Navigasi panel" class="flex flex-wrap gap-2 border-t border-emerald-100 bg-emerald-50/60 px-6 py-3 md:px-8">
        <a href="#konten-beranda" class="rounded-lg px-3 py-2 text-sm font-semibold text-emerald-800 transition hover:bg-white">Beranda</a>
        <a href="#anggota-profil" class="rounded-lg px-3 py-2 text-sm font-semibold text-emerald-800 transition hover:bg-white">Anggota</a>
        <a href="#konten-situs" class="rounded-lg px-3 py-2 text-sm font-semibold text-emerald-800 transition hover:bg-white">Program &amp; Berita</a>
        <a href="#saran-masuk" class="rounded-lg px-3 py-2 text-sm font-semibold text-emerald-800 transition hover:bg-white">Saran</a>
    </nav>
</div>

<section id="konten-beranda" class="mb-8 scroll-mt-28 rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm shadow-emerald-950/5 md:p-8">
    <div class="mb-6">
        <h2 class="text-xl font-extrabold">Konten Beranda</h2>
        <p class="mt-1 text-sm text-slate-500">Teks utama yang tampil pada bagian Beranda dan pengantar Profil.</p>
    </div>
    <form method="POST" action="{{ route('admin.home.update') }}" class="grid gap-5 md:grid-cols-2">
        @csrf
        @method('PUT')
        <div>
            <label for="hero_label" class="mb-1.5 block text-sm font-semibold text-slate-700">Label di atas judul</label>
            <input id="hero_label" name="hero_label" required maxlength="150" value="{{ old('hero_label', $content->hero_label) }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="hero_title" class="mb-1.5 block text-sm font-semibold text-slate-700">Judul utama</label>
            <input id="hero_title" name="hero_title" required maxlength="150" value="{{ old('hero_title', $content->hero_title) }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="hero_description" class="mb-1.5 block text-sm font-semibold text-slate-700">Deskripsi Beranda</label>
            <textarea id="hero_description" name="hero_description" rows="4" required maxlength="2000" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">{{ old('hero_description', $content->hero_description) }}</textarea>
        </div>
        <div>
            <label for="profile_intro" class="mb-1.5 block text-sm font-semibold text-slate-700">Pengantar Profil Anggota</label>
            <textarea id="profile_intro" name="profile_intro" rows="4" required maxlength="1000" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">{{ old('profile_intro', $content->profile_intro) }}</textarea>
        </div>
        <div class="md:col-span-2">
            <button class="rounded-xl bg-emerald-800 px-5 py-3 font-bold text-white shadow-md transition hover:bg-emerald-900">Simpan Konten Beranda</button>
        </div>
    </form>
</section>

<section class="mb-8 scroll-mt-28 rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm shadow-emerald-950/5 md:p-8">
    <div class="mb-6">
        <h2 class="text-xl font-extrabold">Tambah Anggota Profil</h2>
        <p class="mt-1 text-sm text-slate-500">Pilih tingkatan untuk menempatkan anggota. Target susunan: BPH 4 orang, Komisi Anggaran 5, Komisi Kemahasiswaan 5, dan Komisi Organisasi 4. Foto opsional, JPG/PNG/WEBP maksimal 8 MB.</p>
    </div>
    <form method="POST" action="{{ route('admin.members.store') }}" enctype="multipart/form-data" class="grid gap-5 md:grid-cols-3">
        @csrf
        <div>
            <label for="new-name" class="mb-1.5 block text-sm font-semibold text-slate-700">Nama lengkap</label>
            <input id="new-name" name="name" required maxlength="100" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="new-position" class="mb-1.5 block text-sm font-semibold text-slate-700">Jabatan</label>
            <input id="new-position" name="position" required maxlength="100" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="new-tier" class="mb-1.5 block text-sm font-semibold text-slate-700">Tingkatan</label>
            <select id="new-tier" name="tier" required class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                @foreach(\App\Models\Member::TIERS as $tierKey => $tier)
                    <option value="{{ $tierKey }}" @selected(old('tier', 'bph') === $tierKey)>{{ $tier['label'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="new-photo" class="mb-1.5 block text-sm font-semibold text-slate-700">Foto</label>
            <input id="new-photo" name="photo" type="file" accept="image/jpeg,image/png,image/webp" class="block w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-3 py-2.5 text-sm file:mr-3 file:rounded-lg file:border-0 file:bg-emerald-100 file:px-3 file:py-2 file:font-semibold file:text-emerald-800">
        </div>
        <div class="md:col-span-3">
            <button type="submit" class="rounded-xl bg-emerald-800 px-5 py-3 font-bold text-white shadow-md transition hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-200">Tambah ke Profil</button>
        </div>
    </form>
</section>

<section id="anggota-profil" class="mb-8 scroll-mt-28 rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm shadow-emerald-950/5 md:p-8">
    <div class="mb-6 flex items-end justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold">Susunan Anggota Profil</h2>
            <p class="mt-1 text-sm text-slate-500">Atur anggota sesuai tingkatannya. Target keseluruhan 18 orang.</p>
        </div>
    </div>
    <div class="space-y-8">
        @foreach($profileGroups as $tierKey => $group)
            <section class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-5">
                <div class="mb-3 flex flex-wrap items-center justify-between gap-2">
                    <div>
                        <h3 class="font-extrabold text-slate-900">{{ $group['label'] }}</h3>
                        <p class="text-sm text-slate-500">{{ $group['subtitle'] }}</p>
                    </div>
                    <span class="rounded-full bg-white px-3 py-1 text-xs font-bold text-emerald-800">{{ $group['members']->count() }} / {{ $group['target'] }} orang</span>
                </div>
                @forelse($group['members'] as $member)
                    <div class="flex flex-wrap items-center gap-4 border-t border-emerald-100 py-4 first:border-0">
                        @if($member->photo_path)
                            <img src="{{ asset('uploads/profiles/'.$member->photo_path) }}" alt="" class="h-14 w-14 rounded-xl object-cover">
                        @else
                            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-100 text-lg font-black text-emerald-800">{{ mb_substr($member->name, 0, 1) }}</div>
                        @endif
                        <div class="min-w-40 flex-1">
                            <p class="font-bold text-slate-900">{{ $member->name }}</p>
                            <p class="text-sm text-emerald-800">{{ $member->position }}</p>
                        </div>
                        <a href="{{ route('admin.members.edit', $member) }}" class="rounded-lg border border-emerald-200 bg-white px-4 py-2 text-sm font-semibold text-emerald-800 hover:bg-emerald-50">Ubah</a>
                        <form method="POST" action="{{ route('admin.members.destroy', $member) }}" onsubmit="return confirm('Hapus anggota ini dari profil?')">
                            @csrf
                            @method('DELETE')
                            <button class="rounded-lg border border-emerald-200 bg-white px-4 py-2 text-sm font-semibold text-emerald-800 hover:bg-emerald-50">Hapus</button>
                        </form>
                    </div>
                @empty
                    <p class="border-t border-emerald-100 pt-4 text-sm text-slate-500">Belum ada anggota di tingkatan ini.</p>
                @endforelse
            </section>
        @endforeach
    </div>
</section>

<section id="konten-situs" class="mb-8 scroll-mt-28 rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm shadow-emerald-950/5 md:p-8">
    <div class="mb-6">
        <h2 class="text-xl font-extrabold">Program Kerja &amp; Berita</h2>
        <p class="mt-1 text-sm text-slate-500">Tambah dan ubah kartu program kerja HMP atau pengumuman yang tampil di halaman utama.</p>
    </div>
    <form method="POST" action="{{ route('admin.cards.store') }}" class="mb-8 grid gap-4 rounded-2xl bg-emerald-50 p-5 md:grid-cols-2">
        @csrf
        <div>
            <label for="card-section" class="mb-1.5 block text-sm font-semibold text-slate-700">Tampilkan di bagian</label>
            <select id="card-section" name="section" required class="w-full rounded-xl border border-emerald-100 bg-white px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
                <option value="program">Program Kerja HMP</option>
                <option value="news">Berita &amp; Pengumuman</option>
            </select>
        </div>
        <div>
            <label for="card-label" class="mb-1.5 block text-sm font-semibold text-slate-700">Label / nama HMP</label>
            <input id="card-label" name="label" required maxlength="120" placeholder="Contoh: HMP Sistem Informasi" class="w-full rounded-xl border border-emerald-100 bg-white px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div class="md:col-span-2">
            <label for="card-title" class="mb-1.5 block text-sm font-semibold text-slate-700">Judul</label>
            <input id="card-title" name="title" required maxlength="200" class="w-full rounded-xl border border-emerald-100 bg-white px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div class="md:col-span-2">
            <label for="card-description" class="mb-1.5 block text-sm font-semibold text-slate-700">Deskripsi</label>
            <textarea id="card-description" name="description" required maxlength="2000" rows="3" class="w-full rounded-xl border border-emerald-100 bg-white px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"></textarea>
        </div>
        <div>
            <label for="card-pic" class="mb-1.5 block text-sm font-semibold text-slate-700">PIC pendamping <span class="font-normal text-emerald-700">(khusus program, opsional)</span></label>
            <input id="card-pic" name="pic_name" maxlength="120" class="w-full rounded-xl border border-emerald-100 bg-white px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="card-action-label" class="mb-1.5 block text-sm font-semibold text-slate-700">Teks tombol</label>
            <input id="card-action-label" name="action_label" maxlength="120" placeholder="Contoh: Lihat informasi" class="w-full rounded-xl border border-emerald-100 bg-white px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div class="md:col-span-2">
            <label for="card-action-url" class="mb-1.5 block text-sm font-semibold text-slate-700">Tautan tombol <span class="font-normal text-emerald-700">(opsional, harus diawali https://)</span></label>
            <input id="card-action-url" name="action_url" type="url" maxlength="2048" placeholder="https://..." class="w-full rounded-xl border border-emerald-100 bg-white px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div class="md:col-span-2">
            <button class="rounded-xl bg-emerald-800 px-5 py-3 font-bold text-white shadow-md transition hover:bg-emerald-900">Tambah Konten</button>
        </div>
    </form>
    @if($siteCards->isEmpty())
        <p class="rounded-xl bg-emerald-50/60 p-5 text-sm text-slate-600">Belum ada kartu program atau berita.</p>
    @else
        <div class="grid gap-4 md:grid-cols-2">
            @foreach($siteCards as $card)
                <article class="rounded-2xl border border-emerald-100 p-5">
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-800">{{ $card->section === 'program' ? 'Program HMP' : 'Berita' }}</span>
                        <a href="{{ route('admin.cards.edit', $card) }}" class="text-sm font-semibold text-emerald-800 hover:underline">Ubah</a>
                    </div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ $card->label }}</p>
                    <h3 class="mt-1 font-bold text-slate-900">{{ $card->title }}</h3>
                    <p class="mt-2 line-clamp-2 text-sm text-slate-600">{{ $card->description }}</p>
                    <form method="POST" action="{{ route('admin.cards.destroy', $card) }}" class="mt-4" onsubmit="return confirm('Hapus konten ini dari halaman utama?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-sm font-semibold text-emerald-800 hover:underline">Hapus konten</button>
                    </form>
                </article>
            @endforeach
        </div>
    @endif
</section>

<section id="saran-masuk" class="scroll-mt-28 rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm shadow-emerald-950/5 md:p-8">
    <div class="mb-6">
        <h2 class="text-xl font-extrabold">Saran Masuk</h2>
        <p class="mt-1 text-sm text-slate-500">Menampilkan hingga 50 saran terbaru yang dikirim secara anonim.</p>
    </div>
    @if($suggestions->isEmpty())
        <p class="rounded-xl bg-emerald-50/60 p-5 text-sm text-slate-600">Belum ada saran yang masuk.</p>
    @else
        <div class="space-y-4">
            @foreach($suggestions as $suggestion)
                <article class="rounded-2xl border border-emerald-100 bg-emerald-50/60 p-5">
                    <div class="mb-3 flex flex-wrap items-center justify-between gap-2">
                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-800">{{ $suggestion->category }}</span>
                        <time class="text-xs text-slate-500" datetime="{{ $suggestion->created_at->toIso8601String() }}">{{ $suggestion->created_at->format('d M Y, H:i') }}</time>
                    </div>
                    <p class="whitespace-pre-line break-words text-sm leading-relaxed text-slate-800">{{ $suggestion->message }}</p>
                </article>
            @endforeach
        </div>
    @endif
</section>
@endsection
