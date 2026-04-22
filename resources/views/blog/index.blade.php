@extends('layouts.app')
@section('title', 'Blog - Latest Post')
@section('meta_description', 'Stay updated with the latest blog posts and articles from Nirmal Gaihre.')
@section('meta_author', 'Nirmal Gaihre')
@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-black text-[#1e1b4b] uppercase mb-10 border-b pb-4">Latest Blog Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
            <div class="border rounded-xl overflow-hidden bg-white hover:shadow-lg transition">
                <a href="{{ route('public.blog.show', $post->slug) }}" class="block aspect-video bg-slate-100">
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300">No Image</div>
                    @endif
                </a>

                <div class="p-5">
                    <p class="text-[10px] font-bold text-[#FF8A65] uppercase mb-2">{{ $post->created_at->format('M d, Y') }}</p>
                    <h2 class="text-xl font-bold text-slate-800 leading-tight">
                        <a href="{{ route('public.blog.show', $post->slug) }}" class="hover:text-[#302171]">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="mt-3 text-slate-500 text-sm line-clamp-2">
                        {{ strip_tags($post->description) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-12">
        {{ $posts->links() }}
    </div>
</div>
@endsection