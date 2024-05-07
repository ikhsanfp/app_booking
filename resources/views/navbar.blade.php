<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        import { Collapse, Dropdown, initTWE } from "tw-elements";
      
        // Inisialisasi Tailwind Elements
        initTWE({ Collapse, Dropdown });
      </script>
    <title>Solo Technopark | {{ $title }}</title>
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>

   <!-- Main navigation container -->
   <nav class="bg-gray-800 p-4 relative">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <a href="#" class="text-white font-bold text-xl">Brand</a>
        <ul class="hidden md:flex ml-4 items-center space-x-4">
          <li><a href="#" class="text-gray-300 hover:text-white">Home</a></li>
          <li><a href="#" class="text-gray-300 hover:text-white">About</a></li>
          <li><a href="#" class="text-gray-300 hover:text-white">Services</a></li>
          <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li>
        </ul>
      </div>
      <div class="md:hidden">
        <button id="mobile-menu-toggle" class="text-gray-300 hover:text-white focus:outline-none relative z-50">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path class="hidden md:block" fill-rule="evenodd" clip-rule="evenodd" d="M2 5h20v2H2V5zm0 6h20v2H2v-2zm0 6h20v2H2v-2z"/>
            <path class="block md:hidden" fill-rule="evenodd" clip-rule="evenodd" d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"/>
          </svg>
        </button>
      </div>
      <ul id="mobile-menu" class="hidden md:flex items-center space-x-4 absolute top-full left-0 bg-gray-800 w-full pt-4 pb-2">
        <li class="hidden"><a href="#" class="text-gray-300 hover:text-white block px-4 py-2">Home</a></li>
        <li class="hidden"><a href="#" class="text-gray-300 hover:text-white block px-4 py-2">About</a></li>
        <li class="hidden"><a href="#" class="text-gray-300 hover:text-white block px-4 py-2">Services</a></li>
        <li class="hidden"><a href="#" class="text-gray-300 hover:text-white block px-4 py-2">Contact</a></li>
      </ul>
    </div>
  </nav>
  
  <script>
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
  
    mobileMenuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
  
      // Toggle hidden class for each list item in the mobile menu
      const menuItems = mobileMenu.querySelectorAll('li');
      menuItems.forEach(item => {
        item.classList.toggle('hidden');
      });
    });
  </script>
  
  
</body>
      
</html>
