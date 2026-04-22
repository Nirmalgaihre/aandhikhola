@extends('layouts.admin')
@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-[#1d0647] p-4 rounded-t-xl text-white text-center font-bold uppercase tracking-widest text-sm">
        <i class="fa-solid fa-up-down-left-right mr-2"></i> Adjust Staff Position
    </div>
    <div class="bg-white p-6 rounded-b-xl shadow-md border border-slate-200">
        <div id="sortable-list" class="space-y-2">
            @foreach($staff as $index => $s)
            <div class="flex items-center justify-between p-4 bg-white border border-slate-100 rounded-lg shadow-sm cursor-move hover:border-indigo-500 transition-all group" data-id="{{ $s->id }}">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/'.$s->staff_img) }}" class="w-12 h-12 rounded-full object-cover shadow-sm">
                    <div>
                        <h4 class="font-bold text-slate-700 text-sm">{{ $s->staff_name }}</h4>
                        <p class="text-[10px] text-slate-400 uppercase font-bold">Drag to move</p>
                    </div>
                </div>
                <span class="pos-idx text-xl font-black text-slate-200 group-hover:text-indigo-600 transition-colors">{{ $index + 1 }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    new Sortable(document.getElementById('sortable-list'), {
        animation: 150,
        ghostClass: 'bg-indigo-50',
        onEnd: function() {
            let order = [];
            let items = document.querySelectorAll('#sortable-list [data-id]');
            items.forEach((item, idx) => {
                item.querySelector('.pos-idx').innerText = idx + 1;
                order.push(item.getAttribute('data-id'));
            });

            fetch("{{ route('staff.reorder') }}", {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ order: order })
            });
        }
    });
</script>
@endsection