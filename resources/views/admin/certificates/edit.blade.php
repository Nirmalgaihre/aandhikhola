@extends('layouts.admin')

@section('title', 'Edit Certificate')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
        <div class="p-6 bg-blue-600 text-white flex justify-between items-center">
            <h3 class="font-bold uppercase text-xs tracking-widest">Edit Certificate: {{ $certificate->issue_no }}</h3>
            <a href="{{ route('certificates.index') }}" class="text-xs bg-white/20 px-3 py-1 rounded-lg hover:bg-white/30 transition">Back to List</a>
        </div>
        
        <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Issue No</label>
                    <input type="text" name="issue_no" value="{{ $certificate->issue_no }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Full Name</label>
                    <input type="text" name="full_name" value="{{ $certificate->full_name }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Father's Name</label>
                    <input type="text" name="father_name" value="{{ $certificate->father_name }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Mother's Name</label>
                    <input type="text" name="mother_name" value="{{ $certificate->mother_name }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Date of Birth (BS)</label>
                    <input type="text" name="dob_nepali" value="{{ $certificate->dob_nepali }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">District</label>
                    <input type="text" name="district" value="{{ $certificate->district }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Municipality & Ward</label>
                    <div class="flex space-x-2">
                        <input type="text" name="municipality" value="{{ $certificate->municipality }}" class="w-3/4 bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none">
                        <input type="text" name="ward_number" value="{{ $certificate->ward_number }}" class="w-1/4 bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Province</label>
                    <input type="text" name="province" value="{{ $certificate->province }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>

                <div class="md:col-span-3 h-px bg-slate-100 my-2"></div>

                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Course Name</label>
                    <input type="text" name="course" value="{{ $certificate->course }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">CTEVT Reg No</label>
                    <input type="text" name="ctevt_reg_no" value="{{ $certificate->ctevt_reg_no }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Year (From - To) BS</label>
                    <div class="flex space-x-2">
                        <input type="text" name="year_from" value="{{ $certificate->year_from }}" class="w-1/2 bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none">
                        <input type="text" name="year_to" value="{{ $certificate->year_to }}" class="w-1/2 bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Division & %</label>
                    <div class="flex space-x-2">
                        <input type="text" name="division" value="{{ $certificate->division }}" class="w-1/2 bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none">
                        <input type="text" name="percentage" value="{{ $certificate->percentage }}" class="w-1/2 bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Issue Date (BS)</label>
                    <input type="text" name="issue_date_nepali" value="{{ $certificate->issue_date_nepali }}" class="w-full bg-slate-50 border-2 border-transparent focus:border-blue-500 rounded-xl p-3 text-sm outline-none transition-all">
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full bg-blue-600 text-white font-black py-4 rounded-2xl text-xs uppercase tracking-widest shadow-xl hover:bg-blue-700 transition-all">
                    Update Certificate Record
                </button>
            </div>
        </form>
    </div>
</div>
@endsection