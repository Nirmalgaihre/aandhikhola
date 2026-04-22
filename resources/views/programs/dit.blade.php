@extends('layouts.app')

@section('title', 'Diploma in Information Technology')
@section('meta_description', 'Explore the full curriculum and semester-wise breakdown for the Diploma in Information Technology at Aandhikhola Polytechnic Institute.')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen py-12">
    <div class="max-w-[1400px] mx-auto px-6">
        <div class="mb-12 border-b-2 border-slate-800 pb-6">
            <h1 class="text-3xl font-bold text-slate-900 uppercase tracking-tight">Diploma in Information Technology</h1>
            <p class="text-slate-600 font-medium mt-1">Full Curriculum Structure & Semester Breakdown | पूर्ण पाठ्यक्रम संरचना र सेमेस्टर विवरण</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white p-6 border border-slate-200 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 border-b pb-2 mb-4 uppercase text-xs tracking-widest">Introduction | परिचय</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    The DIT program provides a strong foundation in software development, cybersecurity, and system administration. It is designed to produce skilled IT professionals capable of handling modern digital challenges.
                    <br><span class="text-slate-500 italic mt-2 block">DIT कार्यक्रमले सफ्टवेयर विकास, साइबर सुरक्षा, र प्रणाली प्रशासनमा बलियो आधार प्रदान गर्दछ।</span>
                </p>
            </div>
            <div class="bg-white p-6 border border-slate-200 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 border-b pb-2 mb-4 uppercase text-xs tracking-widest">What You'll Learn | तपाईंले के सिक्नुहुनेछ</h2>
                <ul class="grid grid-cols-2 gap-2 text-xs font-bold text-slate-700">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-code text-[#302171]"></i> Web & App Dev</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-shield-halved text-[#302171]"></i> Cybersecurity</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-database text-[#302171]"></i> DBMS & SQL</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-microchip text-[#302171]"></i> AI Fundamentals</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-cloud text-[#302171]"></i> Cloud Computing</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-network-wired text-[#302171]"></i> Networking</li>
                </ul>
            </div>
        </div>

        @php
        $ditSyllabus = [
            '1st Year - 1st Part' => [
                ['EG 1101 SH', 'Applied Nepali'], ['EG 1102 SH', 'Applied English'], ['EG 1103 SH', 'Engineering Mathematics I'],
                ['EG 1104 SH', 'Engineering Physics I'], ['EG 1105 SH', 'Engineering Chemistry I'], ['EG 1102 AR', 'Engineering Drawing I'],
                ['EG 1101 CT', 'Computer Application']
            ],
            '1st Year - 2nd Part' => [
                ['EG 1201 SH', 'Engineering Mathematics II'], ['EG 1202 SH', 'Engineering Physics II'], ['EG 1203 SH', 'Engineering Chemistry II'],
                ['EG 1201 AR', 'Engineering Drawing II'], ['EG 1202 CE', 'Applied Mechanics']
            ],
            '2nd Year - 1st Part' => [
                ['EG 2101 SH', 'Engineering Mathematics III'], ['EG 2101 CT', 'C Programming'], ['EG 2102 SH', 'Web Technology I'],
                ['EG 2103 CT', 'Digital Logic'], ['EG 2101 IT', 'PC Troubleshoot & Maintenance'], ['EG 2106 CT', 'Basic Electrical and Electronics']
            ],
            '2nd Year - 2nd Part' => [
                ['EG 2201 CT', 'Database Management System'], ['EG 2202 CT', 'Data Structure & Algorithm'], ['EG 2203 CT', 'Object Oriented Programming (Java)'],
                ['EG 2204 CT', 'Microprocessor & Computer Architecture'], ['EG 2205 CT', 'Web Technology II'], ['EG 2206 CT', 'Statistics & Probability']
            ],
            '3rd Year - 1st Part' => [
                ['EG 3101 CT', 'Computer Graphics'], ['EG 3102 CT', 'Data Communication & Network'], ['EG 3103 CT', 'Operating System'],
                ['EG 3101 IT', 'Cloud Computing'], ['EG 3102 IT', 'Software Development'], ['EG 3103 IT', 'Elective I'],
                ['EG 3104 IT', 'Minor Project']
            ],
            '3rd Year - 2nd Part' => [
                ['EG 3201 CT', 'Multimedia System'], ['EG 3202 CT', 'Internet of Things'], ['EG 3201 MG', 'Entrepreneurship Development'],
                ['EG 3201 IT', 'Cyber Security'], ['EG 3202 IT', 'Elective II'], ['EG 3104 IT', 'Major Project']
            ]
        ];
        @endphp

        <div class="row flex flex-wrap -mx-4">
            @foreach($ditSyllabus as $semester => $courses)
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