<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class VideoController extends Controller
{
    public function index() {
        $videos = Video::latest()->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create() {
        return view('admin.videos.create');
    }

    public function store(Request $request) {
        // 1. Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'video_file' => 'required|mimes:mp4,mov,ogg,qt|max:102400', // 100MB Max
        ]);

        try {
            if ($request->hasFile('video_file')) {
                // 2. Upload file to storage/app/public/videos
                $file = $request->file('video_file');
                $path = $file->store('videos', 'public');
                
                // 3. Insert into Database
                $inserted = Video::create([
                    'title'       => $request->title,
                    'file_path'   => $path,
                    'description' => $request->description,
                ]);

                if($inserted) {
                    return redirect()->route('videos.index')->with('success', 'Video saved to database!');
                }
            }
            
            return back()->with('error', 'File upload failed.');

        } catch (Exception $e) {
            // If there is a SQL error, this will show you exactly what is wrong
            return back()->with('error', 'Database Error: ' . $e->getMessage());
        }
    }

    public function destroy(Video $video) {
        if ($video->file_path) {
            Storage::disk('public')->delete($video->file_path);
        }
        $video->delete();
        return back()->with('success', 'Video deleted!');
    }
    // Show the Edit Form
public function edit(Video $video) {
    return view('admin.videos.edit', compact('video'));
}

// Update the Video
public function update(Request $request, Video $video) {
    $request->validate([
        'title' => 'required|string|max:255',
        'video_file' => 'nullable|mimes:mp4,mov,ogg,qt|max:102400', 
    ]);

    $data = [
        'title' => $request->title,
        'description' => $request->description,
    ];

    // Check if a NEW video file is being uploaded
    if ($request->hasFile('video_file')) {
        // Delete the OLD file from storage
        if ($video->file_path) {
            Storage::disk('public')->delete($video->file_path);
        }
        // Store the NEW file
        $data['file_path'] = $request->file('video_file')->store('videos', 'public');
    }

    $video->update($data);

    return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
}
// In VideoController.php
public function publicIndex() {
    $videos = Video::latest()->get();
    return view('videos.index', compact('videos')); // Changed path here
}
}