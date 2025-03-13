@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Models</title>

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

        .circle-nav {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            cursor: pointer;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease-in-out, border 0.3s ease-in-out;
            border: 4px solid white;
        }

        .circle-nav:hover {
            transform: scale(1.1);
        }

        .active {
            border: 4px solid red !important;
        }

        .fade-image {
            transition: opacity 1s ease-in-out;
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
        }
    </style>
</head>
<body class="font-sans h-screen bg-cover bg-center text-gray-800">

    <div id="background-wrapper">
        <div id="background1" class="background-layer" style="background-image: url('image/bg1.jpg');"></div>
        <div id="background2" class="background-layer" style="background-image: url('image/bg2.jpg');"></div>
    </div>

    <section class="py-20 px-4 md:px-8 text-center">
        <div class="bg-black p-6 rounded-lg shadow-lg w-fit mx-auto">
            <h2 class="text-4xl md:text-5xl font-extrabold uppercase font-russo text-red-600">Nissan Models</h2>
            <p class="mt-4 text-white">Choose a model to see its details</p>
        </div>

        <div class="flex flex-wrap justify-center gap-5 mt-10">
            <div onclick="selectModel('gtr')" id="gtr-circle" class="circle-nav active"
                style="background-image: url('image/gtr.jpg');">
            </div>
            <div onclick="selectModel('xtrail')" id="xtrail-circle" class="circle-nav"
                style="background-image: url('image/x-trail.jpg');">
            </div>
            <div onclick="selectModel('sentra')" id="sentra-circle" class="circle-nav"
                style="background-image: url('image/sentra.jpg');">
            </div>
            <div onclick="selectModel('juke')" id="juke-circle" class="circle-nav"
                style="background-image: url('image/juke.jpg');">
            </div>
        </div>

        <div class="mt-12">
            <div class="bg-black p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto text-center">
                <img id="model-image" src="{{ asset('image/gtr.jpg') }}" class="fade-image w-64 h-40 object-cover mx-auto rounded-lg shadow-lg">
                <h3 id="model-title" class="text-2xl md:text-3xl font-semibold font-russo mt-6 text-white">Nissan GT-R</h3>
                <p id="model-description" class="mt-4 text-lg text-red-400">A high-performance sports car with cutting-edge technology.</p>
                <p id="model-price" class="mt-2 text-xl font-bold text-red-600">Starting Price: $113,540</p>
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

        let models = {
            "gtr": {
                "title": "Nissan GT-R",
                "description": "A high-performance sports car with cutting-edge technology.",
                "price": "Starting Price: $113,540",
                "images": [
                    "{{ asset('image/gtr.jpg') }}",
                    "{{ asset('image/gtr2.jpg') }}",
                    "{{ asset('image/gtr3.jpg') }}"
                ]
            },
            "xtrail": {
                "title": "Nissan X-Trail",
                "description": "A powerful SUV designed for adventure and comfort.",
                "price": "Starting Price: $28,000",
                "images": [
                    "{{ asset('image/x-trail.jpg') }}",
                    "{{ asset('image/x-trail2.jpg') }}",
                    "{{ asset('image/x-trail3.jpg') }}"
                ]
            },
            "sentra": {
                "title": "Nissan Sentra",
                "description": "A modern and fuel-efficient sedan for urban driving.",
                "price": "Starting Price: $20,000",
                "images": [
                    "{{ asset('image/sentra.jpg') }}",
                    "{{ asset('image/sentra2.jpg') }}",
                    "{{ asset('image/sentra3.jpg') }}"
                ]
            },
            "juke": {
                "title": "Nissan Juke",
                "description": "A stylish compact SUV with dynamic performance.",
                "price": "Starting Price: $28,890",
                "images": [
                    "{{ asset('image/juke.jpg') }}",
                    "{{ asset('image/juke2.jpg') }}",
                    "{{ asset('image/juke3.jpg') }}"
                ]
            }
        };

        let currentIndex = { "gtr": 0, "xtrail": 0, "sentra": 0, "juke": 0};
        let activeModel = "gtr";

        function selectModel(model) {
            activeModel = model;
            updateModelInfo();
            document.querySelectorAll('.circle-nav').forEach(el => el.classList.remove('active'));
            document.getElementById(model + "-circle").classList.add("active");
        }

        function updateModelInfo() {
            let imageElement = document.getElementById("model-image");
            let model = models[activeModel];

            imageElement.classList.add("fade-out");

            setTimeout(() => {
                document.getElementById("model-title").textContent = model.title;
                document.getElementById("model-description").textContent = model.description;
                document.getElementById("model-price").textContent = model.price;
                imageElement.src = model.images[currentIndex[activeModel]];
                imageElement.classList.remove("fade-out");
                imageElement.classList.add("fade-image");
            }, 500);
        }

        setInterval(() => {
            currentIndex[activeModel] = (currentIndex[activeModel] + 1) % models[activeModel].images.length;
            updateModelInfo();
        }, 5000);

        document.addEventListener("DOMContentLoaded", function () {
            const urlHash = window.location.hash.substring(1);
            if (models[urlHash]) {
                selectModel(urlHash);
            }
        })
    </script>

</body>
</html>

@endsection