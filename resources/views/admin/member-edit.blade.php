@extends('admin.layout')

@section('title', 'Ubah Profil Anggota — BPM FTD')

@section('content')
<div class="mx-auto max-w-2xl rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm md:p-8">
    <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-emerald-800 hover:underline">← Kembali ke Panel</a>
    <h1 class="mt-5 text-3xl font-black">Ubah Profil Anggota</h1>
    <p class="mt-2 text-slate-600">Perbarui nama, jabatan, atau foto anggota.</p>

    @if($member->photo_path)
        <img src="{{ asset('uploads/profiles/'.$member->photo_path) }}" alt="Foto {{ $member->name }}" class="mt-6 aspect-[2/3] max-h-72 rounded-2xl object-cover">
    @else
        <div class="mt-6 flex aspect-[2/3] max-h-72 w-56 items-center justify-center rounded-2xl bg-emerald-100 text-5xl font-black text-emerald-900">{{ mb_substr($member->name, 0, 1) }}</div>
    @endif

    <form method="POST" action="{{ route('admin.members.update', $member) }}" enctype="multipart/form-data" class="mt-6 space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="mb-1.5 block text-sm font-semibold text-slate-700">Nama lengkap</label>
            <input id="name" name="name" required maxlength="100" value="{{ old('name', $member->name) }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="position" class="mb-1.5 block text-sm font-semibold text-slate-700">Jabatan</label>
            <input id="position" name="position" required maxlength="100" value="{{ old('position', $member->position) }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="tier" class="mb-1.5 block text-sm font-semibold text-slate-700">Tingkatan</label>
            <select id="tier" name="tier" required class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                @foreach(\App\Models\Member::TIERS as $tierKey => $tier)
                    <option value="{{ $tierKey }}" @selected(old('tier', $member->tier) === $tierKey)>{{ $tier['label'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="photo" class="mb-1.5 block text-sm font-semibold text-slate-700">Ganti foto <span class="font-normal text-emerald-700">(opsional)</span></label>
            <input id="photo" name="photo" type="file" accept="image/jpeg,image/png,image/webp" class="block w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-3 py-2.5 text-sm file:mr-3 file:rounded-lg file:border-0 file:bg-emerald-100 file:px-3 file:py-2 file:font-semibold file:text-emerald-800">
            <p class="mt-1 text-xs text-slate-500">JPG, PNG, atau WEBP; maksimal 8 MB. Kosongkan bila tidak mengganti foto.</p>
        </div>
        <button type="submit" class="rounded-xl bg-emerald-800 px-5 py-3 font-bold text-white shadow-md transition hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-200">Simpan Perubahan</button>
    </form>
</div>
@endsection
