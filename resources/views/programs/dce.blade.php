@extends('layouts.app')

@section('title', 'Diploma in Civil Engineering - Curriculum | Aandhikhola Polytechnic Institute')
@section('meta_description', 'Comprehensive curriculum and semester breakdown for Diploma in Civil Engineering at Aandhikhola Polytechnic Institute.')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen py-12">
    <div class="max-w-[1400px] mx-auto px-6">
        <div class="mb-12 border-b-2 border-slate-800 pb-6">
            <h1 class="text-3xl font-bold text-slate-900 uppercase tracking-tight">Diploma in Civil Engineering</h1>
            <p class="text-slate-600 font-medium mt-1">Full Curriculum Structure & Semester Breakdown | पूर्ण पाठ्यक्रम संरचना र सेमेस्टर विवरण</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white p-6 border border-slate-200 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 border-b pb-2 mb-4 uppercase text-xs tracking-widest">Introduction | परिचय</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    This program focuses on the design, construction, and maintenance of physical infrastructure. Students gain practical knowledge in surveying, materials, and structural engineering to lead development projects.
                    <br><span class="text-slate-500 italic mt-2 block">यस कार्यक्रमले भौतिक पूर्वाधारको डिजाइन, निर्माण र मर्मतमा ध्यान केन्द्रित गर्दछ।</span>
                </p>
            </div>
            <div class="bg-white p-6 border border-slate-200 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 border-b pb-2 mb-4 uppercase text-xs tracking-widest">What You'll Learn | तपाईंले के सिक्नुहुनेछ</h2>
                <ul class="grid grid-cols-2 gap-2 text-xs font-bold text-slate-700">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-compass-drafting text-[#302171]"></i> AutoCAD & 3D</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-map text-[#302171]"></i> Advanced Surveying</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-building text-[#302171]"></i> Structure Design</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-road text-[#302171]"></i> Transportation Eng.</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-droplet text-[#302171]"></i> Water Supply</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-trowel-bricks text-[#302171]"></i> Estimation & Costing</li>
                </ul>
            </div>
        </div>

        @php
        $dceSyllabus = [
            '1st Year - 1st Part' => [
                ['EG 1101 SH', 'Applied Nepali'], ['EG 1102 SH', 'Applied English'], ['EG 1103 SH', 'Engineering Mathematics I'],
                ['EG 1104 SH', 'Engineering Physics I'], ['EG 1105 SH', 'Engineering Chemistry I'], ['EG 1102 AR', 'Engineering Drawing I'],
                ['EG 1101 CT', 'Computer Application']
            ],
            '1st Year - 2nd Part' => [
                ['EG 1201 SH', 'Engineering Mathematics II'], ['EG 1202 SH', 'Engineering Physics II'], ['EG 1203 SH', 'Engineering Chemistry II'],
                ['EG 1201 AR', 'Engineering Drawing'], ['EG 1202 CE', 'Applied Mechanics']
            ],
            '2nd Year - 1st Part' => [
                ['EG 2101 SH', 'Engineering Mathematics III'], ['EG 2101 CE', 'Surveying I'], ['EG 2102 CE', 'Workshop Practice II'],
                ['EG 2103 CE', 'Fluid Mechanics and Hydraulics'], ['EG 2104 CE', 'Building Construction'], ['EG 2105 CE', 'Engineering Materials']
            ],
            '2nd Year - 2nd Part' => [
                ['EG 2201 SH', 'Social Engineering'], ['EG 2201 AR', 'Construction Drawing and CAD'], ['EG 2201 CE', 'Surveying II'],
                ['EG 2202 CE', 'Estimating and Costing I'], ['EG 2203 CE', 'Mechanics of Structure'], ['EG 2204 CE', 'Soil Mechanics and Foundation'],
                ['EG 2205 CE', 'Water Supply Engineering']
            ],
            '3rd Year - 1st Part' => [
                ['EG 3101 CE', 'Surveying III'], ['EG 3102 CE', 'Estimating and Costing II'], ['EG 3103 CE', 'Design of RC Structure'],
                ['EG 3104 CE', 'Transportation Engineering I'], ['EG 3105 CE', 'Sanitary Engineering'], ['EG 3106 CE', 'Construction Management'],
                ['EG 3107 CE', 'Design of Steel and Timber Structure']
            ],
            '3rd Year - 2nd Part' => [
                ['EG 3201 CE', 'Field Survey Camp'], ['EG 3202 CE', 'Transportation Engineering II'], ['EG 3203 CE', 'Estimating & Costing III'],
                ['EG 3204 CE', 'Water Resources & Irrigation'], ['EG 3205 CE', 'Entrepreneurship Development'], ['EG 1102 AR', 'Project Work'],
                ['ELECTIVE', 'Trail Bridge / Hill Road / Micro Hydro']
            ]
        ];
        @endphp

        <div class="row flex flex-wrap -mx-4">
            @foreach($dceSyllabus as $semester => $courses)
            <div class="col-md-4 w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="bg-white border border-slate-200 shadow-sm h-full flex flex-col">
                    <div class="bg-slate-800 px-5 py-3">
                        <h2 class="text-white text-xs font-bold uppercase tracking-wider">{{ $semester }}</h2>
                    </div>
                    <div class="flex-1">
                        <table class="w-full text-left border-collapse">
                            <tbody class="divide-y divide-slate-100">
                                @foreach($courses as $course)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-5 py-3 text-[10px] font-mono font-bold text-slate-400 w-24 border-r border-slate-50">{{ $course[0] }}</td>
                                    <td class="px-5 py-3 text-xs font-semibold text-slate-700">{{ $course[1] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection