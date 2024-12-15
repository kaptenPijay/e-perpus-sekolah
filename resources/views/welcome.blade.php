<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Perpustakaan Sekolah</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(Storage::url($setting->favicon ?? 'favicons/favicon.ico')) }}" type="image/x-icon">
    <!-- Styles -->
    <link rel="stylesheet" href="/assets/app.css">

</head>
<body class="antialiased bg-white-900 dark:bg-gray-900 text-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <a href="/" class="flex items-center">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
                <div class="flex items-center space-x-4 mt-4 md:mt-0">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900">Daftar</a>
                        @endif
                    @endauth
                </div>


            </div>

            <div class="flex flex-col items-center mt-16">
                <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800 dark:text-white">Selamat datang di Sistem Informasi Perpustakaan Rumah Belajar Jambi (RUMBAI)</h1>
                <h2 class="text-3xl font-semibold mb-6 text-red-400">{{ App\Models\Setting::first()->webname }}</h2>
                <p class="text-gray-100 text-center max-w-md text-gray-800 dark:text-white">Masuk untuk mengakses layanan perpustakaan secara online.</p>
                <div class="flex flex-col md:flex-row mt-8 space-y-4 md:space-y-0 md:space-x-4">
                    <a href="{{ route('login') }}" class="bg-white shadow-lg rounded-lg p-4 flex items-center justify-center space-x-2 transition duration-300 hover:shadow-xl w-full md:w-auto">
                        <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center">
                            <img src="https://www.svgrepo.com/show/408745/login-sign-in-user-entrance-account.svg" alt="Login Icon" class="w-8 h-8">
                        </div>
                        <span class="text-xl font-semibold text-gray-900">Masuk</span>
                    </a>
                    <a href="{{ route('register') }}" class="bg-white shadow-lg rounded-lg p-4 flex items-center justify-center space-x-2 mt-4 md:mt-0 transition duration-300 hover:shadow-xl w-full md:w-auto">
                        <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center">
                            <img src="https://www.svgrepo.com/show/515135/book.svg" alt="Register Icon" class="w-8 h-8">
                        </div>
                        <span class="text-xl font-semibold text-gray-900">Daftar</span>
                    </a>
                </div>
            </div>
            <div class="mx-auto" style="width: 50%;">
                <h1 style="color: black; font-size:3rem;font-weight:bold" class="text-center">Data Buku</h1>
            </div>

            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Penulis
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tahun Rilis
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($buku as $item)
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->nama_buku }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->penulis }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->tahun_rilis }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500" colspan="6">
                                    Tidak ada data yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

              <!-- Toggle Switch for Dark Mode -->

            <div class="flex justify-between items-center mt-16">
                <p class="text-sm text-gray-500">© {{ date('Y') }} Sistem Informasi Perpustakaan Sekolah. <a href="https://abdulmanap.com">Dibuat dengan ❤️</a></p>
                <p class="text-sm text-gray-500">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            </div>
        </div>
    </div>
</body>
<script src="/assets/app.js"></script>


</html>
