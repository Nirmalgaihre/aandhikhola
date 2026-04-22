<?php

namespace App\Http\Controllers;

use App\Models\StaffCategory;
use Illuminate\Http\Request;

class StaffCategoryController extends Controller
{
    public function index()
    {
        $categories = StaffCategory::latest()->get();
        // Points to resources/views/admin/staff/categories.blade.php
        return view('admin.staff.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:staff_categories,title',
        ]);

        StaffCategory::create([
            'title' => $request->title
        ]);

        return back()->with('success', 'Staff Category Created!');
    }

    public function destroy($id)
    {
        StaffCategory::findOrFail($id)->delete();
        return back()->with('success', 'Staff Category Deleted!');
    }
}