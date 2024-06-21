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
        <div class="bg-cover bg-center relative" >
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
        <div class="bg-blue-400 pt-8 pb-8 pl-6 pr-8 text-white">
            <div class="flex flex-wrap justify-between space-y-8 md:space-y-0">

                <!-- Informasi Solo Technopark -->
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
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
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
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
    </section>

    <footer>
        <div class="p-3 bottom-0 right-0 left-0 bg-white text-center">
            <ul class="text-xs">
                <li><a href="#">Copyright @ 2024 | All Right Reserved</a></li>
                <li>Design & Developed by IT Solo Technopark</li>
            </ul>
        </div>
    </footer>
</body>
</html>
