@extends('layouts.admin')

@section('title', 'Hosting Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Hosting Status</h2>
        <p class="text-xs text-gray-500 uppercase tracking-widest">Aandhikhola Multi-Technical Institute</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm text-center">
            <i class="fa-solid fa-check-circle text-emerald-500 mb-2"></i>
            <p class="text-[10px] font-bold text-gray-400 uppercase">Status</p>
            <p class="text-sm font-bold text-emerald-600">ACTIVE</p>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm text-center">
            <i class="fa-solid fa-calendar text-blue-500 mb-2"></i>
            <p class="text-[10px] font-bold text-gray-400 uppercase">Cycle</p>
            <p class="text-sm font-bold text-gray-700">ANNUALLY</p>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm text-center">
            <i class="fa-solid fa-credit-card text-purple-500 mb-2"></i>
            <p class="text-[10px] font-bold text-gray-400 uppercase">Method</p>
            <p class="text-sm font-bold text-gray-700">eSewa v1</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h3 class="text-xs font-bold text-gray-600 uppercase">Subscription Information</h3>
        </div>
        <div class="divide-y divide-gray-100">
            <div class="flex p-5">
                <span class="w-1/3 text-xs font-bold text-gray-400 uppercase">Registration Date</span>
                <span class="text-sm font-semibold text-gray-700">Thursday, August 8th, 2024</span>
            </div>
            
            <div class="flex p-5">
                <span class="w-1/3 text-xs font-bold text-gray-400 uppercase">Recurring Amount</span>
                <div>
                    <span class="text-sm font-bold text-gray-800">NPR 6,213.00</span>
                    <span class="ml-2 text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded font-bold uppercase">Incl. 13% VAT</span>
                </div>
            </div>

            <div class="flex p-5 bg-red-50/50">
                <span class="w-1/3 text-xs font-bold text-red-400 uppercase">Next Due Date</span>
                <span class="text-sm font-black text-red-600 underline underline-offset-4">Saturday, August 8th, 2026</span>
            </div>

            <div class="flex p-5">
                <span class="w-1/3 text-xs font-bold text-gray-400 uppercase">Payment Method</span>
                <span class="text-sm font-bold text-gray-700 flex items-center gap-2">
                    <i class="fa-solid fa-wallet text-green-600"></i> eSewa Payment Gateway
                </span>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center gap-3 p-4 bg-indigo-50 border border-indigo-100 rounded-lg">
        <i class="fa-solid fa-info-circle text-indigo-500"></i>
        <p class="text-[11px] text-indigo-700 font-medium">
            This hosting is on a <strong>2-year billing cycle</strong>. Please ensure the eSewa balance is maintained before the next due date.
        </p>
    </div>
</div>
@endsection