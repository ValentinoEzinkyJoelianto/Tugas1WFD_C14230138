@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Home</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">

    <style>
        .font-russo {
            font-family: 'Russo One', sans-serif;
        }

        #background-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            z-index: -1;
        }

        .background-layer {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: opacity 1.5s ease-in-out;
        }

        #background1 {
            opacity: 1;
        }
        #background2 {
            opacity: 0;
        }
        .element{
            overflow: hidden;
        }
        #modelSlider {
            overflow: hidden;
        }
    </style>
</head>
<body class="font-sans h-screen bg-cover bg-center text-gray-800">

    <div id="background-wrapper">
        <div id="background1" class="background-layer" style="background-image: url('image/bg1.jpg');"></div>
        <div id="background2" class="background-layer" style="background-image: url('image/bg2.jpg');"></div>
    </div>

    <section class="relative w-full h-[500px] flex items-center justify-center text-white text-center bg-cover bg-center">
    <div class="p-6 rounded-lg">
        <h2 class="text-5xl font-extrabold uppercase font-russo">Drive the Future</h2>
        <p class="mt-4 text-lg">Discover the power and innovation of Nissan's latest models.</p>
        <button onclick="window.location.href='/models'" 
            class="mt-6 inline-block bg-red-600 px-6 py-3 rounded-full text-white font-semibold 
            hover:bg-red-700 hover:scale-105 transition-transform duration-300 ease-in-out">
            Explore Models
        </button>
    </div>
</section>

<section class="py-16 px-6 md:px-12">
    <h2 class="text-4xl font-bold text-center mb-10 uppercase text-red-500 font-russo">Featured Models</h2>

    <div class="relative w-full flex items-center justify-center">
        <button id="prevBtn" class="absolute left-2 md:left-5 bg-gray-800 text-white px-4 py-2 rounded-full shadow-md z-10">
            ◀
        </button>

        <div id="modelSlider" class="flex gap-6 overflow-x-auto scroll-smooth w-full max-w-6xl px-4 md:px-10 py-4 snap-x snap-mandatory">
            @foreach([
                ['image' => 'gtr.jpg', 'name' => 'Nissan GT-R', 'desc' => 'High-performance sports car with cutting-edge technology.', 'link' => 'models#gtr'],
                ['image' => 'x-trail.jpg', 'name' => 'Nissan X-Trail', 'desc' => 'A powerful SUV designed for adventure and comfort.', 'link' => 'models#xtrail'],
                ['image' => 'sentra.jpg', 'name' => 'Nissan Sentra', 'desc' => 'A modern and fuel-efficient sedan for urban driving.', 'link' => 'models#sentra'],
                ['image' => 'juke.jpg', 'name' => 'Nissan Juke', 'desc' => 'A stylish compact SUV with dynamic performance.', 'link' => 'models#juke']
            ] as $car)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden min-w-[280px] md:min-w-[300px] lg:min-w-[320px] snap-center hover:scale-105 transition-transform duration-300 ease-in-out">
                    <img src="{{ asset('image/' . $car['image']) }}" class="w-full h-[250px] object-cover transition-transform duration-300 ease-in-out hover:scale-110">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold font-russo">{{ $car['name'] }}</h3>
                        <p class="text-gray-600 mt-2">{{ $car['desc'] }}</p>
                        <a href="{{ $car['link'] }}" class="block text-red-500 font-semibold mt-3">Learn More →</a>
                    </div>
                </div>
            @endforeach
        </div>

        <button id="nextBtn" class="absolute right-2 md:right-5 bg-gray-800 text-white px-4 py-2 rounded-full shadow-md z-10">
            ▶
        </button>
    </div>
</section>

<section class="bg-red-600 text-white text-center py-16">
    <h2 class="text-4xl font-bold uppercase font-russo">Exclusive Offers Await</h2>
    <p class="mt-4 text-lg">Get in touch today and drive home your dream Nissan.</p>
    <button onclick="window.location.href='/contact'" 
        class="mt-6 inline-block bg-white text-red-600 px-6 py-3 rounded-full font-semibold 
        hover:bg-gray-100 hover:scale-105 transition-transform duration-300 ease-in-out">
        Contact Us
    </button>
</section>

<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });

    let slider = document.getElementById("modelSlider");
    let prevBtn = document.getElementById("prevBtn");
    let nextBtn = document.getElementById("nextBtn");

    prevBtn.addEventListener("click", function() {
        slider.scrollBy({ left: -300, behavior: "smooth" });
    });

    nextBtn.addEventListener("click", function() {
        slider.scrollBy({ left: 300, behavior: "smooth" });
    });
</script>

@endsection
