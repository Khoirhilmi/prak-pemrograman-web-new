<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UniFix - Campus Care System</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-slate-50 dark:bg-gray-900">
        <div class="relative flex justify-center items-center min-h-screen">
            <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center">
                
                <div class="mb-8 flex justify-center">
                    <div class="p-3 bg-indigo-600 rounded-2xl shadow-xl shadow-indigo-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.007.51.011.77.011h.914c1.636 0 3.058.91 3.782 2.261 1.152-2.082 2.27-4.462 2.27-7.011 0-2.55-1.118-4.93-2.27-7.011C15.092 3.091 13.67 4 12.034 4h-.914c-.26 0-.517.004-.77.011m0 9.18c-.67.013-1.335.021-2.003.021H8.5a4.5 4.5 0 0 1 0-9h1.837c.668 0 1.333.008 2.003.021M6.75 12h.008v.008H6.75V12Zm0-6h.008v.008H6.75V6Zm0 12h.008v.008H6.75V18Z" />
                        </svg>
                    </div>
                </div>

                <h1 class="text-6xl font-black text-indigo-900 dark:text-white mb-4 tracking-tight">
                    Uni<span class="text-indigo-600">Fix</span>
                </h1>
                
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Sistem Pelaporan Fasilitas Kampus Terpadu. <br> 
                    Sampaikan keluhanmu, biarkan kami yang memperbaikinya.
                </p>

                <div class="flex justify-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-lg hover:bg-indigo-700 transition-all">Buka Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-indigo-600 font-bold rounded-xl shadow-md border border-indigo-100 hover:bg-indigo-50 transition-all">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-lg hover:bg-indigo-700 transition-all">Daftar Akun</a>
                            @endif
                        @endauth
                    @endif
                </div>

                <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center text-indigo-600 mb-4 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900">Buat Tiket</h3>
                        <p class="text-sm text-gray-500 mt-2">Laporkan kerusakan dengan bukti foto yang jelas.</p>
                    </div>
                    <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center text-indigo-600 mb-4 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3h9m-9 3h9m-6.75-12a3 3 0 0 0-3 3v15l3-3 3 3 3-3 3 3V3.75a3 3 0 0 0-3-3h-9Z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900">Pantau Status</h3>
                        <p class="text-sm text-gray-500 mt-2">Lihat progres perbaikan secara real-time.</p>
                    </div>
                    <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center text-indigo-600 mb-4 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.883.167 1.5 1.015 1.5 1.966v6.75c0 .951-.617 1.799-1.5 1.966a48.471 48.471 0 0 1-16.5 0c-.883-.167-1.5-1.015-1.5-1.966v-6.75c0-.951.617-1.799 1.5-1.966m16.5 0a48.108 48.108 0 0 0-3.478-.397m-13.022.397a48.11 48.11 0 0 1 3.478-.397m7.5 0v-2.73a3 3 0 0 0-3-3h-3a3 3 0 0 0-3 3v2.73m7.5 0a48.667 48.667 0 0 1-7.5 0" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900">Diskusi</h3>
                        <p class="text-sm text-gray-500 mt-2">Berkomunikasi langsung dengan tim teknisi kampus.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>