<nav class="py-3 px-4 bg-white rounded-b-2xl shadow-xl">
  <div class="container mx-auto flex justify-between items-center">
    <div class="flex items-center">
      <img src="./img/logostp.png" alt="" class="mr-4" />
      <ul class="flex">
        <li class="mr-4">
          <a href="/home" class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === "home") ? 'active' : 'text-gray-600' }}">Home</a>
        </li>
        <li class="mr-4">
          <a href="/panduan" class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === "panduan") ? 'active' : 'text-gray-600' }}">Panduan</a>
        </li>
        <li class="mr-4">
          <a href="/pesan" class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === "pesan") ? 'active' : 'text-gray-600' }}">Pesan</a>
        </li>
        <li class="mr-4">
          <a href="/laporan" class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === "laporan") ? 'active' : 'text-gray-600' }}">Laporan</a>
        </li>
      </ul>
    </div>
    <div>
      <a href="/login" class="flex items-center px-4 py-2 rounded-full hover:text-blue-400">
        <span class="mr-2">Login</span>
        <img src="./img/logout.png" alt="" class="h-4 w-4" />
      </a>
    </div>
 
