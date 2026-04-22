@extends('layouts.admin')

@section('title', 'Edit Video')

@section('content')
<div class="max-w-4xl mx-auto" x-data="{ uploading: false }">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Video</h1>
            <p class="text-sm text-slate-500">Update details or replace the video file</p>
        </div>
        <a href="{{ route('videos.index') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">
            <i class="fa-solid fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <form action="{{ route('videos.update', $video->id) }}" 
              method="POST" 
              enctype="multipart/form-data" 
              @submit="uploading = true"
              class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-2 tracking-widest">Video Title</label>
                <input type="text" name="title" value="{{ old('title', $video->title) }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-2 tracking-widest">Replace Video (Leave blank to keep current)</label>
                <input type="file" name="video_file" accept="video/*"
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-700">
                <div class="mt-3 p-3 bg-slate-50 rounded-lg flex items-center">
                    <i class="fa-solid fa-file-video mr-2 text-indigo-500"></i>
                    <span class="text-xs text-slate-500 font-medium">Current file: {{ basename($video->file_path) }}</span>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-2 tracking-widest">Description</label>
                <textarea name="description" rows="4" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none">{{ old('description', $video->description) }}</textarea>
            </div>

            <div class="pt-4 flex items-center space-x-4">
                <button type="submit" 
                        class="flex-1 bg-[#302171] text-white font-bold py-4 rounded-xl hover:bg-indigo-900 transition-all flex items-center justify-center space-x-2"
                        :disabled="uploading">
                    <template x-if="!uploading"><span><i class="fa-solid fa-check mr-2"></i> Save Changes</span></template>
                    <template x-if="uploading"><span><i class="fa-solid fa-spinner fa-spin mr-2"></i> Updating...</span></template>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection