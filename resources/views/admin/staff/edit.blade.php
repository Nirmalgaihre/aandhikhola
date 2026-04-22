@extends('layouts.admin')

@section('title', 'Edit Staff')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 bg-amber-500 text-white flex justify-between items-center">
            <h3 class="text-xs font-black uppercase tracking-widest">Update Staff Details</h3>
            <a href="{{ route('staff.index') }}" class="text-xs underline">Back to List</a>
        </div>
        
        <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-5">
            @csrf
            @method('PUT')
            
            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Full Name</label>
                <input type="text" name="staff_name" value="{{ $staff->staff_name }}" required class="w-full bg-slate-50 border-2 border-transparent focus:border-amber-500 focus:bg-white rounded-xl p-3 text-sm outline-none transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Category</label>
                    <select name="staff_category" required class="w-full bg-slate-50 border-2 border-transparent focus:border-amber-500 focus:bg-white rounded-xl p-3 text-sm outline-none transition-all">
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}" {{ $staff->staff_category == $c->id ? 'selected' : '' }}>{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Phone</label>
                    <input type="text" name="staff_phone" value="{{ $staff->staff_phone }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-amber-500 focus:bg-white rounded-xl p-3 text-sm outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Email</label>
                <input type="email" name="staff_email" value="{{ $staff->staff_email }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-amber-500 focus:bg-white rounded-xl p-3 text-sm outline-none transition-all">
            </div>

            <div class="flex items-center space-x-4 pt-2">
                <img src="{{ asset('storage/' . $staff->staff_img) }}" class="w-16 h-16 rounded-full object-cover border-2 border-slate-200">
                <div class="flex-1">
                    <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Change Photo (Optional)</label>
                    <input type="file" name="staff_img" class="w-full text-xs text-slate-500 mt-2">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-amber-500 text-white font-black py-4 rounded-2xl text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-amber-600 transition-all">
                    Update Staff Member
                </button>
            </div>
        </form>
    </div>
</div>
@endsection