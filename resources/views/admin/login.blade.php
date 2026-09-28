@extends('admin.layout')

@section('title', 'Login Admin — BPM FTD')

@section('content')
<div class="mx-auto max-w-md overflow-hidden rounded-3xl border border-emerald-100 bg-white shadow-xl shadow-emerald-950/10">
    <div class="bg-gradient-to-br from-emerald-900 to-emerald-700 px-8 py-8 text-white">
        <p class="text-xs font-bold uppercase tracking-[.2em] text-emerald-200">Area Pengelola</p>
        <h1 class="mt-2 text-3xl font-black">Login Admin</h1>
        <p class="mt-2 text-sm text-emerald-50/90">Masuk untuk mengelola konten website BPM FTD.</p>
    </div>
    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5 p-8">
        @csrf
        <div>
            <label for="nim" class="mb-1.5 block text-sm font-semibold text-slate-700">NIM</label>
            <input id="nim" name="nim" type="text" inputmode="numeric" autocomplete="username" required value="{{ old('nim') }}" class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none transition focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>
        <div>
            <label for="password" class="mb-1.5 block text-sm font-semibold text-slate-700">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required class="w-full rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none transition focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>
        <button type="submit" class="w-full rounded-xl bg-emerald-800 px-5 py-3.5 font-bold text-white shadow-lg shadow-emerald-900/20 transition hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-200">Masuk ke Panel</button>
        <a href="{{ route('home') }}" class="block text-center text-sm font-medium text-emerald-800 hover:underline">Kembali ke Beranda</a>
    </form>
</div>
@endsection
