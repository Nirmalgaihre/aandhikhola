@extends('layouts.app')
@section('title', 'Aandhikhola Polytechnic Institute | Waling, Syangja')
@section('meta_description', 'Welcome to API. We offer Diploma in Civil Engineering and Information Technology. Explore our staff, principal’s message, and latest notices.')
@section('meta_keywords', 'Aandhikhola Polytechnic Institute, ABPS, API, Waling, Technical School Syangja')
@section('content')

{{-- ── TICKER BAR ── --}}
<div class="bg-[#1e1b4b] py-3 border-b border-white/10 relative z-40 shadow-xl">
    <div class="max-w-7xl mx-auto px-6 flex items-center">
        <div class="bg-[#FF8A65] text-white text-[10px] font-black px-4 py-1.5 uppercase tracking-[0.2em] mr-6 flex-shrink-0 flex items-center shadow-lg">
            <span class="relative flex h-2 w-2 mr-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
            </span>
            Latest Updates
        </div>
        
        <marquee class="flex-1 text-white font-black uppercase tracking-widest text-sm" 
                 onmouseover="this.stop();" 
                 onmouseout="this.start();">
            @forelse($notices as $notice)
                <a href="{{ route('notices.show', $notice->id) }}" 
                   class="mx-12 inline-flex items-center gap-3 hover:text-[#FF8A65] transition-colors">
                    <img src="{{ asset('assets/img/new_blink_icon.gif') }}" 
                         alt="NEW" 
                         class="h-5 w-auto flex-shrink-0">
                    <span class="whitespace-nowrap">{{ $notice->title }}</span>
                </a>
            @empty
                <span class="mx-12">Welcome to Aandhikhola Polytechnic Institute</span>
            @endforelse
        </marquee>
    </div>
</div>


{{-- ── 2. HERO SECTION ── --}}
<section class="relative min-h-[85vh] flex flex-col justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/488801969_1128249509344900_3336773468329021175_n.jpg') }}" alt="Students" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-[#013e37]/70"></div> 
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 lg:px-20 w-full pt-20 pb-32">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3 mb-6">
                <span class="text-white font-bold text-sm tracking-[0.2em] uppercase">Welcome to Aandhikhola</span>
                <div class="w-12 h-[2px] bg-[#FF8A65]"></div>
            </div>
            
            <h2 class="text-5xl md:text-7xl font-extrabold text-white leading-[1.1] mb-8">
                Shape your future<br>with <span class="text-white/90 underline decoration-[#FF8A65] underline-offset-8">CTEVT</span> Diploma Course
            </h2>
            
            <p class="text-white/80 text-lg mb-10 max-w-xl leading-relaxed">
                Empowering students with technical excellence and vocational skills to bridge the gap between education and industry demands.
            </p>

            <div class="flex flex-wrap gap-5">
                <a href="#programs" class="px-8 py-4 bg-[#FF8A65] text-white font-black text-sm uppercase tracking-widest flex items-center gap-2 hover:bg-white hover:text-[#013e37] transition-all">
                    Discover More <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="/contact" class="px-8 py-4 border border-white/30 text-white font-black text-sm uppercase tracking-widest flex items-center gap-2 hover:bg-white hover:text-[#013e37] transition-all">
                    Contact Us <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Bottom Hero Features --}}
    <div class="relative z-20 w-full mt-auto">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-20 grid grid-cols-1 md:grid-cols-3">
            <div class="bg-[#4b0082] p-8 lg:p-12 text-white border-r border-white/10 flex items-start gap-5 group hover:bg-[#025249] transition-all">
                <div class="text-4xl text-white/50 group-hover:text-[#FF8A65] transition-colors"><i class="fa-solid fa-book-open-reader"></i></div>
                <div>
                    <h4 class="text-xl font-bold mb-3 uppercase tracking-tight">Education Services</h4>
                    <p class="text-white/60 text-sm leading-relaxed">Quality intellectual capital through superior technical collaboration.</p>
                </div>
            </div>
            <div class="bg-[#FF8A65] p-8 lg:p-12 text-white flex items-start gap-5 group shadow-2xl">
                <div class="text-4xl text-white/50"><i class="fa-solid fa-earth-asia"></i></div>
                <div>
                    <h4 class="text-xl font-bold mb-3 uppercase tracking-tight">Technical Hub</h4>
                    <p class="text-white/90 text-sm leading-relaxed">A central point for vocational excellence and industry-ready skills.</p>
                </div>
            </div>
            <div class="bg-[#013e37] p-8 lg:p-12 text-white border-l border-white/10 flex items-start gap-5 group hover:bg-[#025249] transition-all">
                <div class="text-4xl text-white/50 group-hover:text-[#FF8A65] transition-colors"><i class="fa-solid fa-certificate"></i></div>
                <div>
                    <h4 class="text-xl font-bold mb-3 uppercase tracking-tight">Diploma Programs</h4>
                    <p class="text-white/60 text-sm leading-relaxed">Comprehensive curriculum recognized by CTEVT and industry partners.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PRINCIPAL MESSAGE --}}
<section id="message" class="py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-12 gap-16 items-center">
            <div class="md:col-span-5 relative">
                <div class="aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl border-[12px] border-slate-50">
                    @if($principal && $principal->staff_img)
                        <img src="{{ asset('storage/' . $principal->staff_img) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-slate-200 text-slate-400">No Photo Found</div>
                    @endif
                </div>
               
            </div>
            <div class="md:col-span-7">
                <span class="text-[#FF8A65] font-black text-xs uppercase tracking-[0.3em] mb-4 block">Leadership</span>
                <h2 class="text-4xl md:text-5xl font-black text-[#1e1b4b] uppercase tracking-tighter mb-8">Message from <br>the Principal</h2>
                <div class="prose prose-lg text-slate-500 font-medium italic mb-10">
                    {!! htmlspecialchars_decode($principalMessage->description ?? 'Welcome to Aandhikhola Polytechnic Institute. We are dedicated to providing world-class technical education.') !!}
                </div>
                <h4 class="text-2xl font-black text-[#1e1b4b] uppercase">{{ $principal->staff_name ?? 'Principal Name' }}</h4>
            </div>
        </div>
    </div>
</section>

{{-- ── 10. CTA BANNER ── --}}
<section class="bg-[#3b0458] py-20 relative overflow-hidden">
    <div class="absolute right-0 top-0 w-1/3 h-full bg-[#FF8A65] skew-x-12 translate-x-20 opacity-10"></div>
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-10">
        <h2 class="text-white text-3xl md:text-4xl font-black uppercase tracking-tighter text-center md:text-left">Ready to build your career?</h2>
        <div class="flex gap-4">
            <a href="/contact" class="px-8 py-4 bg-[#FF8A65] text-white font-black text-xs uppercase tracking-widest hover:scale-105 transition-transform shadow-xl">Apply Now</a>
            <a href="/downloads" class="px-8 py-4 bg-white/10 text-white font-black text-xs uppercase tracking-widest hover:bg-white/20">Syllabus</a>
        </div>
    </div>
</section>



{{-- GALLERY --}}
<section class="py-24 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-black text-[#1e1b4b] uppercase tracking-tighter">Campus Gallery</h2>
            <div class="h-1 w-20 bg-[#FF8A65] mx-auto mt-6"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            @foreach($galleries as $gallery)
            <a href="{{ route('public.gallery.show', $gallery->id) }}" class="relative group aspect-square rounded-2xl overflow-hidden bg-[#1e1b4b]">
                @if(isset($gallery->first_image) && $gallery->first_image)
                    <img src="{{ asset('storage/' . $gallery->first_image) }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-40 group-hover:scale-110 transition-all duration-700">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-slate-800 text-white/20 text-[10px] uppercase font-bold">No Preview</div>
                @endif
                <div class="absolute inset-0 flex flex-col items-center justify-center p-4 text-center">
                    <h4 class="text-white font-black text-xs md:text-sm uppercase tracking-tighter opacity-0 group-hover:opacity-100 transition-all transform translate-y-4 group-hover:translate-y-0">{{ $gallery->title }}</h4>
                    <span class="text-[#FF8A65] text-[9px] font-bold mt-2 opacity-0 group-hover:opacity-100 uppercase tracking-widest">View Album</span>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-16 text-center">
            <a href="{{ route('public.gallery.index') }}" class="inline-block px-12 py-4 border-2 border-[#1e1b4b] text-[#1e1b4b] font-black text-xs uppercase tracking-[0.2em] hover:bg-[#1e1b4b] hover:text-white transition-all">
                Explore Full Media Library
            </a>
        </div>
    </div>
</section>

{{-- ============================================================================
    INFORMATION HUB - 3 COLUMN LAYOUT
    Blog | Notices | Downloads (Like University Design)
    ============================================================================ --}}
<section class="py-16 bg-white relative overflow-hidden">
    {{-- Background Grid Pattern --}}
    <div class="absolute inset-0 pointer-events-none opacity-20"
         style="background-image: linear-gradient(rgba(30,27,75,0.02) 1px, transparent 1px),
                                  linear-gradient(90deg,rgba(30,27,75,0.02) 1px, transparent 1px);
                background-size: 50px 50px;"></div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- ====== COLUMN 1: BLOG ====== --}}
            <div class="space-y-4">
                {{-- Header --}}
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-[#1e1b4b] uppercase tracking-tight">Blog</h3>
                    <a href="{{ route('public.blog.index') }}"
                       class="inline-flex items-center justify-center gap-2 bg-[#FF8A65] hover:bg-[#FF6B35] text-white text-xs font-bold px-4 py-2 rounded transition-colors">
                        + More
                    </a>
                </div>

                {{-- Blog Cards Grid (2x2) --}}
                <div class="grid grid-cols-2 gap-4">
                    @forelse($blogs as $index => $post)
                    <a href="{{ route('public.blog.show', $post->slug) }}" 
                       class="group relative h-56 overflow-hidden rounded-lg block cursor-pointer"
                       style="animation: fadeInUp 0.6s ease both; animation-delay: {{ $index * 80 }}ms">

                        {{-- Image --}}
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                             alt="{{ $post->title }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/60"></div>

                        {{-- Title Overlay - Appears on Hover --}}
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-4">
                            <h4 class="text-white font-bold text-sm leading-tight line-clamp-3">
                                {{ $post->title }}
                            </h4>
                        </div>

                        {{-- Date Badge --}}
                        <div class="absolute top-3 left-3 bg-[#FF8A65] text-white text-xs font-bold px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            {{ date('M d', strtotime($post->created_at)) }}
                        </div>
                    </a>
                    @empty
                    <div class="col-span-2 text-center py-16 bg-slate-50 rounded-lg border-2 border-dashed border-slate-200">
                        <i class="fa-solid fa-newspaper text-3xl text-slate-300 mb-2 block"></i>
                        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">No blog posts yet.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- ====== COLUMN 2: NOTICES ====== --}}
            <div class="space-y-4">
                {{-- Header --}}
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-[#1e1b4b] uppercase tracking-tight">Notices</h3>
                    <a href="{{ route('notices.all') }}"
                       class="inline-flex items-center justify-center gap-2 bg-[#FF8A65] hover:bg-[#FF6B35] text-white text-xs font-bold px-4 py-2 rounded transition-colors">
                        + More
                    </a>
                </div>

                {{-- Notice Cards --}}
                <div class="space-y-3">
                    @forelse($notices as $index => $notice)
                    <div class="group relative overflow-hidden rounded-lg bg-white border border-slate-200 hover:border-[#FF8A65] hover:shadow-md transition-all duration-300"
                         style="animation: fadeInUp 0.6s ease both; animation-delay: {{ $index * 80 }}ms">

                        <div class="flex items-stretch gap-0 h-full">
                            {{-- Date Box --}}
                            <div class="flex-shrink-0 w-20 bg-gradient-to-br from-blue-500 to-blue-700 text-white flex flex-col items-center justify-center p-3 group-hover:shadow-lg transition-shadow">
                                <span class="text-xs font-bold uppercase leading-none">
                                    {{ date('M', strtotime($notice->created_at)) }}
                                </span>
                                <span class="text-2xl font-black leading-none">
                                    {{ date('d', strtotime($notice->created_at)) }}
                                </span>
                            </div>

                            {{-- Content --}}
                            <div class="flex-1 flex flex-col justify-center p-3">
                                <h4 class="font-bold text-[#1e1b4b] text-xs leading-tight mb-1 line-clamp-2">
                                    {{ $notice->title }}
                                </h4>
                                <p class="text-xs text-slate-500 font-semibold uppercase tracking-tight">
                                    {{ \Carbon\Carbon::parse($notice->created_at)->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-16 bg-slate-50 rounded-lg border-2 border-dashed border-slate-200">
                        <i class="fa-solid fa-bell-slash text-3xl text-slate-300 mb-2 block"></i>
                        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">No notices available.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- ====== COLUMN 3: DOWNLOADS ====== --}}
            <div class="space-y-4">
                {{-- Header --}}
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-[#1e1b4b] uppercase tracking-tight">Downloads</h3>
                    <a href="{{ route('publications.all') }}"
                       class="inline-flex items-center justify-center gap-2 bg-[#FF8A65] hover:bg-[#FF6B35] text-white text-xs font-bold px-4 py-2 rounded transition-colors">
                        + More
                    </a>
                </div>

                {{-- Publication Cards --}}
                <div class="space-y-3">
                    @isset($publications)
                        @forelse($publications->take(12) as $index => $item)
                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                           class="group flex items-center gap-3 bg-white border border-slate-200 rounded-lg p-3 hover:border-[#FF8A65] hover:shadow-md transition-all duration-300"
                           style="animation: fadeInUp 0.6s ease both; animation-delay: {{ $index * 80 }}ms">

                            {{-- PDF Icon Box --}}
                            <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded flex items-center justify-center transition-transform group-hover:scale-110 duration-300">
                                <i class="fa-solid fa-file-pdf text-red-600 text-sm"></i>
                            </div>

                            {{-- Content --}}
                            <div class="flex-1 min-w-0">
                                <h5 class="text-xs font-bold text-[#1e1b4b] line-clamp-1 uppercase tracking-tight">
                                    {{ $item->title }}
                                </h5>
                                <span class="text-xs text-slate-500 font-semibold">
                                    {{ number_format($item->file_size / 1024, 1) }} KB
                                </span>
                            </div>

                            {{-- Download Icon --}}
                            <svg class="w-4 h-4 text-slate-400 flex-shrink-0 transition-transform group-hover:translate-y-0.5 duration-300" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </a>
                        @empty
                        <div class="text-center py-16 bg-slate-50 rounded-lg border-2 border-dashed border-slate-200">
                            <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                            <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">No documents yet.</p>
                        </div>
                        @endforelse
                    @else
                        <div class="text-center py-16 bg-slate-50 rounded-lg border-2 border-dashed border-slate-200">
                            <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                            <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">No documents yet.</p>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================================
    CUSTOM CSS ANIMATIONS & STYLES
    ============================================================================ --}}
<style>
    /* Fade In Up Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    .transition-transform {
        transition-property: transform;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    .transition-colors {
        transition-property: color, background-color, border-color;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    /* No hover color change, just scale animations */
    a {
        text-decoration: none;
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Remove button focus outline */
    button:focus,
    a:focus {
        outline: none;
    }

    /* Enhanced line clamp */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .grid.grid-cols-1.md\:grid-cols-3 {
            grid-template-columns: 1fr;
        }

        .grid.grid-cols-2 {
            grid-template-columns: 1fr 1fr;
        }
    }

    /* Ensure proper spacing */
    .space-y-4 > * + * {
        margin-top: 1rem;
    }

    .space-y-3 > * + * {
        margin-top: 0.75rem;
    }

    /* Optional: Add subtle glow on focus */
    a:focus-visible {
        outline: 2px solid #FF8A65;
        outline-offset: 2px;
    }
</style>

{{-- ── 3. STATS COUNTER ── --}}
<section class="bg-[#3b0458] py-16 relative overflow-hidden border-t border-white/5">
    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-white/5 rounded-full"></div>
    <div class="max-w-[1400px] mx-auto px-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div class="space-y-2">
                <h3 class="text-white text-4xl lg:text-5xl font-black tracking-tighter">8+</h3>
                <p class="text-[#FF8A65] font-bold text-[10px] lg:text-xs uppercase tracking-widest">Years of Excellence</p>
            </div>
            <div class="space-y-2">
                <h3 class="text-white text-4xl lg:text-5xl font-black tracking-tighter">800+</h3>
                <p class="text-[#FF8A65] font-bold text-[10px] lg:text-xs uppercase tracking-widest">Graduated Students</p>
            </div>
            <div class="space-y-2">
                <h3 class="text-white text-4xl lg:text-5xl font-black tracking-tighter">2</h3>
                <p class="text-[#FF8A65] font-bold text-[10px] lg:text-xs uppercase tracking-widest">Technical Courses</p>
            </div>
            <div class="space-y-2">
                <h3 class="text-white text-4xl lg:text-5xl font-black tracking-tighter">98%</h3>
                <p class="text-[#FF8A65] font-bold text-[10px] lg:text-xs uppercase tracking-widest">Placement Success</p>
            </div>
        </div>
    </div>
</section>



{{-- COURSE MATERIALS --}}
<section class="py-24 bg-white relative overflow-hidden">
    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-64 h-64 bg-[#FF8A65] opacity-[0.03] rounded-full -ml-32"></div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="text-center mb-16">
            <span class="text-[#FF8A65] font-black text-xs uppercase tracking-[0.4em] mb-3 block">Academic Resources</span>
            <h2 class="text-4xl md:text-5xl font-black text-[#1e1b4b] uppercase tracking-tighter">Course Materials & Syllabus</h2>
            <div class="h-1.5 w-24 bg-[#302171] mx-auto mt-6"></div>
        </div>
        <div class="grid md:grid-cols-2 gap-10">
            <div class="group bg-[#F8FAFC] p-8 md:p-12 rounded-[40px] border border-slate-100 hover:shadow-2xl hover:shadow-[#1e1b4b]/10 transition-all duration-500">
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-16 h-16 bg-[#1e1b4b] text-white rounded-2xl flex items-center justify-center shadow-lg group-hover:bg-[#FF8A65] transition-colors">
                        <i class="fa-solid fa-microchip text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-[#1e1b4b] uppercase tracking-tight">DIT</h3>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Diploma in Information Technology</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @for($i = 1; $i <= 6; $i++)
                        <a href="{{ route('semester.show', ['dit', 'sem'.$i]) }}"
                           class="flex items-center justify-center py-4 bg-white border border-slate-200 rounded-xl text-[11px] font-black text-[#1e1b4b] uppercase tracking-widest hover:bg-[#302171] hover:text-white hover:border-[#302171] transition-all">
                            Semester {{ $i }}
                        </a>
                    @endfor
                </div>
            </div>
            <div class="group bg-[#F8FAFC] p-8 md:p-12 rounded-[40px] border border-slate-100 hover:shadow-2xl hover:shadow-[#1e1b4b]/10 transition-all duration-500">
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-16 h-16 bg-[#302171] text-white rounded-2xl flex items-center justify-center shadow-lg group-hover:bg-[#FF8A65] transition-colors">
                        <i class="fa-solid fa-compass-drafting text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-[#1e1b4b] uppercase tracking-tight">DCE</h3>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Diploma in Civil Engineering</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @for($i = 1; $i <= 6; $i++)
                        <a href="{{ route('semester.show', ['dce', 'sem'.$i]) }}"
                           class="flex items-center justify-center py-4 bg-white border border-slate-200 rounded-xl text-[11px] font-black text-[#1e1b4b] uppercase tracking-widest hover:bg-[#302171] hover:text-white hover:border-[#302171] transition-all">
                            Semester {{ $i }}
                        </a>
                    @endfor
                </div>
            </div>
        </div>
        <div class="mt-12 text-center">
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em]">
                <i class="fa-solid fa-circle-info mr-2 text-[#FF8A65]"></i>
                Select a semester to view and download laboratory manuals, notes, and old questions.
            </p>
        </div>
    </div>
</section>

<style>
@keyframes slideUp {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

@endsection