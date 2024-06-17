<html>

<head>
    <title>
        @yield('webname')
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
</head>

<body class="font-roboto bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a class="text-sm text-gray-600" href="#">
                    Top News
                </a>
                <a class="text-sm text-gray-600" href="#">
                    Terpopuler
                </a>
                <a class="text-sm text-gray-600" href="#">
                    Indeks Berita
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex space-x-2">
                    <a class="text-gray-600" href="#">
                        <i class="fab fa-facebook-f">
                        </i>
                    </a>
                    <a class="text-gray-600" href="#">
                        <i class="fab fa-twitter">
                        </i>
                    </a>
                    <a class="text-gray-600" href="#">
                        <i class="fab fa-instagram">
                        </i>
                    </a>
                    <a class="text-gray-600" href="#">
                        <i class="fab fa-youtube">
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <nav class="bg-red-700">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <a class="text-white text-lg font-bold" href="#">
                @yield('webname')
            </a>
            <div class="md:hidden">
                <button id="burger" class="text-white focus:outline-none">
                    <i class="fas fa-bars">
                    </i>
                </button>
            </div>
        </div>
        <div id="nav-links" class="hidden flex-col md:flex md:flex-row md:space-x-4 sm:px-4 sm:py-0 px-4">
            @yield('nav')
        </div>
    </nav>
    <main class="container mx-auto px-4 py-6">
        @yield('content')
        @yield('pagination')
    </main>
    <footer class="bg-red-700 text-white py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <div>
                    <p>
                        &copy; 2024 @yield('webname'). All rights reserved.
                    </p>
                </div>
                <div class="flex space-x-4">
                    <a href="#">
                        <i class="fab fa-facebook-f">
                        </i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter">
                        </i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram">
                        </i>
                    </a>
                    <a href="#">
                        <i class="fab fa-youtube">
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        document.getElementById('burger').addEventListener('click', function () {
            var navLinks = document.getElementById('nav-links');
            if (navLinks.classList.contains('hidden')) {
                navLinks.classList.remove('hidden');
                navLinks.classList.add('flex');
            } else {
                navLinks.classList.add('hidden');
                navLinks.classList.remove('flex');
            }
        });
    </script>
</body>

</html>
