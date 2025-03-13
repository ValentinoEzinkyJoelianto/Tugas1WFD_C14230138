{{-- layouts/main.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="flex flex-col min-h-screen">
    <nav class="bg-white text-black py-4 px-6 md:px-8 flex justify-between items-center fixed w-full shadow-md z-50">
        <img src="{{ asset('image/nissanlogo.png') }}" class="w-10 h-10 object-contain">

        <ul class="hidden md:flex space-x-6 text-lg">
            <li><a href="/" class="hover:text-red-500 transition">Home</a></li>
            <li><a href="/models" class="hover:text-red-500 transition">Models</a></li>
            <li><a href="/contact" class="hover:text-red-500 transition">Contact</a></li>
        </ul>
        <button id="menu-toggle" class="md:hidden text-black focus:outline-none">
            ☰
        </button>
    </nav>

    <div id="mobile-menu" class="hidden fixed top-16 left-0 w-full bg-white shadow-md md:hidden z-50">
        <ul class="flex flex-col items-center space-y-4 py-6 text-lg">
            <li><a href="/" class="hover:text-red-500 transition">Home</a></li>
            <li><a href="/models" class="hover:text-red-500 transition">Models</a></li>
            <li><a href="/contact" class="hover:text-red-500 transition">Contact</a></li>
        </ul>
    </div>

    <div class="flex-1"> 
        @yield('content')
    </div>

    <footer class="bg-black text-white text-center py-6 w-full">
        <p>&copy; 2025 Nissan. All rights reserved.</p>
    </footer>
</body>
</html>