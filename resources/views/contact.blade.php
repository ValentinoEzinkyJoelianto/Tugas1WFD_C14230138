@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Nissan</title>

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
            background-repeat: no-repeat;
            transition: opacity 1.5s ease-in-out;
        }

        #background1 {
            opacity: 1;
        }
        #background2 {
            opacity: 0;
        }
    </style>
</head>
<body class="font-sans text-gray-800">
    <div id="background-wrapper">
        <div id="background1" class="background-layer" style="background-image: url('image/bg1.jpg');"></div>
        <div id="background2" class="background-layer" style="background-image: url('image/bg2.jpg');"></div>
    </div>

    <section class="py-16 px-4 md:px-8 text-center">
        <div class="bg-black p-6 md:p-10 rounded-lg shadow-lg w-full max-w-lg mx-auto mt-10">
            <h2 class="text-4xl md:text-5xl font-extrabold uppercase font-russo text-red-600">Contact Nissan</h2>
            <p class="mt-4 text-white">We would love to hear from you!</p>
        </div>
    </section>

    <section class="flex flex-col md:flex-row justify-center items-center gap-6 md:gap-10 px-4 md:px-8 pb-16">
        <div class="bg-white p-6 md:p-10 rounded-lg shadow-lg w-full max-w-lg md:w-1/3">
            <h3 class="text-2xl font-bold text-gray-800 text-center md:text-left">Contact Information</h3>
            <p class="text-gray-600 mt-4 text-center md:text-left">Feel free to reach out to us through the details below:</p>
            <div class="mt-6 space-y-3">
                <p class="text-lg text-gray-700"><strong>📍 Address:</strong> Nissan HQ, Tokyo, Japan</p>
                <p class="text-lg text-gray-700"><strong>📞 Phone:</strong> +81 3-1234-5678</p>
                <p class="text-lg text-gray-700"><strong>📧 Email:</strong> support@nissan.com</p>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        });

        let backgrounds = [
            "{{ asset('image/bg1.jpg') }}",
            "{{ asset('image/bg2.jpg') }}"
        ];
        let bgIndex = 0;

        function switchBackground() {
            let bg1 = document.getElementById("background1");
            let bg2 = document.getElementById("background2");

            bgIndex = (bgIndex + 1) % backgrounds.length;

            if (bgIndex % 2 === 0) {
                bg1.style.backgroundImage = `url('${backgrounds[bgIndex]}')`;
                bg1.style.opacity = "1";
                bg2.style.opacity = "0";
            } else {
                bg2.style.backgroundImage = `url('${backgrounds[bgIndex]}')`;
                bg2.style.opacity = "1";
                bg1.style.opacity = "0";
            }
        }

        setInterval(switchBackground, 5000);
    </script>

@endsection