<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('webname')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .content img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center">
                <i class="fab fa-twitter text-blue-500 text-2xl"></i>
                <h1 class="ml-4 text-2xl font-bold">@yield('webname')</h1>
            </div>
            <div class="flex items-center lg:hidden">
                <button id="menu-toggle" class="text-xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>
    <nav class="bg-white shadow mt-4">
        <div class="container mx-auto">
            <div class="hidden lg:flex justify-center space-x-6 py-4">
                <a href="#" class="text-yellow-600 font-bold">HOME</a>
                @yield('nav')
            </div>
            <div id="mobile-menu" class="lg:hidden flex flex-col space-y-2 py-4 pl-4 hidden">
                <a href="#" class="text-yellow-600 font-bold">HOME</a>
                @yield('nav')
            </div>
        </div>
    </nav>
    <main class="container mx-auto mt-8 flex flex-col lg:flex-row">
        <div class="w-full lg:w-3/4">
            @yield('content')
            @yield('pagination')
        </div>
        <aside class="w-full lg:w-1/4 lg:pl-6 mt-8 lg:mt-0">
            <div class="bg-white shadow p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Search</h3>
                <input type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Search">
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded w-full">Search</button>
            </div>
            <div class="bg-white shadow p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Recent Posts</h3>
                <ul class="space-y-2">
                    @yield('recent-post')
                </ul>
            </div>
            <div class="bg-white shadow p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Recent Comments</h3>
                <p class="text-gray-600">No comments to show.</p>
            </div>
            <div class="bg-white shadow p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Archives</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600">May 2024</a></li>
                    <li><a href="#" class="text-gray-600">April 2024</a></li>
                    <li><a href="#" class="text-gray-600">March 2024</a></li>
                </ul>
            </div>
            <div class="bg-white shadow p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Categories</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600">Corporate</a></li>
                </ul>
            </div>
        </aside>
    </main>
    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto py-4 px-6 text-center">
            <p class="text-gray-600">Copyright © 2024 @yield('webname')</p>
        </div>
    </footer>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
