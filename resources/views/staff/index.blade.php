@extends('layouts.app')

@section('title', 'Staff')
@section('content')
<div class="bg-[#F8FAFC] min-h-screen py-10 md:py-20">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        
        <div class="text-center mb-12 md:mb-20">
            <span class="text-[#FF8A65] font-black text-[10px] md:text-xs uppercase tracking-[0.3em] mb-3 block">Faculty & Administration</span>
            <h1 class="text-3xl md:text-5xl font-black text-[#1e1b4b] uppercase tracking-tighter mb-4">Our Professional Staff</h1>
            <div class="h-1 w-16 md:w-24 bg-[#302171] mx-auto rounded-full"></div>
        </div>

        @forelse($staffGroups as $category => $members)
            <div class="mb-16 md:mb-24">
                <div class="flex items-center gap-4 mb-8">
                    <h2 class="text-lg md:text-xl font-black text-[#302171] uppercase tracking-tight whitespace-nowrap">
                        {{ $category ?? 'Institutional Staff' }}
                    </h2>
                    <div class="h-[1px] w-full bg-slate-200"></div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-10">
                    @foreach($members as $person)
                        <div class="group">
                            <div class="relative aspect-square md:aspect-[4/5] rounded-xl md:rounded-2xl overflow-hidden bg-white shadow-sm transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-1">
                                
                                @if($person->staff_img)
                                    <img src="{{ asset('storage/' . $person->staff_img) }}" 
                                         alt="{{ $person->staff_name }}" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-300">
                                        <svg class="w-12 h-12 md:w-20" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @endif

                                <div class="absolute inset-x-0 bottom-0 p-2 md:p-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 z-20">
                                    <div class="bg-[#1e1b4b]/80 backdrop-blur-md p-2 md:p-4 rounded-lg md:rounded-xl border border-white/10 text-center">
                                        <p class="text-white text-[9px] md:text-xs font-medium truncate">{{ $person->staff_phone }}</p>
                                        <p class="hidden md:block text-white/60 text-[10px] truncate mt-1">{{ $person->staff_email }}</p>
                                    </div>
                                </div>
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1e1b4b]/40 via-transparent to-transparent opacity-50"></div>
                            </div>

                            <div class="mt-3 md:mt-5 text-center px-1">
                                <h3 class="text-sm md:text-lg font-extrabold text-[#1e1b4b] uppercase leading-tight group-hover:text-[#FF8A65] transition-colors line-clamp-1">
                                    {{ $person->staff_name }}
                                </h3>
                                <p class="text-slate-500 text-[9px] md:text-[11px] font-bold uppercase tracking-widest mt-0.5 md:mt-1">
                                    {{ $person->category_title }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-200">
                <p class="text-slate-400 font-bold uppercase tracking-widest">No staff records found.</p>
            </div>
        @endforelse

    </div>
</div>
@endsection