<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Halo, {{ Auth::user()->name }} 👋</h2>
                    <p class="text-gray-500 mt-1">Pantau laporan fasilitas kampus di sini.</p>
                </div>
                <a href="{{ route('tickets.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition">
                    + Buat Laporan
                </a>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-4 bg-blue-50 text-blue-600 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 italic">Total Laporan</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Ticket::count() }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-4 bg-yellow-50 text-yellow-600 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 italic">Proses</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Ticket::where('status', 'in_progress')->count() }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-4 bg-green-50 text-green-600 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 italic">Selesai</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Ticket::where('status', 'resolved')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-indigo-600 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl shadow-indigo-200">
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold">Layanan Perbaikan Cepat</h3>
                    <p class="mt-2 text-indigo-100 max-w-lg">Kami berkomitmen menjaga kenyamanan belajar Anda. Laporkan segera setiap kendala fasilitas yang Anda temui.</p>
                </div>
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white opacity-10 rounded-full"></div>
            </div>

        </div>
    </div>
</x-app-layout>