@extends('layouts.admin')

@section('title', 'Manage Videos')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200">
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h2 class="text-lg font-bold text-slate-800">Video Gallery</h2>
        <a href="{{ route('videos.create') }}" class="bg-emerald-500 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-emerald-600 transition">
            <i class="fa-solid fa-plus mr-2"></i> Add Video
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400">Preview</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400">Title</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($videos as $video)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-6 py-4">
                        <video class="w-32 h-20 rounded bg-black" muted>
                            <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                        </video>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-slate-700">{{ $video->title }}</p>
                        <p class="text-[10px] text-slate-400 uppercase tracking-tighter">{{ $video->created_at->format('M d, Y') }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end space-x-2">
                            {{-- Edit Button --}}
                            <a href="{{ route('videos.edit', $video->id) }}" 
                               class="text-indigo-500 hover:text-indigo-700 p-2 transition-colors"
                               title="Edit Video">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this video forever?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 p-2 transition-colors" title="Delete Video">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                
                @if($videos->isEmpty())
                <tr>
                    <td colspan="3" class="px-6 py-10 text-center text-slate-400 italic text-sm">
                        No videos found in the gallery.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection