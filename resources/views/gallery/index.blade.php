@extends('layouts.app')
@section('title', 'Photo Gallery ')
@section('meta_description', 'Explore life at API. Browse our photo gallery featuring campus facilities, student activities, technical labs, and event highlights at Aandhikhola Polytechnic.')
@section('meta_author', 'Nirmal Gaihre')
@section('meta_keywords', 'API Gallery, Waling Polytechnic Photos, DCE Labs, DIT Classrooms, Student Life Syangja')
@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="mb-12">
            <h1 class="text-3xl font-black text-[#1e1b4b] uppercase tracking-tight">Photo Gallery</h1>
            <p class="text-slate-500 mt-2">Memories and events at Aandhikhola Polytechnic Institute</p>
            <div class="h-1 w-16 bg-[#FF8A65] mt-4"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($galleries as $gallery)
                <a href="{{ route('public.gallery.show', $gallery->id) }}" class="group">
                    <div class="bg-white p-3 rounded-2xl shadow-sm group-hover:shadow-xl transition-all duration-300">
                        <div class="aspect-video rounded-xl overflow-hidden bg-slate-100 relative">
                            @if($gallery->images->first())
                                <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif
                            
                            <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1 rounded-full">
                                {{ $gallery->images->count() }}+ Photos
                            </div>
                        </div>

                        <div class="mt-4 px-2 pb-2">
                            <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight group-hover:text-[#302171]">
                                {{ $gallery->title }}
                            </h2>
                            <p class="text-slate-400 text-xs mt-1">{{ $gallery->created_at->format('M Y') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection