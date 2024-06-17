<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        @yield('webname')
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
    <script>
        function toggleMenu() {
            var menu = document.getElementById('extra-categories');
            menu.classList.toggle('hidden');
        }

        function toggleSearch() {
            var searchInput = document.getElementById('search-input');
            var navLinks = document.getElementById('nav-links');
            searchInput.classList.toggle('hidden');
            navLinks.classList.toggle('mt-4');
        }
    </script>
</head>

<body class="bg-white text-gray-800">
    <header class="text-center py-8">
        <h1 class="text-2xl font-bold mt-4">
            @yield('webname')
        </h1>
    </header>
    <nav class="flex justify-center space-x-4 py-4 border-b">
        <a class="text-gray-600 hover:text-gray-900" href="#">
            <i class="fas fa-home">
            </i>
        </a>
        <a class="text-gray-600 hover:text-gray-900" href="#">
            <i class="fas fa-user">
            </i>
        </a>
        <a class="text-gray-600 hover:text-gray-900" href="#">
            <i class="fas fa-envelope">
            </i>
        </a>
        <a class="text-gray-600 hover:text-gray-900" href="#" onclick="toggleSearch()">
            <i class="fas fa-search">
            </i>
        </a>
    </nav>
    <div class="hidden text-center py-4" id="search-input">
        <input class="border border-gray-300 px-4 py-2 rounded w-3/4" placeholder="Search..." type="text" />
    </div>
    <nav class="flex flex-wrap justify-center space-x-4 py-4 md:space-x-2 md:flex-nowrap" id="nav-links">
        <a class="text-gray-900 font-bold" href="#">
            HOME
        </a>
        @yield('nav')
        <button class="text-gray-600 hover:text-gray-900 md:hidden" onclick="toggleMenu()">
            <i class="fas fa-bars">
            </i>
        </button>
    </nav>
    <div class="hidden md:hidden" id="extra-categories">
        <nav class="flex flex-wrap justify-center space-x-4 py-4">
            @yield('second-nav')
        </nav>
    </div>
    <main class="max-w-4xl mx-auto px-4">
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 py-8">
            @yield('random-content')
        </section>
        <section class="space-y-8">
            @yield('content')
        </section>
        @yield('pagination')
    </main>
    <footer class="text-center py-8 border-t">
        <p class="text-lg font-bold">
            Minima
        </p>
        <nav class="flex flex-wrap justify-center space-x-4 py-4">
            <a class="text-gray-600 hover:text-gray-900" href="#">
                HOME
            </a>
            <a class="text-gray-600 hover:text-gray-900" href="#">
                MORE THEMES
            </a>
            <a class="text-gray-600 hover:text-gray-900" href="#">
                ALL FEATURES
            </a>
            <a class="text-gray-600 hover:text-gray-900" href="#">
                SEE MORE DEMOS
            </a>
        </nav>
        <p class="text-gray-600">
            Code © {{date('Y')}} @yield('webname'). All rights reserved.
        </p>
    </footer>
</body>

</html>
