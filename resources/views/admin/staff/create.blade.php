@extends('layouts.admin')

@section('title', 'Add New Staff')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 bg-[#1d0647] text-white">
            <h3 class="text-xs font-black uppercase tracking-widest">Register New Staff Member</h3>
        </div>
        
        <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-5">
            @csrf
            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Full Name</label>
                <input type="text" name="staff_name" required class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-xl p-3 text-sm outline-none transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Category</label>
                    <select name="staff_category" required class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-xl p-3 text-sm outline-none transition-all">
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Phone Number</label>
                    <input type="text" name="staff_phone" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-xl p-3 text-sm outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Email Address</label>
                <input type="email" name="staff_email" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-xl p-3 text-sm outline-none transition-all">
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Profile Photo</label>
                <input type="file" name="staff_img" class="w-full text-xs text-slate-500 mt-2">
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-[#1d0647] text-white font-black py-4 rounded-2xl text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-black transition-all">
                    Save Staff Member
                </button>
            </div>
        </form>
    </div>
</div>
@endsection