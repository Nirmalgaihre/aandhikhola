@extends('layouts.app')
@section('title', $post->title)
@section('meta_description', Str::limit(strip_tags($post->description), 155))
@section('meta_author', 'Nirmal Gaihre') {{-- Ensures Nirmal is credited as the author --}}

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <a href="{{ route('public.blog.index') }}" class="text-sm font-bold text-slate-400 hover:text-[#FF8A65] uppercase tracking-widest">← Back to Blog</a>
    
    <h1 class="text-4xl font-black text-[#1e1b4b] mt-6 mb-8">{{ $post->title }}</h1>

    @if($post->thumbnail)
        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-auto rounded-2xl shadow-xl mb-10">
    @endif

    <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed">
        {!! htmlspecialchars_decode($post->description) !!}
    </div>

    @if($post->images->count() > 0)
        <div class="mt-16 pt-10 border-t">
            <h3 class="font-bold text-slate-800 uppercase mb-6">Related Photos</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($post->images as $img)
                    <img src="{{ asset('storage/' . $img->image_path) }}" class="rounded-lg aspect-square object-cover border">
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection