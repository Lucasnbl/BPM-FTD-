<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BPM FTD - Landing Page</title>
    
    <!-- Menggunakan Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Konfigurasi Tema Warna Kustom (Hijau Tua) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bpm-green': {
                            900: '#064e3b', // Hijau tua pekat
                            800: '#065f46',
                            700: '#047857',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Efek untuk background image menggunakan foto asli BPM FTD */
        .bg-hero {
            background-image: url('{{ asset('images/2026_08_29_16_24_06_IMG_7895.JPG') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        #profil {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 38%, #f8fafc 100%);
        }
        #proker {
            background: linear-gradient(180deg, #ffffff 0%, #f7fbf8 48%, #f8fafc 100%);
        }
        #berita {
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 48%, #eaf5ee 100%);
        }
        #connect {
            background: linear-gradient(180deg, #eaf5ee 0%, #0b6049 24%, #064e3b 58%, #043c2f 100%);
        }
        #profil, #proker, #berita, #connect { scroll-margin-top: 6rem; }
        @keyframes scroll-cue {
            0%, 100% { translate: 0 0; }
            50% { translate: 0 12px; }
        }
        .scroll-cue { animation: scroll-cue 1.6s ease-in-out infinite; will-change: translate; }
        @media (prefers-reduced-motion: no-preference) {
            .motion-ready [data-reveal] {
                opacity: 0;
                transform: translate3d(0, 24px, 0);
                transition: opacity 720ms cubic-bezier(.2, .7, .2, 1), transform 720ms cubic-bezier(.2, .7, .2, 1);
                transition-delay: var(--reveal-delay, 0ms);
                will-change: opacity, transform;
            }
            .motion-ready [data-reveal="from-left"] { transform: translate3d(-28px, 0, 0); }
            .motion-ready [data-reveal="from-right"] { transform: translate3d(28px, 0, 0); }
            .motion-ready [data-reveal="from-top"] { transform: translate3d(0, -18px, 0); }
            .motion-ready [data-reveal].is-visible { opacity: 1; transform: translate3d(0, 0, 0); will-change: auto; }
            .ambient-orb { animation: orb-drift 16s ease-in-out infinite alternate; transform-origin: center; }
            .ambient-orb-delay { animation-delay: -8s; }
            @keyframes orb-drift {
                from { transform: translate3d(0, 0, 0) scale(1); }
                to { transform: translate3d(18px, -14px, 0) scale(1.08); }
            }
            #suggestion-widget[open] #suggestion-panel { animation: suggestion-in 320ms cubic-bezier(.2, .7, .2, 1) both; }
            @keyframes suggestion-in {
                from { opacity: 0; transform: translate3d(0, 12px, 0) scale(.98); }
                to { opacity: 1; transform: translate3d(0, 0, 0) scale(1); }
            }
        }
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transform: translate3d(0, -8px, 0);
            pointer-events: none;
            transition: max-height 360ms cubic-bezier(.2, .7, .2, 1), opacity 240ms ease, transform 360ms cubic-bezier(.2, .7, .2, 1);
        }
        #mobile-menu.is-open { max-height: 24rem; opacity: 1; transform: translate3d(0, 0, 0); pointer-events: auto; }
        .suggestion-trigger { box-shadow: 0 10px 28px rgba(16, 185, 129, .4); }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; }
            .scroll-cue { animation: none !important; }
            #mobile-menu { transition: none !important; }
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden selection:bg-bpm-green-700 selection:text-white bg-bpm-green-900">

    <!-- Wrapper Utama dengan background hero -->
    <div class="relative min-h-screen bg-hero">
        
        <!-- Overlay gelap terkonsentrasi di sisi teks; foto pengurus di kanan tetap terlihat jelas. -->
        <div aria-hidden="true" class="absolute inset-0 z-0 bg-gradient-to-r from-emerald-950/85 via-emerald-950/45 to-transparent"></div>
        <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 z-10 h-40 bg-gradient-to-b from-emerald-950/80 via-emerald-950/30 to-transparent md:h-48"></div>

        <!-- Header / Navigasi -->
        <header id="main-nav" data-reveal="from-top" class="fixed inset-x-0 top-0 z-50 flex w-full items-center justify-between border-b border-emerald-500/20 bg-emerald-950/30 px-6 py-4 backdrop-blur-md transition-all duration-300 md:px-12 md:py-5">
            
            <!-- Area Kiri (Dibiarkan kosong untuk menyeimbangkan logo di kanan) -->
            <div class="w-1/4 hidden md:block"></div>

            <!-- Menu di Tengah -->
            <nav class="hidden md:flex w-2/4 justify-center">
                <ul class="flex space-x-8 text-sm font-medium tracking-wide text-white">
                    <li><a href="#" class="border-b-2 border-transparent pb-1 transition-colors duration-300 hover:border-emerald-300 hover:text-emerald-200">Beranda</a></li>
                    <li><a href="#profil" class="border-b-2 border-transparent pb-1 transition-colors duration-300 hover:border-emerald-300 hover:text-emerald-200">Profil</a></li>
                    <li><a href="#proker" class="border-b-2 border-transparent pb-1 transition-colors duration-300 hover:border-emerald-300 hover:text-emerald-200">Program Kerja</a></li>
                    <li><a href="#berita" class="border-b-2 border-transparent pb-1 transition-colors duration-300 hover:border-emerald-300 hover:text-emerald-200">Berita</a></li>
                    <li><a href="#connect" class="border-b-2 border-transparent pb-1 transition-colors duration-300 hover:border-emerald-300 hover:text-emerald-200">Connect with Us</a></li>
                </ul>
            </nav>

            <!-- Logo di Kanan Atas -->
            <div class="w-full md:w-1/4 flex justify-end items-center">
                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-white font-bold text-sm tracking-wider uppercase">BPM FTD</p>
                        <p class="text-green-200 text-xs opacity-80">Badan Legislatif</p>
                    </div>
                    <div class="h-14 w-14 shrink-0 overflow-hidden rounded-full bg-white p-1 shadow-lg ring-1 ring-white/50 transition-transform duration-300 hover:scale-[1.04] md:h-[4.5rem] md:w-[4.5rem]">
                        <img src="{{ asset('images/logo-bpm-ftd.jpg') }}" alt="Logo Badan Perwakilan Mahasiswa Fakultas Teknologi dan Desain" class="block h-full w-full rounded-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button (Hamburger) -->
            <button id="mobile-menu-btn" aria-controls="mobile-menu" aria-expanded="false" class="md:hidden text-white focus:outline-none absolute left-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </header>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" aria-hidden="true" class="hidden md:hidden fixed left-6 right-6 top-20 z-40 rounded-xl border border-emerald-400/20 bg-emerald-950/95 p-4 shadow-2xl backdrop-blur-md">
            <ul class="flex flex-col space-y-4 text-white text-center font-medium">
                <li><a href="#" class="block rounded py-2 transition-colors hover:bg-emerald-500/20 hover:text-emerald-100">Beranda</a></li>
                <li><a href="#profil" class="block rounded py-2 transition-colors hover:bg-emerald-500/20 hover:text-emerald-100">Profil</a></li>
                <li><a href="#proker" class="block rounded py-2 transition-colors hover:bg-emerald-500/20 hover:text-emerald-100">Program Kerja</a></li>
                <li><a href="#berita" class="block rounded py-2 transition-colors hover:bg-emerald-500/20 hover:text-emerald-100">Berita</a></li>
                <li><a href="#connect" class="block rounded py-2 transition-colors hover:bg-emerald-500/20 hover:text-emerald-100">Connect with Us</a></li>
            </ul>
        </div>

        <!-- Main Content (Hero Section) -->
        <main class="relative z-10 flex min-h-screen flex-col justify-center px-6 pb-24 pt-28 md:px-16 md:pb-20 md:pt-32 lg:px-24">
            
            <div class="max-w-7xl w-full mx-auto flex flex-col md:flex-row items-center justify-start">
                
                <!-- Kotak Transparan di Kiri (Glassmorphism Effect) -->
                <div data-reveal="from-left" class="w-full md:w-1/2 lg:w-5/12 transform transition-all duration-700 hover:scale-[1.02]">
                    <div class="relative overflow-hidden rounded-3xl border border-white/20 bg-emerald-950/20 p-8 shadow-2xl backdrop-blur-md md:p-12">
                        
                        <!-- Aksen dekorasi di dalam kotak -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-green-400/20 rounded-full blur-3xl -mr-10 -mt-10"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full blur-2xl -ml-5 -mb-5"></div>

                        <!-- Konten Teks di dalam Kotak -->
                        <div class="relative z-10">
                            <!-- Watermark S0S6 di belakang teks (Absolute Position) -->
                            <div class="absolute -top-6 -left-4 md:-left-8 opacity-20 pointer-events-none z-0">
                                <p class="text-7xl md:text-8xl lg:text-9xl font-black text-transparent tracking-tighter uppercase select-none" style="-webkit-text-stroke: 2px rgba(255, 255, 255, 0.8);">
                                    S0S6
                                </p>
                            </div>

                            <div class="relative z-10 pt-4">
                                <h2 class="text-green-300 font-semibold tracking-widest uppercase text-xs md:text-sm mb-3 flex items-center gap-3">
                                    <span class="w-10 h-[2px] bg-green-300 inline-block rounded-full"></span>
                                    {{ $homeContent?->hero_label ?? 'Badan Perwakilan Mahasiswa' }}
                                </h2>
                                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-md">
                                    {{ $homeContent?->hero_title ?? 'BPM FTD' }}
                                </h1>
                                
                                <p class="text-gray-100 text-sm md:text-base mb-8 leading-relaxed font-light drop-shadow-sm">
                                    {{ $homeContent?->hero_description ?? 'Mewujudkan representasi mahasiswa yang transparan, aspiratif, dan inovatif demi kemajuan Fakultas.' }}
                                </p>
                                
                                <!-- Tombol Aksi -->
                                <div class="flex flex-wrap gap-4 mt-4">
                                    <a href="#profil" class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold uppercase tracking-wide text-white shadow-lg shadow-emerald-600/30 transition-all hover:scale-[1.02] hover:bg-emerald-500">
                                        Kenali Kami
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                    <a href="#connect" class="inline-flex items-center rounded-xl border border-emerald-400/40 px-6 py-3 text-sm font-semibold uppercase tracking-wide text-white transition-all hover:bg-emerald-500/20">
                                        Connect with Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- Memudarkan foto secara bertahap ke latar putih bagian anggota. -->
        <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 z-10 h-44 bg-gradient-to-b from-transparent via-emerald-950/20 to-white md:h-52"></div>
        
        <!-- Ornamen bawah / indikator scroll -->
        <div class="scroll-cue absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex flex-col items-center">
            <span class="text-white/70 text-xs mb-2 tracking-widest uppercase font-medium">Scroll ke Bawah</span>
            <div class="w-8 h-12 border-2 border-white/50 rounded-full flex justify-center p-1">
                <div class="w-1.5 h-3 bg-white rounded-full"></div>
            </div>
        </div>

    </div>

    <!-- Bagian Profil Anggota -->
    <section id="profil" class="relative py-24 px-6 md:px-16 lg:px-24">
        <div class="max-w-7xl mx-auto">
            <!-- Judul Section -->
            <div data-reveal class="text-center mb-16">
                <h3 class="text-bpm-green-700 font-semibold tracking-widest uppercase text-sm mb-2">Struktur Organisasi</h3>
                <h2 class="text-gray-900 font-black text-3xl md:text-5xl mb-4">Anggota BPM FTD</h2>
                <div class="w-24 h-1.5 bg-bpm-green-700 mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto md:text-lg">
                    {{ $homeContent?->profile_intro ?? 'Mari berkenalan dengan para pengurus BPM FTD yang siap mewujudkan aspirasi mahasiswa.' }}
                </p>
            </div>

            <div class="mb-10 flex flex-wrap justify-center gap-3" role="group" aria-label="Filter anggota berdasarkan divisi">
                <button type="button" data-member-filter="all" aria-pressed="true" class="member-filter rounded-full bg-emerald-700 px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-emerald-700/20 transition-all hover:-translate-y-0.5 hover:bg-emerald-600">Semua</button>
                <button type="button" data-member-filter="bph" aria-pressed="false" class="member-filter rounded-full border border-emerald-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:-translate-y-0.5 hover:border-emerald-400 hover:text-emerald-800">BPH</button>
                <button type="button" data-member-filter="komisi-1" aria-pressed="false" class="member-filter rounded-full border border-emerald-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:-translate-y-0.5 hover:border-emerald-400 hover:text-emerald-800">Komisi I</button>
                <button type="button" data-member-filter="komisi-2" aria-pressed="false" class="member-filter rounded-full border border-emerald-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:-translate-y-0.5 hover:border-emerald-400 hover:text-emerald-800">Komisi II</button>
                <button type="button" data-member-filter="komisi-3" aria-pressed="false" class="member-filter rounded-full border border-emerald-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:-translate-y-0.5 hover:border-emerald-400 hover:text-emerald-800">Komisi III</button>
            </div>

            <!-- Struktur bertingkat: BPH diikuti tiga komisi -->
            <div class="space-y-12">
                @foreach($profileGroups as $tierKey => $group)
                    @php($filterGroup = $tierKey === 'bph' ? 'bph' : 'komisi-'.(array_search($tierKey, ['anggaran', 'kemahasiswaan', 'organisasi'], true) + 1))
                    <section data-member-section="{{ $filterGroup }}" aria-label="{{ $group['label'] }}">
                        <div data-reveal class="mb-6 border-b border-emerald-200 pb-4">
                            <div>
                                <p class="mb-1 text-xs font-bold uppercase tracking-[.2em] text-bpm-green-700">{{ $group['subtitle'] }}</p>
                                <h3 class="text-2xl font-black text-gray-900 md:text-3xl">{{ $group['label'] }}</h3>
                            </div>
                        </div>
                        @if($group['members']->isNotEmpty())
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                                @foreach($group['members'] as $member)
                                    <article data-reveal style="--reveal-delay: {{ min(($loop->index % 4) * 80, 240) }}ms" class="group rounded-2xl border border-emerald-100 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl">
                                        <div class="relative aspect-[2/3] overflow-hidden rounded-xl bg-emerald-50">
                                            <img src="{{ $member->photo_path ? asset('uploads/profiles/'.$member->photo_path) : 'https://placehold.co/400x600/e2e8f0/064e3b?text=Foto+' . $loop->iteration }}" alt="Foto {{ $member->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        </div>
                                        <div class="pt-4 text-center">
                                            <p class="mb-2 inline-block max-w-full rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">{{ $member->position }}</p>
                                            <h4 class="text-lg font-bold text-gray-900">{{ $member->name }}</h4>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @else
                            <p class="rounded-2xl border border-dashed border-emerald-200 bg-white/70 px-5 py-8 text-center text-gray-500">Profil {{ $group['label'] }} akan segera diperbarui.</p>
                        @endif
                    </section>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Bagian Program Kerja -->
    <section id="proker" class="relative py-24 px-6 md:px-16 lg:px-24">
        <div class="max-w-7xl mx-auto">
            <div data-reveal class="text-center mb-16">
                <h3 class="text-bpm-green-700 font-semibold tracking-widest uppercase text-sm mb-2">Pendampingan Organisasi</h3>
                <h2 class="text-gray-900 font-black text-3xl md:text-5xl mb-4">Program Kerja HMP FTD</h2>
                <div class="w-24 h-1.5 bg-bpm-green-700 mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto md:text-lg">Daftar program kerja HMP FTD, informasi pendampingan BPM, dan materi kegiatan.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programs as $program)
                    <article data-reveal style="--reveal-delay: {{ min(($loop->index % 3) * 90, 180) }}ms" class="bg-slate-50 rounded-2xl p-6 md:p-8 border border-gray-200 hover:border-bpm-green-700 hover:-translate-y-1 hover:shadow-xl transition-all duration-500 ease-out">
                        <span class="inline-flex px-3 py-1 bg-green-100 text-bpm-green-800 text-xs font-bold rounded-full uppercase tracking-wider">{{ $program->label }}</span>
                        <h3 class="text-xl font-bold text-gray-900 mt-4 mb-2">{{ $program->title }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">{{ $program->description }}</p>
                        @if($program->pic_name)
                            <div class="bg-white p-4 rounded-xl border border-gray-100 mb-6">
                                <p class="text-xs text-gray-500 font-medium">PIC Pendamping BPM</p>
                                <p class="text-sm font-bold text-gray-900">{{ $program->pic_name }}</p>
                            </div>
                        @endif
                        <a href="{{ $program->action_url ?: '#connect' }}" class="w-full inline-flex justify-center items-center px-4 py-3 bg-bpm-green-800 hover:bg-bpm-green-900 text-white text-sm font-semibold rounded-xl transition-colors shadow-md">{{ $program->action_label ?: 'Lihat informasi' }}</a>
                    </article>
                @empty
                    <p class="col-span-full text-center text-gray-600">Belum ada program kerja yang ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Bagian Berita & Pengumuman -->
    <section id="berita" class="relative py-24 px-6 md:px-16 lg:px-24">
        <div class="max-w-7xl mx-auto">
            <div data-reveal class="text-center mb-16">
                <h3 class="text-bpm-green-700 font-semibold tracking-widest uppercase text-sm mb-2">Kabar Fakultas</h3>
                <h2 class="text-gray-900 font-black text-3xl md:text-5xl mb-4">Berita &amp; Pengumuman</h2>
                <div class="w-24 h-1.5 bg-bpm-green-700 mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto md:text-lg">Informasi kegiatan BPM FTD, agenda HMP, dan kesempatan bagi mahasiswa untuk ikut berpartisipasi.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($announcements as $announcement)
                    <article data-reveal style="--reveal-delay: {{ min(($loop->index % 3) * 90, 180) }}ms" class="bg-white rounded-2xl p-7 border border-gray-100 shadow-md shadow-emerald-950/5 hover:shadow-xl hover:-translate-y-1 transition-all duration-500 ease-out">
                        <span class="inline-flex px-3 py-1 bg-green-100 text-bpm-green-800 text-xs font-bold rounded-full uppercase tracking-wider">{{ $announcement->label }}</span>
                        <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">{{ $announcement->title }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">{{ $announcement->description }}</p>
                        <a href="{{ $announcement->action_url ?: '#proker' }}" class="inline-flex items-center gap-2 text-bpm-green-800 font-semibold text-sm hover:text-bpm-green-900">{{ $announcement->action_label ?: 'Lihat informasi' }} <span aria-hidden="true">→</span></a>
                    </article>
                @empty
                    <p class="col-span-full text-center text-gray-600">Belum ada pengumuman terbaru.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Bagian Connect With Us / Footer -->
    <section id="connect" class="relative py-20 px-6 md:px-16 lg:px-24 text-white overflow-hidden">
        <!-- Aksen Latar -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-green-400 to-transparent opacity-50"></div>
        <div class="ambient-orb absolute -bottom-24 -right-24 w-96 h-96 bg-green-500/10 rounded-full blur-3xl"></div>
        <div class="ambient-orb ambient-orb-delay absolute top-10 -left-24 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto relative z-10 flex flex-col items-center text-center">
            <div data-reveal>
            <h3 class="text-green-300 font-semibold tracking-widest uppercase text-sm mb-3">Mari Terhubung</h3>
            <h2 class="font-black text-4xl md:text-5xl mb-6">Connect With Us</h2>
            <p class="text-gray-300 max-w-2xl mb-12 text-sm md:text-base">
                Tetap terhubung dan dapatkan informasi terbaru seputar kegiatan, program kerja, serta layanan aspirasi mahasiswa dari BPM FTD melalui kanal resmi kami.
            </p>
            </div>

            <!-- Grid Social Media & Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 w-full max-w-4xl">
                
                <!-- Instagram -->
                <a data-reveal style="--reveal-delay: 0ms" href="#" target="_blank" class="flex flex-col items-center justify-center p-6 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl transition-all duration-500 hover:-translate-y-1 group">
                    <div class="w-14 h-14 bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 rounded-full flex items-center justify-center mb-4 p-0.5 group-hover:scale-110 transition-transform duration-300">
                        <div class="w-full h-full bg-bpm-green-900 rounded-full flex items-center justify-center group-hover:bg-transparent transition-colors duration-300">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <span class="font-bold text-lg mb-1">Instagram</span>
                    <span class="text-xs text-green-300">@bpmftd</span>
                </a>

                <!-- TikTok -->
                <a data-reveal style="--reveal-delay: 80ms" href="#" target="_blank" class="flex flex-col items-center justify-center p-6 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl transition-all duration-500 hover:-translate-y-1 group">
                    <div class="w-14 h-14 bg-gray-800 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-black transition-all duration-300">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-lg mb-1">TikTok</span>
                    <span class="text-xs text-green-300">@bpmftd</span>
                </a>

                <!-- YouTube -->
                <a data-reveal style="--reveal-delay: 160ms" href="#" target="_blank" class="flex flex-col items-center justify-center p-6 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl transition-all duration-500 hover:-translate-y-1 group">
                    <div class="w-14 h-14 bg-red-600/20 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-red-600 transition-all duration-300">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-lg mb-1">YouTube</span>
                    <span class="text-xs text-green-300">BPM FTD Channel</span>
                </a>

                <!-- Email -->
                <a data-reveal style="--reveal-delay: 240ms" href="mailto:emailanda@domain.com" class="flex flex-col items-center justify-center p-6 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl transition-all duration-500 hover:-translate-y-1 group">
                    <div class="w-14 h-14 bg-blue-500/20 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-blue-500 transition-all duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-lg mb-1">Email</span>
                    <span class="text-xs text-green-300">Tanya Kami</span>
                </a>

            </div>

            <!-- Copyright Notice -->
            <div class="mt-16 pt-8 border-t border-white/10 w-full flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400">
                <p>&copy; 2026 Badan Perwakilan Mahasiswa FTD. All rights reserved.</p>
                <a href="{{ route('admin.login') }}" class="hover:text-white transition">Admin BPM FTD</a>
            </div>
        </div>
    </section>

    <details id="suggestion-widget" class="group fixed bottom-5 right-5 z-50">
        <div id="suggestion-panel" class="absolute bottom-full right-0 mb-4 hidden w-[calc(100vw-2.5rem)] max-w-md overflow-hidden rounded-3xl border border-emerald-100 bg-white shadow-2xl shadow-emerald-950/25 group-open:block">
            <div class="flex items-start justify-between gap-4 bg-gradient-to-r from-emerald-50 to-white px-6 pb-4 pt-6">
                <div class="flex items-start gap-3">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-bpm-green-800">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h8M8 14h5m-8 6 2.5-3H18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12z"/></svg>
                    </div>
                    <div>
                        <p class="mb-1 text-xs font-bold uppercase tracking-[.16em] text-bpm-green-700">Suara Mahasiswa</p>
                        <h2 class="text-xl font-black text-gray-900">Kotak Saran</h2>
                        <p class="mt-1 text-sm text-gray-600">Formulir ini tidak meminta nama Anda.</p>
                    </div>
                </div>
                <button type="button" id="suggestion-close" class="rounded-full p-2 text-gray-400 transition hover:bg-gray-100 hover:text-gray-700" aria-label="Tutup kotak saran">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 6 12 12M18 6 6 18"/></svg>
                </button>
            </div>
            <form id="suggestion-form" method="POST" action="{{ route('suggestions.store') }}" class="space-y-4 px-6 pb-6">
                @csrf
                <div>
                    <label for="suggestion-category" class="mb-1.5 block text-sm font-semibold text-gray-700">Topik saran</label>
                    <select id="suggestion-category" name="category" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                        <option>Program kerja HMP</option>
                        <option>Kegiatan BPM FTD</option>
                        <option>Fasilitas dan lingkungan kampus</option>
                        <option>Aspirasi lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="suggestion-message" class="mb-1.5 block text-sm font-semibold text-gray-700">Saran atau aspirasi</label>
                    <textarea id="suggestion-message" name="message" rows="4" maxlength="3000" required placeholder="Tuliskan saran atau aspirasi Anda di sini..." class="w-full resize-y rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-100"></textarea>
                </div>
                <p class="text-xs leading-relaxed text-gray-500">Nama dan email tidak diminta. Saran disimpan secara anonim di sistem BPM FTD.</p>
                <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-bpm-green-800 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-900/20 transition hover:-translate-y-0.5 hover:bg-bpm-green-900 focus:outline-none focus:ring-4 focus:ring-emerald-200">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m3 11 18-8-8 18-2-8-8-2zm8 2 5-5"/></svg>
                    Kirim Saran
                </button>
                <p id="suggestion-status" class="min-h-5 text-center text-xs leading-relaxed text-gray-500" role="status" aria-live="polite"></p>
            </form>
        </div>
        <summary class="suggestion-trigger z-50 flex cursor-pointer list-none items-center gap-2 rounded-full bg-emerald-600 px-5 py-3 font-medium text-white shadow-lg shadow-emerald-600/40 transition-all hover:scale-105 hover:bg-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-300 [&::-webkit-details-marker]:hidden">
            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-white/15">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h8M8 14h5m-8 6 2.5-3H18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12z"/></svg>
            </span>
            <span class="text-sm font-bold">Kotak Saran</span>
        </summary>
    </details>
    <script>
        (() => {
            const items = document.querySelectorAll('[data-reveal]');
            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            if (!reduceMotion && items.length) {
                document.documentElement.classList.add('motion-ready');

                if (!('IntersectionObserver' in window)) {
                    items.forEach((item) => item.classList.add('is-visible'));
                } else {
                    const revealObserver = new IntersectionObserver((entries, observer) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('is-visible');
                                observer.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.12, rootMargin: '0px 0px -36px 0px' });

                    items.forEach((item) => revealObserver.observe(item));
                }
            }

            const filterButtons = document.querySelectorAll('[data-member-filter]');
            const memberSections = document.querySelectorAll('[data-member-section]');
            filterButtons.forEach((filterButton) => {
                filterButton.addEventListener('click', () => {
                    const selected = filterButton.dataset.memberFilter;
                    filterButtons.forEach((button) => {
                        const active = button === filterButton;
                        button.setAttribute('aria-pressed', String(active));
                        button.classList.toggle('bg-emerald-700', active);
                        button.classList.toggle('text-white', active);
                        button.classList.toggle('shadow-md', active);
                        button.classList.toggle('shadow-emerald-700/20', active);
                        button.classList.toggle('border', !active);
                        button.classList.toggle('border-emerald-200', !active);
                        button.classList.toggle('bg-white', !active);
                        button.classList.toggle('text-slate-700', !active);
                    });
                    memberSections.forEach((section) => {
                        const hideSection = selected !== 'all' && section.dataset.memberSection !== selected;
                        section.hidden = hideSection;
                        section.classList.toggle('hidden', hideSection);
                    });
                });
            });

            const navbar = document.getElementById('main-nav');
            const syncNavbar = () => {
                const scrolled = window.scrollY > 24;
                navbar?.classList.toggle('bg-emerald-950/40', scrolled);
                navbar?.classList.toggle('bg-emerald-950/30', !scrolled);
                navbar?.classList.toggle('border-emerald-500/20', scrolled);
                navbar?.classList.toggle('border-emerald-500/15', !scrolled);
                navbar?.classList.toggle('shadow-lg', scrolled);
            };
            syncNavbar();
            window.addEventListener('scroll', syncNavbar, { passive: true });

            const button = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            if (!button || !menu) return;

            let hideTimer;
            const setMenuOpen = (open) => {
                window.clearTimeout(hideTimer);
                button.setAttribute('aria-expanded', String(open));

                if (open) {
                    menu.classList.remove('hidden');
                    menu.setAttribute('aria-hidden', 'false');
                    window.requestAnimationFrame(() => menu.classList.add('is-open'));
                    return;
                }

                menu.classList.remove('is-open');
                menu.setAttribute('aria-hidden', 'true');
                hideTimer = window.setTimeout(() => menu.classList.add('hidden'), 380);
            };

            button.addEventListener('click', () => setMenuOpen(button.getAttribute('aria-expanded') !== 'true'));
            menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setMenuOpen(false)));
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') setMenuOpen(false);
            });
        })();
    </script>
    <script>
        document.getElementById('suggestion-form')?.addEventListener('submit', async (event) => {
            event.preventDefault();
            const form = event.currentTarget;
            const submitButton = form.querySelector('button[type="submit"]');
            const status = document.getElementById('suggestion-status');
            submitButton.disabled = true;
            status.textContent = 'Menyimpan saran...';

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: new FormData(form)
                });
                const result = await response.json();
                if (!response.ok) {
                    const firstError = result.errors ? Object.values(result.errors).flat()[0] : result.message;
                    throw new Error(firstError || 'Saran belum berhasil disimpan. Silakan coba lagi.');
                }

                form.reset();
                status.textContent = result.message;
            } catch (error) {
                status.textContent = error.message || 'Tidak dapat terhubung ke server. Silakan coba lagi.';
            } finally {
                submitButton.disabled = false;
            }
        });
        document.getElementById('suggestion-close')?.addEventListener('click', () => {
            document.getElementById('suggestion-widget').open = false;
        });
    </script>
</body>
</html>




