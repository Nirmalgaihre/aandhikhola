<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- 1. DYNAMIC TITLE --}}
    <title>@yield('title', 'Aandhikhola Polytechnic Institute')</title>

    {{-- 2. DYNAMIC DESCRIPTION --}}
    <meta name="description" content="@yield('meta_description', 'Official website of Aandhikhola Polytechnic Institute (API), providing technical excellence in DIT and DCE.')">

    {{-- 3. DYNAMIC KEYWORDS --}}
    <meta name="keywords" content="@yield('meta_keywords', 'API Waling, Aandhikhola Polytechnic, CTEVT Nepal, Engineering Syangja')">

    {{-- 4. SOCIAL MEDIA (Optional but recommended) --}}
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="article:author" content="Nirmal Gaihre">

    @stack('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
            <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        [x-cloak] { display: none !important; }
        
        .nav-underline { position: relative; }
        .nav-underline::after {
            content: ''; position: absolute; width: 0; height: 2px;
            bottom: -4px; left: 0; background-color: #FF8A65;
            transition: width 0.3s ease;
        }
        .nav-underline:hover::after { width: 100%; }

        .mobile-scroll::-webkit-scrollbar { width: 4px; }
        .mobile-scroll::-webkit-scrollbar-thumb { background: #302171; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#FDFDFD] text-slate-900" 
      x-data="{ 
        mobileMenu: false, 
        scrolled: false,
        currentTime: '',
        currentDate: '',
        updateClock() {
            const now = new Date();
            this.currentTime = now.toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' });
            this.currentDate = now.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' });
        }
      }" 
      x-init="updateClock(); setInterval(() => updateClock(), 1000)"
      @scroll.window="scrolled = (window.pageYOffset > 20)">

    <div class="bg-[#302171] text-white/90 py-2 text-[11px] font-bold transition-all border-b border-white/10" 
         :class="scrolled ? 'hidden' : 'block'">
        <div class="max-w-[1400px] mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-4 md:space-x-6">
                <span class="flex items-center gap-1.5"><span class="text-[#FF8A65]">📧</span> ctevt.abps@gmail.com</span>
                <span class="hidden sm:inline flex items-center gap-1.5"><span class="text-[#FF8A65]">📞</span> +977-985-6001005</span>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="bg-white/10 px-3 py-1 rounded flex items-center gap-3 border border-white/5">
                    <span x-text="currentDate" class="text-white"></span>
                    <span class="text-[#FF8A65] font-black">|</span>
                    <span x-text="currentTime" class="text-white tabular-nums"></span>
                </div>
            </div>
        </div>
    </div>

    <header class="sticky top-0 z-[100] transition-all duration-300 border-b"
            :class="scrolled ? 'bg-white/95 backdrop-blur-md py-2 shadow-xl border-gray-100' : 'bg-white py-4 border-transparent'">
        <div class="max-w-[1400px] mx-auto px-6 flex justify-between items-center">
            
            <a href="/" class="flex items-center space-x-3 md:space-x-4 group">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-10 md:h-16 transition-transform group-hover:scale-105">
                <div class="border-l-2 border-slate-100 pl-3 md:pl-4">
                    <h1 class="text-[#302171] font-black text-xs md:text-xl leading-tight uppercase tracking-tighter">आँधिखोला बहुप्राविधिक शिक्षालय</h1>
                    <h2 class="text-[#FF8A65] font-bold text-[8px] md:text-xs uppercase tracking-[0.1em]">Aandhikhola Polytechnic Institute</h2>
                </div>
            </a>

            <nav class="hidden xl:flex items-center space-x-1 text-[13px] font-bold text-slate-700">
                <a href="/" class="px-4 py-2 nav-underline hover:text-[#302171]">HOME</a>
                
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="px-4 py-2 flex items-center gap-1 group-hover:text-[#302171] uppercase">
                        About <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <div x-show="open" x-cloak x-transition class="absolute top-full left-0 w-60 bg-white shadow-2xl rounded-xl border border-gray-100 py-3 mt-1">
                        <a href="{{ route('public.staff.index') }}" class="block px-5 py-2.5 hover:bg-slate-50 hover:text-[#302171] transition">Staff Directory</a>
                        <a href="{{ route('principal.message') }}" class="block px-5 py-2.5 hover:bg-slate-50 hover:text-[#302171] transition">Principal's Message</a>
                        <a href="{{ route('public.gallery.index') }}" class="block px-5 py-2.5 hover:bg-slate-50 hover:text-[#302171] transition">Gallery & Media</a>
                        <a href="{{ route('public.videos.index') }}" class="block px-5 py-2.5 hover:bg-slate-50 hover:text-[#302171] transition">Video Gallery</a>
                    </div>
                </div>
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
        <button class="px-4 py-2 flex items-center gap-1 group-hover:text-[#302171] uppercase">
            TEVT Programs <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        
        <div x-show="open" x-cloak x-transition class="absolute top-full left-0 w-64 bg-white shadow-2xl rounded-xl border border-gray-100 py-3 mt-1 font-bold text-slate-700">
            <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                <button class="w-full flex justify-between items-center px-5 py-2.5 hover:bg-slate-50 hover:text-[#302171] transition uppercase">
                    Long Term Program
                    <svg class="w-3 h-3 -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round"/></svg>
                </button>
                <div x-show="subOpen" class="absolute left-full top-0 w-48 bg-white shadow-2xl rounded-xl border border-gray-100 py-2 ml-1">
                    <a href="{{ route('programs.dit') }}" class="block px-5 py-2 hover:bg-slate-50 hover:text-[#302171]">DIT</a>
                    <a href="{{ route('programs.dce') }}" class="block px-5 py-2 hover:bg-slate-50 hover:text-[#302171]">DCE</a>
                </div>
            </div>
            <a href="{{ route('public.short-term') }}" class="block px-5 py-2.5 hover:bg-slate-50 hover:text-[#302171] transition uppercase">Short Term Program</a>
        </div>
    </div>

                <a href="{{ route('notices.all') }}" class="px-4 py-2 nav-underline hover:text-[#302171]">NOTICE</a>
                <a href="{{ route('publications.all') }}" class="px-4 py-2 nav-underline hover:text-[#302171]">PUBLICATIONS</a>
                <a href="{{ route('public.downloads') }}" class="px-4 py-2 nav-underline hover:text-[#302171]">DOWNLOADS</a>
                <a href="{{ route('public.blog.index') }}" class="px-4 py-2 nav-underline hover:text-[#302171]">BLOG</a>
                <a href="{{ route('public.contact') }}" class="px-4 py-2 nav-underline hover:text-[#302171]">CONTACT</a>
            </nav>

            <button @click="mobileMenu = true" class="xl:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
            </button>
        </div>
    </header>

    <template x-teleport="body">
        <div x-show="mobileMenu" x-cloak class="fixed inset-0 z-[200]">
            <div x-show="mobileMenu" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="absolute inset-0 bg-slate-900/80 backdrop-blur-md" @click="mobileMenu = false"></div>
            
            <div x-show="mobileMenu" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" class="absolute right-0 top-0 h-full w-[85%] max-w-[350px] bg-white shadow-2xl flex flex-col">
                <div class="p-6 bg-[#302171] text-white flex justify-between items-center">
                    <p class="font-black text-xl tracking-tighter">NAVIGATION</p>
                    <button @click="mobileMenu = false" class="bg-white/10 p-2 rounded-full"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="3" stroke-linecap="round"/></svg></button>
                </div>

                <div class="flex-1 overflow-y-auto mobile-scroll p-6 space-y-3 font-bold">
                    <a href="/" class="block p-4 bg-slate-50 rounded-xl text-[#302171]">HOME</a>
                    
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex justify-between items-center w-full p-4 bg-slate-50 rounded-xl">ABOUT API <svg class="w-4 h-4" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg></button>
                        <div x-show="open" x-collapse class="pl-4 mt-2 space-y-1 border-l-2 border-[#302171]/20 ml-4">
                            <a href="{{ route('public.staff.index') }}" class="block p-3 text-slate-600 text-sm">Staff Directory</a>
                            <a href="{{ route('principal.message') }}" class="block p-3 text-slate-600 text-sm">Principal's Message</a>
                            <a href="{{ route('public.gallery.index') }}" class="block p-3 text-slate-600 text-sm">Gallery</a>
                            <a href="{{ route('public.videos.index') }}" class="block p-3 text-slate-600 text-sm">Video Gallery</a>

                        </div>
                    </div>

                    <div x-data="{ open: false }">
        <button @click="open = !open" class="flex justify-between items-center w-full p-4 bg-slate-50 rounded-xl text-slate-700">
            TEVT PROGRAMS 
            <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg>
        </button>
        
        <div x-show="open" x-collapse class="pl-4 mt-2 space-y-2 border-l-2 border-[#302171]/20 ml-4">
            <div x-data="{ subOpen: false }">
                <button @click="subOpen = !subOpen" class="flex justify-between items-center w-full p-3 text-slate-600 text-sm">
                    Long Term Program
                    <svg class="w-3 h-3 transition-transform" :class="subOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2"/></svg>
                </button>
                <div x-show="subOpen" x-collapse class="pl-6 space-y-1">
                    <a href="{{ route('programs.dit') }}" class="block p-2 text-slate-500 text-xs hover:text-[#302171]">DIT (Information Tech)</a>
                    <a href="{{ route('programs.dce') }}" class="block p-2 text-slate-500 text-xs hover:text-[#302171]">DCE (Civil Engineering)</a>
                </div>
            </div>
            <a href="{{ route('public.short-term') }}" class="block p-3 text-slate-600 text-sm">Short Term Program</a>
        </div>
    </div>

                    <a href="{{ route('notices.all') }}" class="block p-4 bg-slate-50 rounded-xl uppercase">Notice</a>
                    <a href="{{ route('publications.all') }}" class="block p-4 bg-slate-50 rounded-xl uppercase text-[#302171]">Publications</a>
                    <a href="{{ route('public.downloads') }}" class="block p-4 bg-slate-50 rounded-xl uppercase text-[#302171]">Downloads</a>
                    <a href="{{ route('public.blog.index') }}" class="block p-4 bg-slate-50 rounded-xl uppercase">Blog</a>
                    <a href="{{ route('public.contact') }}" class="block p-4 bg-slate-50 rounded-xl uppercase">Contact Us</a>
                </div>
            </div>
        </div>
    </template>

    <main>@yield('content')</main>

    <footer class="bg-[#003366] text-white pt-16">
        <div class="max-w-[1400px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 pb-12">
            
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-star-of-david text-3xl"></i>
                    <h2 class="text-3xl font-black tracking-tighter">ABPS</h2>
                </div>
                <p class="text-white/70 text-sm font-medium">Welcome</p>
                <div class="flex gap-3 pt-2">
                    <a href="#" class="w-10 h-10 border border-white/20 flex items-center justify-center rounded hover:bg-[#FF8A65] hover:border-[#FF8A65] transition-all duration-300">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 border border-white/20 flex items-center justify-center rounded hover:bg-[#FF8A65] hover:border-[#FF8A65] transition-all duration-300">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-bold mb-6 border-b-2 border-[#FF8A65] w-fit pb-1">Featured Links</h3>
                <ul class="space-y-3 text-sm font-medium">
                    <li><a href="/" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-house text-[12px]"></i> Home</a></li>
                    <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-user text-[12px]"></i> About Us</a></li>
                    <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-users text-[12px]"></i> Staff</a></li>
                    <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-circle-info text-[12px]"></i> Notice</a></li>
                    <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-book-open text-[12px]"></i> Publication</a></li>
                    <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-feather-pointed text-[12px]"></i> Blog Post</a></li>
                    <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-calendar-day text-[12px]"></i> Tevt Program</a></li>
                    <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-phone-flip text-[12px]"></i> Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-bold mb-6 border-b-2 border-[#FF8A65] w-fit pb-1">Important Links</h3>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="https://psc.gov.np/" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-building-user text-[12px]"></i> लोकसेवा आयोगको कार्यालय</a></li>
                    <li><a href="https://ppsc.gandaki.gov.np/" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-landmark-dome text-[12px]"></i> प्रदेश लोक सेवा आयोग गण्डकी प्रदेश</a></li>
                    <li><a href="https://ctevt.org.np/" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-building-columns text-[12px]"></i> CTEVT केन्द्रीय कार्यालय</a></li>
                    <li><a href="https://ctevtgandaki.org.np/" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-map-location-dot text-[12px]"></i> गण्डकी प्रदेश कार्यालय, CTEVT</a></li>
                    <li><a href="https://itms.ctevt.org.np:5580/" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-file-pen text-[12px]"></i> CTEVT Exam</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-bold mb-6 border-b-2 border-[#FF8A65] w-fit pb-1">Contact us</h3>
                <ul class="space-y-5 text-sm font-medium">
                    <li class="flex items-center gap-4"><i class="fa-solid fa-phone text-[#FF8A65] text-lg"></i> 9856001005</li>
                    <li class="flex items-center gap-4"><i class="fa-solid fa-envelope text-[#FF8A65] text-lg"></i> ctevt.abps@gmail.com</li>
                    <!-- <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-user-shield text-[12px]"></i> Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-[#FF8A65] transition flex items-center gap-3"><i class="fa-solid fa-file-lines text-[12px]"></i> Terms and Conditions</a></li> -->
                </ul>
            </div>
        </div>

        <div class="bg-[#002244] py-8 border-t border-white/5">
            <div class="max-w-[1400px] mx-auto px-6 flex flex-col items-center justify-center text-[13px] font-bold tracking-wide">
                <p class="text-white/80">
                    © 2080 ABPS All Rights Reserved || Developed By 
                    <span class="text-yellow-400 ml-1 inline-flex items-center gap-2">
                        <i class="fa-solid fa-code text-[14px]"></i> NS Brothers (Nirmal - Saroz)
                    </span>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>