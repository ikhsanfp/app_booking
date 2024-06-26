<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solo Technopark | {{ $title }}</title>
    <link rel="stylesheet" href="/css/main.css">
    {{-- <link rel="stylesheet" href="style.css"> --}}
</head>

<body>
    <header>
        <div class="bg-cover bg-center relative" style="background-image: url('{{ asset('img/home.png') }}');">
            <!--nav-->
            <nav class="bg-white shadow-xl py-1 px-2 rounded-b-2xl">
                <div class="container mx-auto px-2 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex-shrink-0 flex items-center">
                        <!-- Your Logo -->
                        <img src="./img/logostp.png" alt="Logo" />
                        <a href="/" class="text-gray-800 text-xl font-semibold ml-2"></a>
                    </div>
                    <div class="hidden sm:flex font-bold">
                        <!-- Navigation Links -->
                        <ul class="flex space-x-4">
                            <li class="py-4 px-6 rounded-md hover:text-gray-600 {{ ($active === 'home') ? 'active' : 'text-gray-600' }}"><a href="/">Home</a></li>
                            <li class="py-4 px-6 rounded-md hover:text-gray-600 {{ ($active === 'fasilitas') ? 'active' : 'text-gray-600' }}"><a href="/#fasilitas">Fasilitas</a></li>
                            <li class="py-4 px-6 rounded-md hover:text-gray-600 {{ ($active === 'jam') ? 'active' : 'text-gray-600' }}"><a href="/#jam">Jam Operasional</a></li>
                            <li class="py-4 px-6 rounded-md hover:text-gray-600 {{ ($active === 'kontak') ? 'active' : 'text-gray-600' }}"><a href="/#kontak">Kontak</a></li>
                        </ul>
                    </div>
                    <!-- Mobile Menu Button -->
                    <div class="sm:hidden flex items-center">
                        <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                    <!-- Mobile Menu -->
                    <div id="mobile-menu" class="sm:hidden hidden bg-gray-100 font-bold">
                        <ul class="">
                            <li class="py-4 px-6 rounded-md hover:text-gray-600 {{ ($active === 'home') ? 'active' : 'text-gray-600' }}"><a href="/">Home</a></li>
                            <li class="py-4 px-6 rounded-md hover:text-gray-600 {{ ($active === 'fasilitas') ? 'active' : 'text-gray-600' }}"><a href="/#fasilitas">Fasilitas</a></li>
                            <li class="py-4 px-6 rounded-md hover:text-gray-600 {{ ($active === 'jam') ? 'active' : 'text-gray-600' }}"><a href="/#jam">Jam Operasional</a></li>
                            <li class="py-4 px-6 rounded-md hover:text-gray-600 {{ ($active === 'kontak') ? 'active' : 'text-gray-600' }}"><a href="/#kontak">Kontak</a></li>
                        </ul>
                    </div>
            </nav>
        <!--nav-->

        <script>
            // Toggle Mobile Menu
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });
        </script>

            <div class="p-10 min-h-screen bg-gray-700 bg-opacity-50 flex items-center justify-center">
                <div class="main-body">
                    <div class="text-white text-left max-w mx-auto">
                        <h1 class="text-4xl md:text-5xl mb-8">Sport Center Area - Solo Technopark</h1>
                        <p class="text-lg md:text-xl">Sebagai area pusat olahraga untuk menjaga kesehatan dan kebugaran Anda di Solo Technopark.</p>
                        <p class="text-lg md:text-xl">Beragam fasilitas olahraga terbaik disini.</p>
                    </div>
                    <br>
                    <div class="mt-8 md:mt-0 md:ml-8 flex space-x-4">
                        <a href="/register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Book Now</a>
                        <button class="bg-transparent text-white px-4 py-2 rounded border border-white hover:bg-gray-600">Share</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <section id="fasilitas">
        <div class="bg-gray-100">
            <br>
            <h2 class="text-3xl font-bold text-center text-black">Fasilitas Kami</h2>
        
                <!-- Lapangan Basket -->
                <div class="flex items-start">
                    <img src="./img/basket.png" alt="Lapangan Basket" class="w-1/2 h-auto rounded-lg shadow-md mt-4 mr-4 ml-4">
                    <div class="ml-4">
                        <h2 class="text-xl font-bold mb-4 mt-4 mr-4 ml-4">Lapangan Basket</h2>
                        <p class="leading-relaxed mb-4 mt-4 mr-4 ml-4">Lorem ipsum dolor sit amet consectetur. Vitae morbi gravida massa nisl nullam proin. Lorem velit ullamcorper id mauris non mauris suspendisse sagittis. Iaculis metus malesuada non consectetur. Nunc sed massa justo dui id. Nisi cursus tortor orci amet lectus volutpat sed donec. Gravida ut cursus sed egestas velit sed id. Molestie varius neque pellentesque in eu aenean. Volutpat massa vel purus libero donec vestibulum dolor. Ornare risus pellentesque in aenean. Volutpat massa vel purus libero donec vestibulum dolor. Ornare risus pellentesque in aenean.</p>
                    </div>
                </div>

                <!-- Lapangan Futsal -->
                <div class="flex items-start">
                    <div class="mr-4">
                        <h2 class="text-xl font-bold mb-4 text-end mt-4 mr-4 ml-4">Lapangan Futsal</h2>
                        <p class="leading-relaxed mb-4 mt-4 mr-4 ml-4">Lorem ipsum dolor sit amet consectetur. Vitae morbi gravida massa nisl nullam proin. Lorem velit ullamcorper id mauris non mauris suspendisse sagittis. Iaculis metus malesuada non consectetur. Nunc sed massa justo dui id. Nisi cursus tortor orci amet lectus volutpat sed donec. Gravida ut cursus sed egestas velit sed id. Molestie varius neque pellentesque in eu aenean. Volutpat massa vel purus libero donec vestibulum dolor. Ornare risus pellentesque in aenean. Volutpat massa vel purus libero donec vestibulum dolor. Ornare risus pellentesque in aenean.</p>
                    </div>
                    <img src="./img/futsal.png" alt="Lapangan Futsal" class="w-1/2 h-auto rounded-lg shadow-md mt-4 mr-4 ml-4">
                </div>
                <br>
            </div>
        </div>
    </section>
    <section id="jam">
        <div class="bg-blue-400 py-10">
            <br>
            <h2 class="text-3xl font-bold text-center text-white mb-6">Jam Operasional Kami</h2>
            <div class="flex justify-center">
                <div class="overflow-x-auto w-full px-4">
                    <table class="min-w-full bg-blue-400 rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-blue-400 text-white text-center">
                            <tr>
                                <th class="px-6 py-3 text-2xl font-medium">Lapangan Basket</th>
                                <th class="px-6 py-3 text-2xl font-medium">Lapangan Futsal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-blue-400 text-white text-center">
                            <tr>
                                <td class="px-6 py-4 text-lg">Minggu : -</td>
                                <td class="px-6 py-4 text-lg">Minggu : -</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-lg">Senin : 09.00 - 21.00</td>
                                <td class="px-6 py-4 text-lg">Senin : 09.00 - 21.00</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-lg">Selasa : 09.00 - 21.00</td>
                                <td class="px-6 py-4 text-lg">Selasa : 09.00 - 21.00</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-lg">Rabu : 09.00 - 21.00</td>
                                <td class="px-6 py-4 text-lg">Rabu : 09.00 - 21.00</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-lg">Kamis : 09.00 - 21.00</td>
                                <td class="px-6 py-4 text-lg">Kamis : 09.00 - 21.00</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-lg">Jumat : 09.00 - 21.00</td>
                                <td class="px-6 py-4 text-lg">Jumat : 09.00 - 21.00</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-lg">Sabtu : -</td>
                                <td class="px-6 py-4 text-lg">Sabtu : -</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section id="grup">
        <div class="bg-gray-100">
            <br>
                <h1 class="text-center text-3xl font-semibold text-gray-700">Strategic IT Group</h1>

            <div class="flex justify-center items-center min-h-screen bg-gray-100">
                <div class="grid grid-cols-3 gap-10">
                    <!-- Row 1 -->
                    <div class="text-center justify-center items-center w-1/2">
                        <img src="./img/vector.jpg" alt="Team 1" class="mx-auto">
                        <h2 class="text-lg font-semibold mt-2">Team 1</h2>
                        <p>Internship</p>
                    </div>
                    <div class="text-center justify-center items-center w-1/2">
                        <img src="./img/vector.jpg" alt="Team 2" class="mx-auto">
                        <h2 class="text-lg font-semibold mt-2">Team 2</h2>
                        <p>Internship</p>
                    </div>
                    <div class="text-center justify-center items-center w-1/2">
                        <img src="./img/vector.jpg" alt="Team 3" class="mx-auto">
                        <h2 class="text-lg font-semibold mt-2">Team 3</h2>
                        <p>Internship</p>
                    </div>
                    
                    <!-- Row 2 -->
                        <div class="text-center justify-center items-center w-1/2">
                            <img src="./img/vector.jpg" alt="Team 3 Head Division" class="mx-auto">
                            <h2 class="text-lg font-semibold mt-2">Team 4</h2>
                            <p>Head Division</p>
                        </div>
                        <div class="text-center justify-center items-center w-1/2">
                            <img src="./img/vector.jpg" alt="Team 3 Staff Division" class="mx-auto">
                            <h2 class="text-lg font-semibold mt-2">Team 5</h2>
                            <p>Staff Division</p>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section id="kontak">
        <div class="bg-white my-16 mx-16 text-blue-400">
            <div class="flex flex-wrap justify-between space-y-8 md:space-y-0">
                <!-- Informasi Solo Technopark -->
                <div class=" md:w-1/3 mb-4 md:mb-0">
                    <img src="./img/logostp.png" alt="Solo Technopark Logo" class="h-12 mb-4">
                    <p>Menuju kawasan Solo Technopark yang,</p>
                    <p>inovatif dan berdaya saing internasional.</p>
                    <br>
                        <p class="font-semibold">Follow Us</p>

                        <div class="flex items-center">
                            <img src="./img/facebook.png" alt="Facebook" class="h-6 w-6 mr-2 mt-4 ml-4">
                            <p>Facebook</p>

                            <img src="./img/instagram.png" alt="Instagram" class="h-6 w-6 mr-2 mt-4 ml-4">
                            <p>Instagram</p>
                        </div>

                        <div class="flex items-center">
                            <img src="./img/youtube.png" alt="YouTube" class="h-6 w-6 mr-2 mt-4 ml-4">
                            <p>YouTube</p>
                        
                            <img src="./img/x.png" alt="YouTube" class="h-6 w-6 mr-2 mt-4 ml-4">
                            <p>Twitter</p>
                        </div>

                        <div class="flex items-center">
                            <img src="./img/linkid.png" alt="YouTube" class="h-6 w-6 mr-2 mt-4 ml-4">
                            <p>LinkedIn</p>
                            
                            <img src="./img/tiktok.png" alt="YouTube" class="h-6 w-6 mr-2 mt-4 ml-4">
                            <p>tiktok</p>
                        </div>

                </div>

                <!-- Kontak Kami -->
                <div class=" md:w-1/3 mb-4 md:mb-0">
                    <h2 class="font-bold text-xl mb-2">Contact Us</h2>
                    <p>Kawasan Sains dan Teknologi - Solo Technopark</p>
                    <p>Jl. Ki Hajar Dewantara No. 19 Jebres, Kec. Jebres, Kota Surakarta</p>
                    <p>(+62) 271-666-628</p>
                    <p>info@solotechnopark.id</p>
                </div>

                <!-- Peta Lokasi -->
                <div class="flex justify-center">
                    <div class="w-full max-w-4xl">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.455237117422!2d110.8512862!3d-7.5560692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a16e2b5ffa643%3A0xa0bf36ec85b94dfb!2sSolo%20Techno%20Park!5e0!3m2!1sen!2sid!4v1620839570015!5m2!1sen!2sid" 
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
            <div>
    </section>
    <footer>
        <div class="p-3 bottom-0 right-0 left-0 bg-blue-400 text-center">
            <ul class="text-xs text-white">
                <li><a href="/copyright">Copyright @ 2024 | All Right Reserved</a></li>
                <li>Design & Developed by IT Solo Technopark</li>
            </ul>
        </div>
    </footer>
</body>
</html>
