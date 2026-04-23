@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto my-10">
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
        {{-- Header --}}
        <div class="p-6 bg-[#1d0647] text-white flex justify-between items-center">
            <div>
                <h3 class="font-bold uppercase text-xs tracking-widest">Certificate Management</h3>
                <p class="text-indigo-200 text-[10px] mt-1">New Character Certificate Entry</p>
            </div>
            <span class="bg-indigo-500/30 px-3 py-1 rounded-full text-[10px] font-bold">Step 1: Data Entry</span>
        </div>

        <form action="{{ route('certificates.store') }}" method="POST" class="p-8 space-y-8">
            @csrf
            
            {{-- 1. Basic Information --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-4 bg-indigo-500 rounded-full"></span>
                    <h4 class="text-sm font-bold text-slate-700 uppercase tracking-tight">Basic Information</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Issue No</label>
                        <input type="text" name="issue_no" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., 01" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Full Name</label>
                        <input type="text" name="full_name" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="Enter Student's Full Name" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Father's Name</label>
                        <input type="text" name="father_name" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="Mr. Father's Name" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Mother's Name</label>
                        <input type="text" name="mother_name" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="Mrs. Mother's Name" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Date of Birth (BS)</label>
                        <input type="text" name="dob_nepali" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="YYYY-MM-DD" required>
                    </div>
                </div>
            </div>

            <hr class="border-slate-100">

            {{-- 2. Address Details (Based on your SQL columns) --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-4 bg-indigo-500 rounded-full"></span>
                    <h4 class="text-sm font-bold text-slate-700 uppercase tracking-tight">Permanent Address</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Province</label>
                        <input type="text" name="province" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., Gandaki">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">District</label>
                        <input type="text" name="district" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., Syangja">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Municipality/VDC</label>
                        <input type="text" name="municipality" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., Galyang">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Ward No</label>
                        <input type="text" name="ward_number" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., 03">
                    </div>
                </div>
            </div>

            <hr class="border-slate-100">

            {{-- 3. Academic Details --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-4 bg-indigo-500 rounded-full"></span>
                    <h4 class="text-sm font-bold text-slate-700 uppercase tracking-tight">Academic Details</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Course Name</label>
                        <select name="course" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all appearance-none cursor-pointer" required>
                            <option value="" disabled selected>Select Course Program</option>
                            <optgroup label="Diploma Programs (3 Years)">
                                <option value="Diploma In Information Technology">Diploma in Information Technology</option>
                                <option value="Diploma In Civil Engineering"> Diploma in Civil Engineering</option>
                            </optgroup>
                            
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">CTEVT Reg No</label>
                        <input type="text" name="ctevt_reg_no" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="DIT-000-000" required>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Enrolled Year (BS)</label>
                        <input type="text" name="year_from" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="2078" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Completed Year (BS)</label>
                        <input type="text" name="year_to" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="2081" required>
                    </div>
                    <div class="bg-indigo-50 p-3 rounded-xl ring-2 ring-indigo-100">
                        <label class="block text-[10px] font-black uppercase text-indigo-600 mb-1">Passed Year (BS)</label>
                        <input type="text" name="pass_year" class="w-full bg-white border-2 border-transparent focus:border-indigo-500 rounded-lg p-2 text-sm outline-none" placeholder="2082" required>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Division</label>
                        <input type="text" name="division" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., First Division">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Percentage %</label>
                        <input type="text" name="percentage" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., 85.00">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Issue Date (BS)</label>
                        <input type="text" name="issue_date_nepali" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="2081-01-01" required>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-6">
                <button type="submit" class="w-full bg-[#1d0647] text-white font-black py-4 rounded-2xl text-xs uppercase tracking-widest shadow-xl hover:bg-black transition-all transform active:scale-[0.98]">
                    Save & Generate Certificate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection