<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D World Explorer - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a0a0a;
            color: #e5e7eb;
        }
       .hero-bg {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://media.sketchfab.com/models/8c08ad8c59184d83b170adc64e1f65c0/thumbnails/c4d85d5c99aa476f8ef63b961d2ffbf9/3172f74111164673954361ab011c63da.jpeg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}
        .glass-nav {
            background: rgba(17, 24, 39, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .btn-primary {
            @apply bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105;
        }
        .btn-secondary {
             @apply bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300;
        }
    </style>
</head>
<body class="overflow-x-hidden">

    <!-- Navigation Bar -->
    <nav id="navbar" class="glass-nav fixed w-full top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center">
                    <a href="#" class="text-white text-2xl font-bold">
                        <span class="text-blue-400">3D</span>Explorer
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#features" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Features</a>
                        <a href="#gallery" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Gallery</a>
                        <a href="#" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                    </div>
                </div>
                <div class="hidden md:block">
                     <a href="{{ route('login') }}" class="text-gray-300 hover:text-white font-medium mr-4">Login</a>
                     <a href="{{ route('register') }}" class="btn-primary py-2 px-4">Register</a>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#features" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Features</a>
                <a href="#gallery" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Gallery</a>
                <a href="#" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About</a>
                <div class="mt-4 pt-4 border-t border-gray-700">
                     <a href="login.html" class="block text-gray-300 hover:text-white px-3 py-2 rounded-md text-base font-medium">Login</a>
                     <a href="register.html" class="block text-gray-300 hover:text-white px-3 py-2 rounded-md text-base font-medium">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-bg h-screen flex items-center justify-center text-center">
        <div class="bg-black bg-opacity-50 p-10 rounded-xl">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-4">
                Explore the World in <span class="text-blue-400">Stunning 3D</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Journey through historical sites and modern wonders from the comfort of your home. Your next adventure is just a click away.
            </p>
            <a href="register.html" class="btn-primary text-lg">
                Start Exploring Now
            </a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-white">Why Choose 3D Explorer?</h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-400">
                We provide an unparalleled virtual tourism experience with cutting-edge technology.
            </p>
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Feature 1 -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                     <svg class="h-12 w-12 text-blue-400 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
                    <h3 class="mt-6 text-xl font-bold text-white">Immersive 3D Views</h3>
                    <p class="mt-4 text-gray-400">Powered by CesiumJS, our platform offers realistic, high-fidelity 3D models of global landmarks.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <svg class="h-12 w-12 text-blue-400 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <h3 class="mt-6 text-xl font-bold text-white">Historical Timelines</h3>
                    <p class="mt-4 text-gray-400">Travel through time by exploring how sites have changed over the decades.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <svg class="h-12 w-12 text-blue-400 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <h3 class="mt-6 text-xl font-bold text-white">Custom Virtual Tours</h3>
                    <p class="mt-4 text-gray-400">Create, save, and share your own personalized tours of your favorite locations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-20 bg-gray-900/50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <h2 class="text-3xl font-extrabold text-white text-center">Discover Amazing Places in Douala</h2>
  <div class="mt-12 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- La Nouvelle Liberté -->
    <div class="group relative">
      <img class="w-full h-full object-cover rounded-lg"
        src="https://c8.alamy.com/comp/B64MNY/deido-roundabout-monument-douala-cameroon-africa-B64MNY.jpg"
        alt="La Nouvelle Liberté, Douala">
      <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300 flex items-center justify-center rounded-lg">
        <p class="text-white opacity-0 group-hover:opacity-100 font-bold">La Nouvelle Liberté</p>
      </div>
    </div>

    <!-- Cathedral of Saints Peter & Paul -->
    <div class="group relative">
      <img class="w-full h-full object-cover rounded-lg"
        src="https://th.bing.com/th/id/OIP.3QYZfq_tkx_9yT9CvJ82ZAHaFc?w=258&h=190&c=7&r=0&o=7&dpr=1.1&pid=1.7&rm=3"
        alt="Cathedral of Saints Peter and Paul, Douala">
      <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300 flex items-center justify-center rounded-lg">
        <p class="text-white opacity-0 group-hover:opacity-100 font-bold">St Peter & Paul Cathedral</p>
      </div>
    </div>

    <!-- Palace of King Bell (“La Pagode”) -->
    <div class="group relative">
      <img class="w-full h-full object-cover rounded-lg"
        src="https://media.gettyimages.com/id/640244541/photo/palace-of-the-kings-bell-known-as-la-pagode-douala-cameroon-20th-century.jpg?s=612x612&w=gi&k=20&c=VaTGOHwpIlMiwoEk8cijz3T_v7iqzaV8a5jfbcdS9VQ="
        alt="Palace of King Bell, Douala">
      <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300 flex items-center justify-center rounded-lg">
        <p class="text-white opacity-0 group-hover:opacity-100 font-bold">Palace of King Bell</p>
      </div>
    </div>

    <!-- Monument aux Morts -->
    <div class="group relative">
      <img class="w-full h-full object-cover rounded-lg"
        src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/08/fa/4e/8c/le-monument-aux-morts.jpg?h=500&s=1&w=800"
        alt="Monument aux Morts, Douala">
      <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300 flex items-center justify-center rounded-lg">
        <p class="text-white opacity-0 group-hover:opacity-100 font-bold">Monument aux Morts</p>
      </div>
    </div>
  </div>
</div>

    </section>

    <!-- Footer -->
    <footer class="bg-gray-900">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8 xl:col-span-1">
                    <a href="#" class="text-white text-2xl font-bold"><span class="text-blue-400">3D</span>Explorer</a>
                    <p class="text-gray-400 text-base">Your gateway to exploring the world's wonders in immersive 3D.</p>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                     <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Solutions</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="#" class="text-base text-gray-400 hover:text-white">Virtual Tours</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white">Education</a></li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                             <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Support</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="#" class="text-base text-gray-400 hover:text-white">Help Center</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                     <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Company</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="#" class="text-base text-gray-400 hover:text-white">About</a></li>
                                 <li><a href="#" class="text-base text-gray-400 hover:text-white">Blog</a></li>
                            </ul>
                        </div>
                         <div class="mt-12 md:mt-0">
                             <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Legal</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="#" class="text-base text-gray-400 hover:text-white">Privacy</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white">Terms</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8"    >
                <p class="text-base text-gray-400 xl:text-center">&copy; 2024 3DExplorer. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Navbar opacity on scroll
        const navbar = document.getElementById('navbar');
        window.onscroll = () => {
            if (window.scrollY > 50) {
                navbar.classList.add('glass-nav');
            } else {
                navbar.classList.remove('glass-nav');
            }
        };
    </script>

</body>
</html>
