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

{{-- ── HERO ── --}}
<div class="relative h-[80vh] bg-[#0f172a] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-[url('/assets/img/488801969_1128249509344900_3336773468329021175_n.jpg')] bg-cover bg-center opacity-30"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#1e1b4b] to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-6 w-full">
        <span class="text-[#FF8A65] font-black text-xs uppercase tracking-[0.4em] mb-4 block">Excellence in Technology</span>
        <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter leading-[0.9] mb-8 p-1">
            Shape Your Future with CTEVT <br><span class="text-[#FF8A65]">Diploma Program</span>
        </h1>
        <div class="flex gap-4">
            <a href="#message" class="px-8 py-4 bg-white text-[#1e1b4b] font-black text-xs uppercase tracking-widest hover:bg-[#FF8A65] hover:text-white transition-all">Learn More</a>
        </div>
    </div>
</div>

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

{{-- BLOG --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
            <div>
                <span class="text-[#FF8A65] font-black text-xs uppercase tracking-[0.3em] mb-3 block">Insights & News</span>
                <h2 class="text-4xl md:text-5xl font-black text-[#1e1b4b] uppercase tracking-tighter">Latest from our Blog</h2>
            </div>
            <a href="{{ route('public.blog.index') }}" class="text-[#302171] font-bold text-sm uppercase tracking-widest border-b-2 border-[#302171] pb-1 hover:text-[#FF8A65] hover:border-[#FF8A65] transition-all">View All Stories</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($blogs as $post)
            <div class="group cursor-pointer">
                <div class="relative aspect-video rounded-2xl overflow-hidden mb-6 shadow-sm">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1e1b4b]/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
                <p class="text-[10px] font-black text-[#FF8A65] uppercase tracking-widest mb-3">{{ date('M d, Y', strtotime($post->created_at)) }}</p>
                <h3 class="text-xl font-bold text-[#1e1b4b] group-hover:text-[#302171] leading-tight mb-4">
                    <a href="{{ route('public.blog.show', $post->slug) }}">{{ $post->title }}</a>
                </h3>
                <p class="text-slate-500 text-sm line-clamp-2">{{ strip_tags($post->description) }}</p>
            </div>
            @endforeach
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

{{-- NOTICE BOARD + PUBLICATIONS --}}
<section class="py-24 bg-white relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none"
         style="background-image: linear-gradient(rgba(30,27,75,0.03) 1px, transparent 1px),
                                  linear-gradient(90deg,rgba(30,27,75,0.03) 1px, transparent 1px);
                background-size: 40px 40px;"></div>

    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14">
            <div>
                <span class="inline-flex items-center gap-2 text-[#FF8A65] font-black text-[10px] uppercase tracking-[0.35em] mb-3">
                    <span class="w-6 h-px bg-[#FF8A65] inline-block"></span> Information Hub
                </span>
                <h2 class="text-4xl md:text-5xl font-black text-[#1e1b4b] uppercase tracking-tighter leading-none">
                    Notices &<br><span class="text-[#FF8A65]">Publications</span>
                </h2>
            </div>
            <a href="{{ route('notices.all') }}"
               class="self-start md:self-auto inline-flex items-center gap-2 text-[11px] font-black uppercase tracking-widest text-[#1e1b4b] border border-[#1e1b4b]/20 px-5 py-2.5 rounded-full hover:bg-[#1e1b4b] hover:text-white transition-all">
                All Notices
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid lg:grid-cols-5 gap-8 items-start">
            {{-- NOTICE BOARD --}}
            <div class="lg:col-span-3">
                <div class="flex items-center gap-3 mb-5">
                    <div class="flex items-center gap-2 bg-[#1e1b4b] text-white text-[10px] font-black px-4 py-2 uppercase tracking-widest rounded-full">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#FF8A65] opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#FF8A65]"></span>
                        </span>
                        Live Notice Board
                    </div>
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">{{ now()->format('d M, Y') }}</span>
                </div>

                <div class="space-y-3">
                    @forelse($notices as $index => $notice)
                    <div class="notice-card group relative bg-white border border-slate-100 rounded-2xl overflow-hidden
                                hover:border-[#FF8A65]/40 hover:shadow-lg hover:shadow-[#FF8A65]/5 transition-all duration-300"
                         style="animation: slideUp 0.4s ease both; animation-delay: {{ $index * 60 }}ms">

                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-slate-100 group-hover:bg-[#FF8A65] transition-colors rounded-l-2xl"></div>

                        <div class="flex items-center gap-5 px-6 py-4 pl-7">
                            <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-[#1e1b4b]/5 group-hover:bg-[#1e1b4b] flex flex-col items-center justify-center transition-colors">
                                <span class="text-[9px] font-black text-[#302171] group-hover:text-[#FF8A65] uppercase leading-none transition-colors">
                                    {{ date('M', strtotime($notice->created_at)) }}
                                </span>
                                <span class="text-lg font-black text-[#1e1b4b] group-hover:text-white leading-none transition-colors">
                                    {{ date('d', strtotime($notice->created_at)) }}
                                </span>
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <img src="{{ asset('assets/img/new_blink_icon.gif') }}"
                                         alt="new"
                                         class="h-5 w-auto flex-shrink-0">
                                    <h4 class="font-bold text-[#1e1b4b] group-hover:text-[#FF8A65] transition-colors text-sm leading-snug truncate">
                                        {{ $notice->title }}
                                    </h4>
                                </div>
                                <p class="text-[11px] text-slate-400 font-semibold mt-0.5 uppercase tracking-wide">
                                    {{ \Carbon\Carbon::parse($notice->created_at)->diffForHumans() }}&nbsp;·&nbsp; Administration
                                </p>
                            </div>

                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-50 group-hover:bg-[#FF8A65] flex items-center justify-center transition-all">
                                <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-16 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        <i class="fa-solid fa-bell-slash text-3xl text-slate-200 mb-3 block"></i>
                        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">No notices available.</p>
                    </div>
                    @endforelse
                </div>

                <div class="mt-6">
                    <a href="{{ route('notices.all') }}"
                       class="inline-flex items-center gap-2 text-[11px] font-black uppercase tracking-widest text-[#302171] hover:text-[#FF8A65] transition-colors">
                        View all notices
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- PUBLICATIONS --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-5">
                    <div class="flex items-center gap-2 bg-[#FF8A65] text-white text-[10px] font-black px-4 py-2 uppercase tracking-widest rounded-full">
                        <i class="fa-solid fa-file-lines text-[10px]"></i>
                        Publications
                    </div>
                </div>

                <div class="space-y-3">
                    @isset($publications)
                        @foreach($publications->take(5) as $item)
                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                           class="group flex items-center gap-4 bg-white border border-slate-100 rounded-2xl px-5 py-4
                                  hover:border-[#302171]/30 hover:shadow-md transition-all duration-300">
                            <div class="flex-shrink-0 w-10 h-10 bg-[#302171]/8 rounded-xl flex items-center justify-center
                                        group-hover:bg-[#302171] transition-colors">
                                <i class="fa-solid fa-file-pdf text-[#302171] group-hover:text-white transition-colors text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h5 class="text-sm font-bold text-[#1e1b4b] group-hover:text-[#302171] transition-colors line-clamp-1 uppercase tracking-tight">
                                    {{ $item->title }}
                                </h5>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                    PDF &nbsp;·&nbsp; {{ number_format($item->file_size / 1024, 1) }} KB
                                </span>
                            </div>
                            <svg class="w-4 h-4 text-slate-200 group-hover:text-[#FF8A65] flex-shrink-0 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </a>
                        @endforeach
                    @else
                        <div class="text-center py-14 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                            <i class="fa-solid fa-folder-open text-3xl text-slate-200 mb-3 block"></i>
                            <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">No documents yet.</p>
                        </div>
                    @endisset
                </div>

                <div class="mt-6">
                    <a href="{{ route('publications.all') }}"
                       class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-[#1e1b4b] text-white
                              text-[10px] font-black uppercase tracking-widest rounded-xl
                              hover:bg-[#FF8A65] transition-all duration-300">
                        <i class="fa-solid fa-download text-[10px]"></i>
                        All Publications
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA BANNER --}}
<section class="bg-[#302171] py-20 relative overflow-hidden">
    <div class="absolute right-0 top-0 w-1/3 h-full bg-[#FF8A65] skew-x-12 translate-x-20 opacity-10"></div>
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-10">
        <div class="text-center md:text-left">
            <h2 class="text-white text-3xl md:text-4xl font-black uppercase tracking-tighter mb-4">Ready to build your career?</h2>
            <!-- <p class="text-white/60 font-bold uppercase tracking-widest text-xs">Admissions are open for 2026 academic session.</p> -->
        </div>
        <div class="flex gap-4">
            <a href="/contact" class="px-8 py-4 bg-[#FF8A65] text-white font-black text-xs uppercase tracking-widest hover:scale-105 transition-transform shadow-xl shadow-black/20">Apply Now</a>
            <a href="/downloads" class="px-8 py-4 bg-white/10 text-white font-black text-xs uppercase tracking-widest hover:bg-white/20">Syllabus</a>
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