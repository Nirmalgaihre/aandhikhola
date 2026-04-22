<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aandhikhola Polytechnic Institute | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <div class="bg-[#003366] text-white py-2 px-6 text-[11px] hidden md:block">
        <div class="max-w-7xl mx-auto flex justify-between uppercase tracking-widest">
            <span><i class="fa-solid fa-location-dot mr-2"></i> Walling-13, Syangja, Nepal</span>
            <span><i class="fa-solid fa-phone mr-2"></i> 9856001005 | info@abps.edu.np</span>
        </div>
    </div>

    <nav class="bg-white shadow-sm sticky top-0 z-50 py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('assets/img/logo.png') }}" class="w-12 h-12">
                <div>
                    <h1 class="font-black text-[#003366] text-xl leading-none">AANDHIKHOLA</h1>
                    <p class="text-[9px] text-gray-500 font-bold uppercase tracking-widest">Polytechnic Institute</p>
                </div>
            </div>
            <div class="hidden md:flex space-x-6 text-[11px] font-bold uppercase tracking-wider">
                <a href="#" class="text-[#003366]">Home</a>
                <a href="#programs" class="hover:text-[#c29921]">Programs</a>
                <a href="#id-cards" class="hover:text-[#c29921]">Student ID</a>
                <a href="/login" class="border-2 border-[#003366] px-4 py-1.5 rounded-md hover:bg-[#003366] hover:text-white transition">Admin</a>
            </div>
        </div>
    </nav>

    <header class="relative h-[500px] flex items-center justify-center text-center text-white">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80');"></div>
        <div class="absolute inset-0 bg-[#003366]/80"></div>
        <div class="relative z-10 px-6">
            <h2 class="text-4xl md:text-5xl font-black uppercase mb-4">Quality Technical Education</h2>
            <p class="text-lg text-gray-200 mb-8">A Constituent Technical School under CTEVT</p>
            <a href="#id-cards" class="bg-[#c29921] px-8 py-4 rounded-full font-bold uppercase text-xs tracking-widest hover:bg-yellow-600 transition">Get Started</a>
        </div>
    </header>

    <section class="py-20 px-6 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="bg-white p-8 rounded-2xl shadow-sm border-l-8 border-[#003366]">
            <h2 class="text-2xl font-black text-[#003366] uppercase mb-6">Message from the Principal</h2>
            <p class="text-gray-600 italic leading-relaxed mb-6">
                "Our mission is to provide quality technical education and vocational training to the youth of Nepal. 
                We focus on hands-on practical learning to ensure our students gain real-world knowledge."
            </p>
            <h4 class="font-bold text-gray-800">Suman Kattel</h4>
            <span class="text-xs text-gray-400 uppercase">Principal, API</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-[#003366] text-white p-8 rounded-2xl text-center">
                <span class="text-3xl font-black block">48</span>
                <span class="text-[10px] uppercase font-bold tracking-widest text-gray-400">IT Seats</span>
            </div>
            <div class="bg-[#c29921] text-white p-8 rounded-2xl text-center">
                <span class="text-3xl font-black block">48</span>
                <span class="text-[10px] uppercase font-bold tracking-widest text-yellow-900">Civil Seats</span>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 px-6 border-t border-b">
        <div class="max-w-7xl mx-auto">
            <h3 class="text-center font-black text-2xl text-[#003366] uppercase mb-12">Salient Features</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($features as $feature)
                <div class="text-center group">
                    <div class="w-14 h-14 bg-gray-50 text-[#003366] rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#003366] group-hover:text-white transition">
                        <i class="fa-solid {{ $feature->icon }} text-xl"></i>
                    </div>
                    <h5 class="font-bold text-sm uppercase mb-2">{{ $feature->title }}</h5>
                    <p class="text-xs text-gray-500">{{ $feature->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="id-cards" class="py-24 px-6 max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-[#003366] uppercase">Search ID Card</h2>
            <p class="text-gray-400 mt-2 text-sm uppercase tracking-widest">Digital Identity Verification Portal</p>
        </div>

        <div class="max-w-md mx-auto mb-16">
            <div class="relative">
                <input type="text" id="searchInput" onkeyup="searchCards()" placeholder="Type student name..." class="w-full px-12 py-4 bg-white border border-gray-200 rounded-2xl focus:ring-2 focus:ring-[#003366] outline-none shadow-sm transition">
                <i class="fa-solid fa-search absolute left-5 top-5 text-gray-400"></i>
            </div>
        </div>

        <div id="cardGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($cards as $card)
            <div class="card-item bg-white p-6 rounded-2xl border border-gray-100 text-center hover:shadow-xl transition duration-300">
                <img src="{{ asset('storage/' . $card->profile_image) }}" class="w-20 h-20 mx-auto rounded-full object-cover mb-4">
                <h6 class="font-bold text-gray-800 text-xs uppercase mb-1">{{ $card->name }}</h6>
                <p class="text-[9px] text-[#c29921] font-black uppercase mb-4">{{ $card->program }}</p>
                <a href="{{ route('id_cards.pdf', $card->id) }}" target="_blank" class="block w-full py-2 bg-[#003366] text-white text-[10px] font-bold rounded-lg uppercase">Download PDF</a>
            </div>
            @endforeach
        </div>
    </section>

    <footer class="bg-[#003366] text-white py-10 text-center text-[10px] uppercase tracking-widest">
        &copy; {{ date('Y') }} Aandhikhola Polytechnic Institute. Designed for Educational Management.
    </footer>

    <script>
        function searchCards() {
            let filter = document.getElementById('searchInput').value.toLowerCase();
            let items = document.getElementsByClassName('card-item');
            for (let i = 0; i < items.length; i++) {
                let name = items[i].getElementsByTagName('h6')[0].innerText.toLowerCase();
                items[i].style.display = name.includes(filter) ? "" : "none";
            }
        }
    </script>
</body>
</html>