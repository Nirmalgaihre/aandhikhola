@extends('layouts.app')

@section('content')
<div class="py-16 bg-[#302171] text-white">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-4xl font-bold uppercase tracking-tight">Downloads</h1>
        <div class="h-1 w-20 bg-[#FF8A65] mt-4"></div>
        <p class="mt-4 text-white/70">Select your department and semester to download resources.</p>
    </div>
</div>

<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        
        @if(session('error'))
        <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 text-red-800 rounded shadow-sm">
            <i class="fa-solid fa-circle-exclamation mr-2"></i> {{ session('error') }}
        </div>
        @endif

        <div class="grid md:grid-cols-2 gap-8">
            
            <div class="bg-white shadow-sm border border-gray-200 rounded-xl overflow-hidden">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                    <h2 class="text-xl font-bold text-[#302171] uppercase">IT Department</h2>
                    <p class="text-sm text-gray-500">Diploma in Information Technology</p>
                </div>
                <div class="p-6 grid grid-cols-3 gap-3">
                    @for($i = 1; $i <= 6; $i++)
                    <a href="{{ route('semester.show', ['dept' => 'dit', 'sem' => 'sem'.$i]) }}" 
                       class="text-center py-4 rounded-lg border border-gray-200 hover:bg-[#302171] hover:text-white transition-colors group">
                        <span class="block text-[10px] uppercase text-gray-400 group-hover:text-white/70">Sem</span>
                        <span class="text-lg font-bold">{{ $i }}</span>
                    </a>
                    @endfor
                </div>
            </div>

            <div class="bg-white shadow-sm border border-gray-200 rounded-xl overflow-hidden">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                    <h2 class="text-xl font-bold text-[#302171] uppercase">Civil Department</h2>
                    <p class="text-sm text-gray-500">Diploma in Civil Engineering</p>
                </div>
                <div class="p-6 grid grid-cols-3 gap-3">
                    @for($i = 1; $i <= 6; $i++)
                    <a href="{{ route('semester.show', ['dept' => 'dce', 'sem' => 'sem'.$i]) }}" 
                       class="text-center py-4 rounded-lg border border-gray-200 hover:bg-[#302171] hover:text-white transition-colors group">
                        <span class="block text-[10px] uppercase text-gray-400 group-hover:text-white/70">Sem</span>
                        <span class="text-lg font-bold">{{ $i }}</span>
                    </a>
                    @endfor
                </div>
            </div>

        </div>

        <div class="mt-12 text-center py-8 border-t border-gray-200">
            <p class="text-gray-600">Can't find what you are looking for?</p>
            <a href="{{ route('public.contact') }}" class="text-[#302171] font-bold hover:underline">Contact the Academic Section</a>
        </div>
    </div>
</section>
@endsection