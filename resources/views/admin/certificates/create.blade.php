@extends('layouts.admin')
@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
        <div class="p-6 bg-[#1d0647] text-white">
            <h3 class="font-bold uppercase text-xs tracking-widest">New Character Certificate Entry</h3>
        </div>
        <form action="{{ route('certificates.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Issue No</label>
                    <input type="text" name="issue_no" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="01">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Full Name</label>
                    <input type="text" name="full_name" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="Enter Student's Full Name">
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Father's Name</label>
                    <input type="text" name="father_name" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="Mr. Father's Name">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Mother's Name</label>
                    <input type="text" name="mother_name" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="Mrs. Mother's Name">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Date of Birth (BS)</label>
                    <input type="text" name="dob_nepali" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="YYYY-MM-DD">
                </div>

                <div class="md:col-span-3 h-px bg-slate-100 my-2"></div>

                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Course Name</label>
                    <input type="text" name="course" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., Diploma in Computer Engineering">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">CTEVT Reg No</label>
                    <input type="text" name="ctevt_reg_no" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="DIT-0010-019">
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Year From (BS)</label>
                    <input type="text" name="year_from" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="Enrolled Year">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Year To(BS)</label>
                    <input type="text" name="year_to" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="Complete year">
                </div>
                <div class="bg-indigo-50 p-3 rounded-xl ring-2 ring-indigo-100">
                            <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Passed Year(BS)</label>
                    <input type="text" name="pass_year" class="w-full bg-white border-2 border-transparent focus:border-indigo-500 rounded-lg p-2 text-sm outline-none" placeholder="e.g., 2080">
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Division</label>
                    <input type="text" name="division" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., First Division">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Percentage %</label>
                    <input type="text" name="percentage" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="e.g., 84.50">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-1">Issue Date (BS)</label>
                    <input type="text" name="issue_date_nepali" class="w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 rounded-xl p-3 text-sm outline-none transition-all" placeholder="2081-01-15">
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full bg-[#1d0647] text-white font-black py-4 rounded-2xl text-xs uppercase tracking-widest shadow-xl hover:bg-black transition-all">
                    Save Record & Generate Certificate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection