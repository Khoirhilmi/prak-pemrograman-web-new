<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Detail Card -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                @if($ticket->image_path)
                    <img src="{{ asset('storage/' . $ticket->image_path) }}" class="w-full h-80 object-cover">
                @endif
                
                <div class="p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="text-xs font-black text-indigo-600 uppercase tracking-widest">{{ $ticket->category->name }}</span>
                            <h2 class="text-3xl font-bold text-gray-900 mt-1">{{ $ticket->title }}</h2>
                            <p class="text-gray-400 text-sm mt-1">Dilaporkan pada {{ $ticket->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="text-right">
                            @php
                                $statusLabel = [
                                    'pending' => ['bg-rose-100 text-rose-700', 'Menunggu'],
                                    'in_progress' => ['bg-amber-100 text-amber-700', 'Diproses'],
                                    'resolved' => ['bg-emerald-100 text-emerald-700', 'Selesai'],
                                ][$ticket->status];
                            @endphp
                            <span class="px-4 py-2 rounded-xl font-bold text-sm {{ $statusLabel[0] }}">
                                {{ $statusLabel[1] }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="p-4 bg-gray-50 rounded-2xl">
                            <p class="text-xs text-gray-400 font-bold uppercase">Lokasi</p>
                            <p class="text-gray-900 font-semibold">{{ $ticket->location }}</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-2xl">
                            <p class="text-xs text-gray-400 font-bold uppercase">Pelapor</p>
                            <p class="text-gray-900 font-semibold">{{ $ticket->user->name }}</p>
                        </div>
                    </div>

                    <div class="prose max-w-none text-gray-700">
                        <h4 class="text-gray-900 font-bold mb-2">Deskripsi Laporan:</h4>
                        <p>{{ $ticket->description }}</p>
                    </div>

                    @if(Auth::user()->is_admin)
                        <div class="mt-10 p-6 bg-indigo-50 rounded-2xl border border-indigo-100">
                            <h4 class="font-bold text-indigo-900 mb-4">Panel Admin: Ubah Status</h4>
                            <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="flex gap-4">
                                @csrf @method('PUT')
                                <select name="status" class="flex-1 rounded-xl border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                </select>
                                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-xl font-bold">Update</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Chat/Comments Section -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-8">Diskusi Progres</h3>
                
                <div class="space-y-6 mb-10">
                    @foreach($ticket->comments as $comment)
                        <div class="flex {{ $comment->user_id == Auth::id() ? 'justify-end' : 'justify-start' }}">
                            <div class="max-w-[70%]">
                                <div class="flex items-center gap-2 mb-1 {{ $comment->user_id == Auth::id() ? 'justify-end' : '' }}">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase">{{ $comment->user->name }}</span>
                                </div>
                                <div class="px-5 py-3 rounded-2xl {{ $comment->user_id == Auth::id() ? 'bg-indigo-600 text-white rounded-tr-none' : 'bg-gray-100 text-gray-800 rounded-tl-none' }}">
                                    <p class="text-sm leading-relaxed">{{ $comment->message }}</p>
                                </div>
                                <p class="text-[9px] text-gray-300 mt-1 {{ $comment->user_id == Auth::id() ? 'text-right' : '' }}">
                                    {{ $comment->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <form action="{{ route('comments.store', $ticket) }}" method="POST" class="relative">
                    @csrf
                    <textarea name="message" rows="2" class="w-full rounded-2xl border-gray-200 focus:ring-indigo-500 focus:border-indigo-500 pr-20" placeholder="Tulis pesan..." required></textarea>
                    <button type="submit" class="absolute right-2 bottom-2 bg-indigo-600 text-white px-4 py-2 rounded-xl text-xs font-bold">Kirim</button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>