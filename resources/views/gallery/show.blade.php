@extends('layouts.app')

{{-- १. डेटाबेसबाट आएको टाइटल ट्याबमा देखाउने --}}
@section('title', $gallery->title)

{{-- २. डिस्क्रिप्सनलाई मेटा ट्यागमा हाल्ने (SEO को लागि) --}}
@section('meta_description', Str::limit(strip_tags($gallery->description), 155))
@section('meta_author', 'Nirmal Gaihre')

@section('content')
<div class="bg-white min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Back Button --}}
        <a href="{{ route('public.gallery.index') }}" class="inline-flex items-center text-blue-600 font-bold text-xs uppercase tracking-widest hover:underline mb-6">
            &larr; Back to Gallery
        </a>

        {{-- डेटाबेसबाट टाइटल तान्ने --}}
        <h1 class="text-4xl font-black text-slate-900 uppercase mb-4">{{ $gallery->title }}</h1>
        
        {{-- डेटाबेसबाट डिस्क्रिप्सन तान्ने --}}
        @if($gallery->description)
            <p class="text-slate-600 mb-12 max-w-3xl leading-relaxed">
                {{ $gallery->description }}
            </p>
        @endif

        {{-- ३. 'images' relationship मार्फत लुप चलाएर फोटोहरू देखाउने --}}
        <div class="columns-1 md:columns-3 gap-4 space-y-4">
            @forelse($gallery->images as $image)
                <div class="break-inside-avoid">
                    {{-- $image->image_path ले database को path दिन्छ --}}
                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                         class="w-full rounded-2xl shadow-md border border-slate-100 hover:scale-[1.02] transition-transform duration-300"
                         alt="{{ $gallery->title }}">
                </div>
            @empty
                <div class="col-span-full py-20 text-center text-slate-400 border-2 border-dashed border-slate-100 rounded-3xl">
                    यो एल्बममा अहिलेसम्म कुनै फोटोहरू अपलोड गरिएको छैन।
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection