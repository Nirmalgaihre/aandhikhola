@extends('layouts.app')

{{-- Use a fixed string to avoid 'Undefined variable' errors on this page --}}
@section('title', 'Page Not Found')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center px-6 py-20">
    <div class="text-center">
        {{-- Visual 404 background text --}}
        <div class="relative">
            <h1 class="text-[12rem] font-black text-slate-100 leading-none select-none">404</h1>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <h2 class="text-3xl font-extrabold text-[#1e1b4b] uppercase tracking-tight">
                    Lost in Space?
                </h2>
                <p class="text-slate-500 mt-2 font-medium">The page you're looking for doesn't exist.</p>
            </div>
        </div>
        
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/') }}" 
               class="bg-[#1e1b4b] text-white px-8 py-3 rounded-xl font-bold hover:bg-[#302171] transition-all transform hover:-translate-y-1 shadow-lg">
                Go to Homepage
            </a>
            <a href="{{ url()->previous() }}" 
               class="bg-white border-2 border-slate-200 text-slate-600 px-8 py-3 rounded-xl font-bold hover:bg-slate-50 transition-all">
                Go Back
            </a>
        </div>

        <p class="mt-12 text-xs text-slate-400 uppercase tracking-[0.2em]">
            &copy; {{ date('Y') }} Nirmal Gaihre • Portfolio & Blog
        </p>
    </div>
</div>
@endsection