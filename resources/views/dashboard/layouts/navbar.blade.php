@php
    use App\Model\Pesan;
    use Illuminate\Support\Facades\Auth;

    $pemain = Auth::user()->namapemain;
@endphp

<nav class="py-3 px-4 bg-white rounded-b-2xl shadow-xl relative max-w-full">
    <div class="container mx-auto duration-300 ease-in-out">
      {{-- Web Menu --}}
      <div class="flex items-center justify-between">
        <div class="mr-10 flex items-center">
          <img src="./img/logostp.png" alt="Logo" class="h-10 w-auto" />
        </div>
        <div class="hidden md:flex md:flex-grow web-menu duration-300 ease-in-out ml-4"> <!-- Hide by default, show on medium and above with smooth transition -->
          <ul class="flex space-x-4 font-bold">
            <li class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === 'home') ? 'active' : 'text-gray-600' }}">
              <a href="/home">Home</a>
            </li>
            <li class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === 'panduan') ? 'active' : 'text-gray-600' }}">
              <a href="/panduan">Panduan</a>
            </li>
            <li class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === 'pesan') ? 'active' : 'text-gray-600' }}">
              <a href="/pesan">Pesan</a>
            </li>
            <li class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === 'laporan') ? 'active' : 'text-gray-600' }}">
              <a href="/laporan">Laporan</a>
            </li>
          </ul>
        </div>
        <div class="relative hidden md:flex logout-menu transition-all duration-300 ease-in-out"> <!-- Hide by default, show on medium and above with smooth transition -->
          <button id="dropdownMenuButton" class="flex items-center font-bold px-4 py-4 rounded-3xl hover:text-blue-400 focus:outline-none transition-all duration-300 ease-in-out">
            {{ $pemain }}
            <svg id="dropdownIcon" class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path id="downIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              <path id="upIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownMenu" class="hidden absolute right-0 mt-10 w-48 bg-white rounded-md shadow-lg z-50 transition-all duration-300 ease-in-out">
            <form action="/logout" method="post">
              @csrf
              <button class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-t-md">Logout</button>
            </form>
          </div>
        </div>
        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button id="mobile-menu-button" class="text-gray-600 hover:text-blue-400 focus:outline-none transition-all duration-100 ease-in-out">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>
      <!-- Mobile menu -->
      <div id="mobile-menu" class="hidden md:hidden absolute w-full left-0 top-full bg-white shadow-lg z-50 transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
        <ul class="flex flex-col space-y-4 mt-4 p-4">
          <li class="py-2 px-4 rounded-3xl hover:text-blue-400 {{ ($active === 'home') ? 'active' : 'text-gray-600' }}">
            <a href="/home">Home</a>
          </li>
          <li class="py-2 px-4 rounded-3xl hover:text-blue-400 {{ ($active === 'panduan') ? 'active' : 'text-gray-600' }}">
            <a href="/panduan">Panduan</a>
          </li>
          <li class="py-2 px-4 rounded-3xl hover:text-blue-400 {{ ($active === 'pesan') ? 'active' : 'text-gray-600' }}">
            <a href="/pesan">Pesan</a>
          </li>
          <li class="py-2 px-4 rounded-3xl hover:text-blue-400 {{ ($active === 'laporan') ? 'active' : 'text-gray-600' }}">
            <a href="/laporan">Laporan</a>
          </li>
          <li class="py-2 px-4 rounded-3xl hover:text-blue-400 {{ ($active === 'contact') ? 'active' : 'text-gray-600' }}">
            <a href="/contact">Contact</a>
          </li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button class="flex items-center font-bold px-4 py-4 rounded-3xl hover:text-blue-400 transition-all duration-300 ease-in-out">
                Logout <img src="./img/logout.png" alt="Logout" class="ml-2 h-5 w-auto" />
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  

  <script>
    document.getElementById('mobile-menu-button').onclick = function() {
        var menu = document.getElementById('mobile-menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            menu.style.maxHeight = menu.scrollHeight + "px"; // Set max-height to the scrollHeight of the menu
        } else {
            menu.style.maxHeight = "0";
            menu.addEventListener('transitionend', function() {
                if (menu.style.maxHeight === "0px") {
                    menu.classList.add('hidden');
                }
            }, { once: true });
        }
    };
  
    document.getElementById('dropdownMenuButton').onclick = function() {
    var dropdown = document.getElementById('dropdownMenu');
    var dropdownIcon = document.getElementById('dropdownIcon');
    if (dropdown.classList.contains('hidden')) {
        dropdown.classList.remove('hidden');
        dropdown.classList.remove('-translate-y-2');
        dropdown.classList.add('translate-y-0');
        dropdownIcon.querySelector('#downIcon').classList.add('hidden');
        dropdownIcon.querySelector('#upIcon').classList.remove('hidden');
    } else {
        dropdown.classList.add('-translate-y-2');
        dropdown.classList.remove('translate-y-0');
        dropdown.classList.add('hidden');
        dropdownIcon.querySelector('#downIcon').classList.remove('hidden');
        dropdownIcon.querySelector('#upIcon').classList.add('hidden');
    }
};
  </script>
 