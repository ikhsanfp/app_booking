<nav class="py-3 px-4 bg-white rounded-b-2xl shadow-xl">
    <div class="container">
      <div class="justify-between flex ml-2 -mr-8">
        <img src="./img/logostp.png" alt="" />
        <div class="-ml-36 flex font-bold">
          <ul class="-ml-20">
              <li class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === "home") ? 'active' : 'text-gray-600' }}"><a href="/home">Home</a></li>
          </ul>
          <ul class="">
              <li class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === "panduan") ? 'active' : 'text-gray-600' }}"><a href="/panduan">Panduan</a></li>
          </ul>
          <ul class="">
              <li class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === "pesan") ? 'active' : 'text-gray-600' }}"><a href="/pesan">Pesan</a></li>
          </ul>
          <ul class="">
              <li class="py-4 px-6 rounded-3xl hover:text-blue-400 {{ ($active === "laporan") ? 'active' : 'text-gray-600' }}"><a href="/laporan">Laporan</a></li>
          </ul>
        </div>
        <div class="justify-beetween">
          <form action="/logout" method="post">
            @csrf
            <button class="flex px-4 py-4 rounded-3xl hover:text-biru">
              Logout <img src="./img/logout.png" alt=""/>
            </button>
            
          </form>
        </div>
      </div>
      
    </div>
  </nav>
  