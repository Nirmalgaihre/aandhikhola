@extends('layouts.admin') {{-- Ensure this matches your layout filename --}}

@section('title', 'Add Video')

@section('content')
<div class="max-w-4xl mx-auto" x-data="{ uploading: false }">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Upload Video</h1>
            <p class="text-sm text-slate-500">Add a new mp4 video to the institute gallery</p>
        </div>
        <a href="{{ route('videos.index') }}" class="flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Back to Gallery
        </a>
    </div>

    @if(session('error'))
    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
        <i class="fa-solid fa-circle-exclamation mr-2"></i> {{ session('error') }}
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <form action="{{ route('videos.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              @submit="uploading = true"
              class="p-8 space-y-6">
            @csrf

            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-2 tracking-widest">Video Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Enter a descriptive title">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-2 tracking-widest">Select Video File (MP4)</label>
                <div class="relative group">
                    <input type="file" name="video_file" accept="video/mp4,video/x-m4v,video/*" required
                        class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-widest file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 transition">
                </div>
                <p class="text-[10px] text-slate-400 mt-2 italic">Maximum recommended size: 10MB. Supported formats: MP4, MOV.</p>
                @error('video_file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-2 tracking-widest">Description (Optional)</label>
                <textarea name="description" rows="4" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Provide some context about this video...">{{ old('description') }}</textarea>
            </div>

            <div class="pt-4 flex items-center space-x-4">
                <button type="submit" 
                        class="flex-1 bg-indigo-600 text-white font-bold py-4 rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all flex items-center justify-center space-x-2"
                        :class="uploading ? 'opacity-70 cursor-not-allowed' : ''"
                        :disabled="uploading">
                    
                    <template x-if="!uploading">
                        <span class="flex items-center">
                            <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Upload to Gallery
                        </span>
                    </template>
                    
                    <template x-if="uploading">
                        <span class="flex items-center">
                            <i class="fa-solid fa-spinner fa-spin mr-2"></i> Processing... Please Wait
                        </span>
                    </template>
                </button>
                
                <a href="{{ route('videos.index') }}" class="px-8 py-4 text-sm font-bold text-slate-400 hover:text-slate-600 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection