<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Kompas Energi
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding-left: 1rem;
        }

        .carousel-item {
            flex: 0 0 auto;
            scroll-snap-align: start;
            width: 100%;
            max-width: 300px;
            margin-right: 1rem;
        }

        .carousel::-webkit-scrollbar {
            display: none;
        }

        .read-more-btn {
            border: 2px solid;
            padding: 0.25rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: background-color 0.3s, color 0.3s;
        }

        .read-more-btn:hover {
            color: white;
        }
    </style>
</head>

<body class="font-roboto bg-gray-100 text-gray-800">
    <header class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center">
                <img alt="Logo" class="h-10 w-10" height="50"
                    src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-EpAov7aTUy4BCYmD6GKTjpvO/user-JR3sZQpahJls32fj7ZDxreYz/img-99OjzVjTtN6l3zHm0Ykouerw.png?st=2024-06-15T07%3A57%3A42Z&amp;se=2024-06-15T09%3A57%3A42Z&amp;sp=r&amp;sv=2023-11-03&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-06-14T19%3A12%3A09Z&amp;ske=2024-06-15T19%3A12%3A09Z&amp;sks=b&amp;skv=2023-11-03&amp;sig=ksWdfrnJj01csF4C/4GIREuzck0l5d4%2Bq4WWjp59SBc%3D"
                    width="50" />
                <h1 class="text-2xl font-bold ml-2">
                    Kompas Energi
                </h1>
            </div>
            <div class="md:hidden">
                <button id="menu-btn" class="text-gray-600 focus:outline-none">
                    <i class="fas fa-bars text-2xl">
                    </i>
                </button>
            </div>
            <nav id="menu" class="hidden md:flex space-x-4">
                @yield('nav')
            </nav>
            <div class="hidden md:flex items-center space-x-4">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Subscribe
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden">
            <nav class="flex flex-col space-y-2 px-6 py-4">
                @yield('nav')
            </nav>
        </div>
    </header>
    <main class="container mx-auto py-8 px-6">
        <section class="carousel mb-2" id="carousel">
            @yield('head-carousel')
        </section>
        <section class="flex flex-col md:flex-row">
            <div class="md:w-2/3 md:pr-6">
                @yield('content')
                @yield('pagination')
            </div>
            <aside class="md:w-1/3 mt-8 md:mt-0">
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h2 class="text-xl font-bold mb-4">
                        Search
                    </h2>
                    <div class="relative">
                        <input class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="Search..."
                            type="text" />
                        <button class="absolute right-2 top-2 text-gray-600">
                            <i class="fas fa-search">
                            </i>
                        </button>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h2 class="text-xl font-bold mb-4">
                        Recent Posts
                    </h2>
                    <ul>
                        @yield('recent-post')
                    </ul>
                </div>
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h2 class="text-xl font-bold mb-4">
                        Archives
                    </h2>
                    <ul>
                        <li class="mb-2">
                            <a class="text-blue-600 hover:underline" href="#">
                                May 2024
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="text-blue-600 hover:underline" href="#">
                                April 2024
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="text-blue-600 hover:underline" href="#">
                                March 2024
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h2 class="text-xl font-bold mb-4">
                        Categories
                    </h2>
                    <ul>
                        @yield('category-sidebar')
                    </ul>
                </div>
            </aside>
        </section>
        {{-- <section class="bg-blue-600 rounded-lg text-white py-8 mt-8">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold mb-4">
                    You May Have Missed
                </h2>
                <div class="carousel" id="carousel">
                    <div class="carousel-item bg-white text-gray-800 p-6 rounded-lg flex flex-col justify-between">
                        <div>
                            <span class="bg-blue-600 text-white px-2 py-1 rounded mb-4 inline-block">
                                Corporate
                            </span>
                            <h3 class="text-xl font-bold mb-4">
                                WeKnowledge BBM
                            </h3>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <img alt="Admin" class="h-10 w-10 rounded-full" height="40"
                                    src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-EpAov7aTUy4BCYmD6GKTjpvO/user-JR3sZQpahJls32fj7ZDxreYz/img-fWAs2w1H5ew6AkYf5YmTAxsk.png?st=2024-06-15T07%3A57%3A45Z&amp;se=2024-06-15T09%3A57%3A45Z&amp;sp=r&amp;sv=2023-11-03&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-06-14T18%3A55%3A23Z&amp;ske=2024-06-15T18%3A55%3A23Z&amp;sks=b&amp;skv=2023-11-03&amp;sig=iwKwu29vmi4HDA/SEHgQFKpHUzEEP5dtJOk31/7uJRY%3D"
                                    width="40" />
                                <span class="ml-2 text-gray-600">
                                    Admin
                                </span>
                            </div>
                            <span class="text-gray-600">
                                1 month ago
                            </span>
                        </div>
                    </div>
                    <div class="carousel-item bg-white text-gray-800 p-6 rounded-lg flex flex-col justify-between">
                        <div>
                            <span class="bg-blue-600 text-white px-2 py-1 rounded mb-4 inline-block">
                                Corporate
                            </span>
                            <h3 class="text-xl font-bold mb-4">
                                Quotes EPI Sejati
                            </h3>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <img alt="Admin" class="h-10 w-10 rounded-full" height="40"
                                    src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-EpAov7aTUy4BCYmD6GKTjpvO/user-JR3sZQpahJls32fj7ZDxreYz/img-fWAs2w1H5ew6AkYf5YmTAxsk.png?st=2024-06-15T07%3A57%3A45Z&amp;se=2024-06-15T09%3A57%3A45Z&amp;sp=r&amp;sv=2023-11-03&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-06-14T18%3A55%3A23Z&amp;ske=2024-06-15T18%3A55%3A23Z&amp;sks=b&amp;skv=2023-11-03&amp;sig=iwKwu29vmi4HDA/SEHgQFKpHUzEEP5dtJOk31/7uJRY%3D"
                                    width="40" />
                                <span class="ml-2 text-gray-600">
                                    Admin
                                </span>
                            </div>
                            <span class="text-gray-600">
                                1 month ago
                            </span>
                        </div>
                    </div>
                    <div class="carousel-item bg-white text-gray-800 p-6 rounded-lg flex flex-col justify-between">
                        <div>
                            <span class="bg-blue-600 text-white px-2 py-1 rounded mb-4 inline-block">
                                Corporate
                            </span>
                            <h3 class="text-xl font-bold mb-4">
                                PLN EPI Raih Juara 1 Dalam Acara Budget Review Periode Maret 2024
                            </h3>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <img alt="Admin" class="h-10 w-10 rounded-full" height="40"
                                    src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-EpAov7aTUy4BCYmD6GKTjpvO/user-JR3sZQpahJls32fj7ZDxreYz/img-fWAs2w1H5ew6AkYf5YmTAxsk.png?st=2024-06-15T07%3A57%3A45Z&amp;se=2024-06-15T09%3A57%3A45Z&amp;sp=r&amp;sv=2023-11-03&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-06-14T18%3A55%3A23Z&amp;ske=2024-06-15T18%3A55%3A23Z&amp;sks=b&amp;skv=2023-11-03&amp;sig=iwKwu29vmi4HDA/SEHgQFKpHUzEEP5dtJOk31/7uJRY%3D"
                                    width="40" />
                                <span class="ml-2 text-gray-600">
                                    Admin
                                </span>
                            </div>
                            <span class="text-gray-600">
                                1 month ago
                            </span>
                        </div>
                    </div>
                    <div class="carousel-item bg-white text-gray-800 p-6 rounded-lg flex flex-col justify-between">
                        <div>
                            <span class="bg-blue-600 text-white px-2 py-1 rounded mb-4 inline-block">
                                Corporate
                            </span>
                            <h3 class="text-xl font-bold mb-4">
                                Menjelajahi pengetahuan pipa gas
                            </h3>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <img alt="Admin" class="h-10 w-10 rounded-full" height="40"
                                    src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-EpAov7aTUy4BCYmD6GKTjpvO/user-JR3sZQpahJls32fj7ZDxreYz/img-fWAs2w1H5ew6AkYf5YmTAxsk.png?st=2024-06-15T07%3A57%3A45Z&amp;se=2024-06-15T09%3A57%3A45Z&amp;sp=r&amp;sv=2023-11-03&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-06-14T18%3A55%3A23Z&amp;ske=2024-06-15T18%3A55%3A23Z&amp;sks=b&amp;skv=2023-11-03&amp;sig=iwKwu29vmi4HDA/SEHgQFKpHUzEEP5dtJOk31/7uJRY%3D"
                                    width="40" />
                                <span class="ml-2 text-gray-600">
                                    Admin
                                </span>
                            </div>
                            <span class="text-gray-600">
                                1 month ago
                            </span>
                        </div>
                    </div>
                    <div class="carousel-item bg-white text-gray-800 p-6 rounded-lg flex flex-col justify-between">
                        <div>
                            <span class="bg-blue-600 text-white px-2 py-1 rounded mb-4 inline-block">
                                Corporate
                            </span>
                            <h3 class="text-xl font-bold mb-4">
                                Sekilas PLN EPI
                            </h3>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <img alt="Admin" class="h-10 w-10 rounded-full" height="40"
                                    src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-EpAov7aTUy4BCYmD6GKTjpvO/user-JR3sZQpahJls32fj7ZDxreYz/img-fWAs2w1H5ew6AkYf5YmTAxsk.png?st=2024-06-15T07%3A57%3A45Z&amp;se=2024-06-15T09%3A57%3A45Z&amp;sp=r&amp;sv=2023-11-03&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-06-14T18%3A55%3A23Z&amp;ske=2024-06-15T18%3A55%3A23Z&amp;sks=b&amp;skv=2023-11-03&amp;sig=iwKwu29vmi4HDA/SEHgQFKpHUzEEP5dtJOk31/7uJRY%3D"
                                    width="40" />
                                <span class="ml-2 text-gray-600">
                                    Admin
                                </span>
                            </div>
                            <span class="text-gray-600">
                                1 month ago
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main>
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>
                Copyright © 2024
            </p>
        </div>
    </footer>
    <script>
        document.getElementById('menu-btn').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });

        // const carousel = document.querySelector('.carousel');
        // let isDown = false;
        // let startX;
        // let scrollLeft;

        // carousel.addEventListener('mousedown', (e) => {
        //     isDown = true;
        //     carousel.classList.add('active');
        //     startX = e.pageX - carousel.offsetLeft;
        //     scrollLeft = carousel.scrollLeft;
        // });

        // carousel.addEventListener('mouseleave', () => {
        //     isDown = false;
        //     carousel.classList.remove('active');
        // });

        // carousel.addEventListener('mouseup', () => {
        //     isDown = false;
        //     carousel.classList.remove('active');
        // });

        // carousel.addEventListener('mousemove', (e) => {
        //     if (!isDown) return;
        //     e.preventDefault();
        //     const x = e.pageX - carousel.offsetLeft;
        //     const walk = (x - startX) * 3; //scroll-fast
        //     carousel.scrollLeft = scrollLeft - walk;
        // });

        // carousel.addEventListener('scroll', () => {
        //     if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth) {
        //         carousel.scrollLeft = 0;
        //     }
        // });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carousel = document.getElementById('carousel');
            const items = carousel.children;
            const firstItem = items[0].cloneNode(true);
            const lastItem = items[items.length - 1].cloneNode(true);

            carousel.insertBefore(lastItem, items[0]);
            carousel.appendChild(firstItem);

            let currentIndex = 1;
            carousel.scrollTo(items[currentIndex].offsetLeft, 0);

            carousel.addEventListener('scroll', function () {
                if (carousel.scrollLeft === 0) {
                    carousel.scrollTo(items[items.length - 2].offsetLeft, 0);
                    currentIndex = items.length - 2;
                } else if (carousel.scrollLeft >= items[currentIndex].offsetLeft) {
                    if (currentIndex === items.length - 1) {
                        carousel.scrollTo(items[1].offsetLeft, 0);
                        currentIndex = 1;
                    } else {
                        currentIndex++;
                    }
                }
            });
        });
    </script>
</body>

</html>
