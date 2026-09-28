@extends('admin.layout')

@section('title', 'Ubah Konten — BPM FTD')

@section('content')
<div class="mx-auto max-w-3xl rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm md:p-8">
    <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-emerald-800 hover:underline">← Kembali ke Panel</a>
    <h1 class="mt-5 text-3xl font-black">Ubah Program / Pengumuman</h1>
    <form method="POST" action="{{ route('admin.cards.update', $siteCard) }}" class="mt-6 grid gap-5 md:grid-cols-2">
        @csrf
        @method('PUT')
        <div>
            <label for="section" class="mb-1.5 block text-sm font-semibold text-slate-700">Tampilkan di bagian</label>
            <select id="section" name="section" required class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
                <option value="program" @selected(old('section', $siteCard->section) === 'program')>Program Kerja HMP</option>
                <option value="news" @selected(old('section', $siteCard->section) === 'news')>Berita &amp; Pengumuman</option>
            </select>
        </div>
        <div>
            <label for="label" class="mb-1.5 block text-sm font-semibold text-slate-700">Label / nama HMP</label>
            <input id="label" name="label" required maxlength="120" value="{{ old('label', $siteCard->label) }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div class="md:col-span-2">
            <label for="title" class="mb-1.5 block text-sm font-semibold text-slate-700">Judul</label>
            <input id="title" name="title" required maxlength="200" value="{{ old('title', $siteCard->title) }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div class="md:col-span-2">
            <label for="description" class="mb-1.5 block text-sm font-semibold text-slate-700">Deskripsi</label>
            <textarea id="description" name="description" required maxlength="2000" rows="5" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">{{ old('description', $siteCard->description) }}</textarea>
        </div>
        <div>
            <label for="pic_name" class="mb-1.5 block text-sm font-semibold text-slate-700">PIC pendamping <span class="font-normal text-emerald-700">(opsional)</span></label>
            <input id="pic_name" name="pic_name" maxlength="120" value="{{ old('pic_name', $siteCard->pic_name) }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="action_label" class="mb-1.5 block text-sm font-semibold text-slate-700">Teks tombol</label>
            <input id="action_label" name="action_label" maxlength="120" value="{{ old('action_label', $siteCard->action_label) }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div class="md:col-span-2">
            <label for="action_url" class="mb-1.5 block text-sm font-semibold text-slate-700">Tautan tombol <span class="font-normal text-emerald-700">(opsional)</span></label>
            <input id="action_url" name="action_url" type="url" maxlength="2048" value="{{ old('action_url', $siteCard->action_url) }}" placeholder="https://..." class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
        </div>
        <div class="md:col-span-2">
            <button class="rounded-xl bg-emerald-800 px-5 py-3 font-bold text-white shadow-md transition hover:bg-emerald-900">Simpan Konten</button>
        </div>
    </form>
</div>
@endsection
