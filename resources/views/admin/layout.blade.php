<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin BPM FTD')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { color-scheme: light; }
        html { scroll-behavior: smooth; }
        body { background: linear-gradient(180deg, #e8f3ed 0, #f8fafc 13rem, #f8fafc 100%); }
        input, select, textarea { accent-color: #047857; }
        ::selection { background: #047857; color: #fff; }
    </style>
</head>
<body class="min-h-screen font-sans text-slate-900 antialiased">
    <header class="sticky top-0 z-40 border-b border-white/10 bg-gradient-to-r from-emerald-900 via-emerald-900 to-emerald-800 text-white shadow-lg shadow-emerald-950/10">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-4 md:px-8">
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-200">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/15 bg-white/10 text-sm font-black tracking-tight text-white shadow-inner">BPM</span>
                <span class="leading-tight"><span class="block font-extrabold tracking-wide">BPM FTD</span><span class="mt-0.5 block text-xs font-medium text-emerald-200">Panel Pengelola</span></span>
            </a>
            <div class="flex items-center gap-2 sm:gap-3">
                @if(session('bpm_admin_authenticated'))
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="rounded-xl border border-white/20 px-4 py-2 text-sm font-semibold text-white transition hover:border-white/40 hover:bg-white/10">Keluar</button>
                    </form>
                @endif
            </div>
        </div>
    </header>
    <main class="mx-auto max-w-7xl px-5 py-8 md:px-8 md:py-10">
        @if(session('success'))
            <div class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-white/90 px-5 py-4 text-sm font-medium text-emerald-900 shadow-sm" role="status"><span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-800">✓</span><span>{{ session('success') }}</span></div>
        @endif
        @if($errors->any())
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-900 shadow-sm" role="alert">
                <p class="font-bold">Periksa kembali data yang dimasukkan.</p>
                <ul class="mt-1 list-inside list-disc">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
