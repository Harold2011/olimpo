<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <style>
        .carousel {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        .carousel-item {
            display: none;
            width: 100%;
            height: 100%;
        }
        .carousel-item.active {
            display: block;
        }
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            padding: 1rem;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .carousel-button.prev {
            left: 1rem;
        }
        .carousel-button.next {
            right: 1rem;
        }
    </style>
</head>
<body class="m-0 p-0 overflow-hidden">
    @include('components.nav_landing')

    <div class="carousel">
        <!-- Primera imagen estática -->
        <div class="carousel-item active">
            <img src="{{ asset('storage/img/OlimpoIndex.png') }}" alt="Image 1">
        </div>

        <!-- Imágenes dinámicas -->
        @foreach ($anuncio as $anuncios)
            <div class="carousel-item">
                <img src="{{ asset($anuncios->url) }}" alt="Anuncio">
            </div>
        @endforeach

        <button id="prev" class="carousel-button bg-yellow-500 prev">
            &#9664;
        </button>
        <button id="next" class="carousel-button bg-yellow-500 next">
            &#9654;
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.carousel-item');
            let currentItem = 0;

            function showNextItem() {
                items[currentItem].classList.remove('active');
                currentItem = (currentItem + 1) % items.length;
                items[currentItem].classList.add('active');
            }

            function showPrevItem() {
                items[currentItem].classList.remove('active');
                currentItem = (currentItem - 1 + items.length) % items.length;
                items[currentItem].classList.add('active');
            }

            document.getElementById('next').addEventListener('click', showNextItem);
            document.getElementById('prev').addEventListener('click', showPrevItem);

            setInterval(showNextItem, 10000); // Cambia de imagen cada 10 segundos
        });
    </script>
</body>
</html>
