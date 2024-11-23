<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ConcertTix - Find Your Next Show</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .hero-bg {
                background-image: linear-gradient(to right, #6b46c1, #805ad5);
            }

            .hero-title {
                animation: fadeInUp 0.7s ease-in-out;
            }

            .search-box {
                animation: fadeInUp 0.9s ease-in-out;
            }

            .featured-concerts {
                opacity: 0;
                transform: translateY(50px);
                animation: fadeInUp 0.7s ease-in-out forwards;
            }

            .upcoming-concerts {
                opacity: 0;
                transform: translateY(50px);
                animation: fadeInUp 0.7s ease-in-out 0.3s forwards;
            }

            .footer {
                opacity: 0;
                transform: translateY(50px);
                animation: fadeInUp 0.7s ease-in-out 0.6s forwards;
            }

            @keyframes fadeInUp {
                0% {
                    opacity: 0;
                    transform: translateY(50px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    </head>
    <body class="antialiased font-montserrat">
        <!-- Navigation -->
        <nav class="bg-gray-900 shadow-lg fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-bold text-white">NeoTix</a>
                    </div>
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-indigo-600">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="bg-indigo-600 text-black px-4 py-2 rounded-md hover:bg-indigo-700">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="pt-24 pb-8 hero-bg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-white mb-8 hero-title">Find Your Perfect Concert</h1>
                    <div class="max-w-xl mx-auto search-box">
                        <div class="flex items-center bg-white rounded-lg overflow-hidden px-2 py-1">
                            <input type="text" placeholder="Search for concerts, artists, or venues..." class="w-full px-4 py-2 focus:outline-none">
                            <button class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Concerts Carousel -->
        <div class="py-12 featured-concerts">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Featured Concerts</h2>
                <div class="relative">
                    <div class="flex space-x-6 overflow-x-auto pb-4 scrollbar-hide">
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="flex-none w-96">
                            <div class="relative h-64 rounded-lg overflow-hidden">
                                <img src="https://source.unsplash.com/random/800x600?concert-{{ $i }}" class="w-full h-full object-cover">
                                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black">
                                    <h3 class="text-white text-xl font-bold">Concert Name {{ $i }}</h3>
                                    <p class="text-gray-300">Date • Venue</p>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Concerts Grid -->
        
        <div class="py-12 bg-gray-50 upcoming-concerts">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Upcoming Concerts</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @for ($i = 1; $i <= 6; $i++)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                        <img src="https://source.unsplash.com/random/400x300?concert-{{ $i }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Artist Name</h3>
                                    <p class="text-gray-600">Venue Name</p>
                                </div>
                                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full">
                                    $99
                                </span>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center text-gray-600">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Date: March {{ $i }}, 2024</span>
                                </div>
                                <button class="mt-4 w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition-colors duration-300">
                                    Buy Tickets
                                </button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white footer">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">NeoTix</h3>
                        <p class="text-gray-400">Your premier destination for concert tickets.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white">About Us</a></li>
                            <li><a href="#" class="hover:text-white">Contact</a></li>
                            <li><a href="#" class="hover:text-white">FAQs</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5L14.17.5C10.24.5,9.1,3.3,9.1,5.47v2h-3v4h3v12h5.47V11.47h3.69Z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.76,8a8.11,8.11,0,0,0-.24-1.83A4.78,4.78,0,0,0,21,3.45,4.78,4.78,0,0,0,17.76,1a8.11,8.11,0,0,0-1.83-.24C15,0.7,14.63,0.7,12,0.7S9,0.7,8,0.76A8.11,8.11,0,0,0,6.17,1,4.78,4.78,0,0,0,3,3.45,4.78,4.78,0,0,0,1,6.17,8.11,8.11,0,0,0,.76,8C0.7,9,0.7,9.37,0.7,12s0,3,0.06,4a8.11,8.11,0,0,0,.24,1.83A4.78,4.78,0,0,0,3,20.55,4.78,4.78,0,0,0,6.24,23a8.11,8.11,0,0,0,1.83.24c1,0.06,1.37,0.06,4,0.06s3,0,4-.06a8.11,8.11,0,0,0,1.83-.24,4.78,4.78,0,0,0,3.24-2.45,4.78,4.78,0,0,0,2.45-3.24,8.11,8.11,0,0,0,.24-1.83c0.06-1,0.06-1.37,0.06-4S23.81,9,23.76,8ZM21.48,16.16A5.87,5.87,0,0,1,16.16,21.48c-0.83.16-2.42,0.24-4.16,0.24s-3.33-.08-4.16-0.24a5.87,5.87,0,0,1-5.32-5.32c-0.16-.83-0.24-2.42-0.24-4.16s0.08-3.33.24-4.16A5.87,5.87,0,0,1,7.84,2.52c0.83-.16,2.42-0.24,4.16-0.24s3.33,0.08,4.16,0.24a5.87,5.87,0,0,1,5.32,5.32c0.16,0.83.24,2.42,0.24,4.16S21.64,15.33,21.48,16.16Z" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-700 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 NeoTix. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <script>
            window.addEventListener('scroll', function() {
                const hero = document.querySelector('.hero-bg');
                const featuredConcerts = document.querySelector('.featured-concerts');
                const upcomingConcerts = document.querySelector('.upcoming-concerts');
                const footer = document.querySelector('.footer');

                const heroHeight = hero.offsetHeight;
                const scrollPosition = window.pageYOffset;

                hero.style.transform = `translateY(${scrollPosition * 0.5}px)`;

                if (scrollPosition >= heroHeight - 100) {
                    featuredConcerts.classList.add('animate');
                }

                if (scrollPosition >= heroHeight + 200) {
                    upcomingConcerts.classList.add('animate');
                }

                if (scrollPosition >= heroHeight + 400) {
                    footer.classList.add('animate');
                }
            });
        </script>
    </body>
</html>