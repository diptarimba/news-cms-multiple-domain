<html>
 <head>
  <title>
   Uzone Games
  </title>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <script>
    function toggleCategories() {
      var categories = document.getElementById("hidden-categories");
      if (categories.style.display === "none" || categories.style.display === "") {
        categories.style.display = "block";
      } else {
        categories.style.display = "none";
      }
    }
    function stripHtmlEntities(content) {
      return content.replace(/&nbsp;/g, ' ');
    }

    document.addEventListener('DOMContentLoaded', function() {
      const elements = document.querySelectorAll('p, span, div, h1, h2, h3, h4, h5, h6');
      elements.forEach(element => {
        element.innerHTML = stripHtmlEntities(element.innerHTML);
      });
    });
  </script>
  <style>
    img {
      max-width: 100%;
      height: auto;
    }

    .container {
      width: 100%;
    }

    @media (min-width: 640px) {
      .container {
        max-width: 640px;
      }
    }

    @media (min-width: 768px) {
      .container {
        max-width: 768px;
      }
    }

    @media (min-width: 1024px) {
      .container {
        max-width: 1024px;
      }
    }

    @media (min-width: 1280px) {
      .container {
        max-width: 1280px;
      }
    }

    @media (min-width: 1536px) {
      .container {
        max-width: 1536px;
      }
    }
    </style>
 </head>
 <body class="font-roboto">
    @yield('nav')
    <header class="bg-gradient-to-r from-purple-600 to-red-500 text-white">
        <div class="container mx-auto flex justify-between items-center py-4 px-4 md:px-0">
         <div class="flex items-center">
          <a class="text-2xl font-bold" href="/">
           Uzone
           <span class="text-pink-300">GAMES</span>
          </a>
         </div>
         <nav class="hidden md:flex space-x-4">
            @stack('category-desktop')
         </nav>
         <div class="flex space-x-4">
          <a class="hover:text-gray-300" href="#"><i class="fas fa-search"></i></a>
          <a class="hover:text-gray-300 cursor-pointer md:hidden" onclick="toggleCategories()"><i class="fas fa-bars"></i></a>
         </div>
        </div>
        <div id="hidden-categories" class="hidden-categories bg-white text-black p-4 md:hidden">
         <nav class="space-y-2">
            @stack('category-mobile')
         </nav>
        </div>
       </header>
  <main class="container mx-auto mt-8 px-4 md:px-0">
    @yield('content')

   @yield('pagination')
  </main>
  <footer class="bg-gray-100 py-8">
   <div class="container mx-auto text-center">
    <div class="mb-4">
     <a class="text-2xl font-bold" href="#">
      Uzone
      <span class="text-pink-300">
       ID
      </span>
     </a>
    </div>
    <div class="space-x-4 mb-4">
     <a class="text-gray-600 hover:text-gray-800" href="#">
      Tentang Kami
     </a>
     <a class="text-gray-600 hover:text-gray-800" href="#">
      Ketentuan Layanan
     </a>
     <a class="text-gray-600 hover:text-gray-800" href="#">
      Kebijakan Privasi
     </a>
     <a class="text-gray-600 hover:text-gray-800" href="#">
      Pedoman Media Siber
     </a>
    </div>
    <div class="space-x-4 mb-4">
     <a class="text-gray-600 hover:text-gray-800" href="#">
      <i class="fab fa-facebook">
      </i>
     </a>
     <a class="text-gray-600 hover:text-gray-800" href="#">
      <i class="fab fa-twitter">
      </i>
     </a>
     <a class="text-gray-600 hover:text-gray-800" href="#">
      <i class="fab fa-instagram">
      </i>
     </a>
     <a class="text-gray-600 hover:text-gray-800" href="#">
      <i class="fab fa-youtube">
      </i>
     </a>
    </div>
    <div class="text-gray-600">
     © 2024 PT. Metra-Net. All rights reserved.
    </div>
   </div>
  </footer>
 </body>
</html>
