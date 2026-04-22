@extends('layouts.app')
{{-- 1. Corrected Title Section --}}
@section('title', 'Contact Us ')

{{-- 2. SEO Description --}}
@section('meta_description', 'Get in touch with Aandhikhola Polytechnic Institute in Waling, Syangja. Contact us for admissions, DIT/DCE program inquiries, or general institutional information.')

{{-- 3. Author Credit --}}
@section('meta_author', 'Nirmal Gaihre')

{{-- 4. Local SEO Keywords --}}
@section('meta_keywords', 'Contact API Waling, Aandhikhola Polytechnic Phone Number, Syangja Technical School, API Admission Inquiry, CTEVT College Syangja')
@section('content')
<section class="min-h-screen bg-slate-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 border border-slate-200">
            
            <div class="lg:col-span-5 bg-[#1e1b4b] p-10 lg:p-16 text-white flex flex-col justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold mb-4">Get in Touch</h2>
                    <p class="text-indigo-200 mb-12 leading-relaxed">
                        Aandhikhola Polytechnic Institute is committed to providing quality TEVT programs. Reach out to us for admissions, inquiries, or collaborations.
                    </p>

                    <div class="space-y-8">
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center shrink-0 border border-white/20">
                                <i class="fa-solid fa-location-dot text-orange-400"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Address</h4>
                                <p class="text-indigo-100/80 text-sm">Aandhikhola, Syangja, Nepal</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center shrink-0 border border-white/20">
                                <i class="fa-solid fa-phone text-orange-400"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Phone</h4>
                                <p class="text-indigo-100/80 text-sm">+977-985-6001005</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center shrink-0 border border-white/20">
                                <i class="fa-solid fa-envelope text-orange-400"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Email</h4>
                                <p class="text-indigo-100/80 text-sm">ctevt.abps@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-400 mb-4">Official Channels</p>
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/abps.edu.np" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-500 transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-500 transition-all">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-500 transition-all">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 p-10 lg:p-16">
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-slate-800">Send a Message</h2>
                    <p class="text-slate-500 text-sm mt-1">Fields marked with * are required.</p>
                </div>

                @if(session('success'))
                    <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl flex items-center gap-3 animate-bounce">
                        <i class="fa-solid fa-circle-check text-xl"></i>
                        <span class="text-sm font-bold uppercase">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-8 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-sm font-medium">
                        {{ session('error') }}
                    </div>
                @endif

                <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    {{-- Hidden Tracker Fields --}}
                    <input type="hidden" name="latitude" id="lat">
                    <input type="hidden" name="longitude" id="lon">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-wider ml-1">Full Name *</label>
                            <input type="text" name="name" required placeholder="Enter Your Name" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-wider ml-1">Email Address *</label>
                            <input type="email" name="email" required placeholder="Enter your Email Address" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-wider ml-1">Subject *</label>
                        <input type="text" name="subject" required placeholder="Enter Subject" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-wider ml-1">Your Message *</label>
                        <textarea name="message" rows="5" required placeholder="Type your message here..." 
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all resize-none"></textarea>
                    </div>

                    <button type="button" id="submitBtn" onclick="requestAccessAndSubmit()" 
                        class="w-full bg-[#1e1b4b] hover:bg-orange-500 text-white font-black py-5 rounded-2xl text-xs uppercase tracking-[0.2em] shadow-xl shadow-indigo-100 transition-all flex justify-center items-center gap-3">
                        <span id="btnText">Verify & Send Message</span>
                        <i class="fa-solid fa-paper-plane" id="btnIcon"></i>
                    </button>

                    <div class="flex items-center gap-2 justify-center opacity-40">
                        <i class="fa-solid fa-shield-halved text-[10px]"></i>
                        <!-- <p class="text-[9px] font-bold uppercase tracking-tighter">Your IP and Device data will be securely logged for security</p> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
function requestAccessAndSubmit() {
    const btn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnIcon = document.getElementById('btnIcon');

    // UI Loading State
    btn.classList.add('opacity-70', 'cursor-not-allowed');
    btnText.innerText = 'Acquiring Location...';
    btnIcon.className = 'fa-solid fa-spinner fa-spin';

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                // Success: Map Lat/Lon and Submit Form
                document.getElementById('lat').value = position.coords.latitude;
                document.getElementById('lon').value = position.coords.longitude;
                document.getElementById('contactForm').submit();
            },
            (error) => {
                // Error: User denied location
                alert("Security Protocol: You must allow location access to submit the contact form to verify you are within our service region.");
                resetButton(btn, btnText, btnIcon);
            },
            { timeout: 10000 }
        );
    } else {
        alert("Your browser does not support the required security verification features.");
        resetButton(btn, btnText, btnIcon);
    }
}

function resetButton(btn, text, icon) {
    btn.classList.remove('opacity-70', 'cursor-not-allowed');
    text.innerText = 'Verify & Send Message';
    icon.className = 'fa-solid fa-paper-plane';
}
</script>
@endsection