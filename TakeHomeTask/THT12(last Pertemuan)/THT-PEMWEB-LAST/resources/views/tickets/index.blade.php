<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('List Pengaduan') }}
            </h2>
            <a href="{{ route('tickets.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold text-sm">
                + Laporan Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($tickets->isEmpty())
                <div class="bg-white p-12 rounded-3xl text-center shadow-sm">
                    <p class="text-gray-500">Belum ada laporan yang tercatat.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($tickets as $ticket)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <!-- Image Header -->
                            <div class="h-48 overflow-hidden bg-gray-200 relative">
                                @if($ticket->image_path)
                                    <img src="{{ asset('storage/' . $ticket->image_path) }}" class="w-full h-full object-cover">
                                @endif
                                <div class="absolute top-4 right-4">
                                    @php
                                        $badgeColor = [
                                            'pending' => 'bg-rose-500',
                                            'in_progress' => 'bg-amber-500',
                                            'resolved' => 'bg-emerald-500',
                                        ][$ticket->status];
                                    @endphp
                                    <span class="px-3 py-1 text-[10px] font-black text-white uppercase rounded-full {{ $badgeColor }} shadow-lg">
                                        {{ $ticket->status }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center text-xs text-indigo-600 font-bold mb-2 uppercase tracking-widest">
                                    {{ $ticket->category->name }}
                                </div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2 truncate">{{ $ticket->title }}</h4>
                                <p class="text-gray-500 text-sm line-clamp-2 mb-4 italic">
                                    "{{ $ticket->description }}"
                                </p>
                                
                                <div class="pt-4 border-t border-gray-50 flex justify-between items-center text-xs text-gray-400 font-medium">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0zM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                        {{ $ticket->user->name }}
                                    </div>
                                    <a href="{{ route('tickets.show', $ticket) }}" class="text-indigo-600 font-bold hover:underline">
                                        Lihat Detail &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>