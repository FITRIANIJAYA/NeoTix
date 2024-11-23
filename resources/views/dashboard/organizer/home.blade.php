<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard ORGANIZER') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Carousel Section -->
            <div class="relative mb-8" x-data="{ activeSlide: 0 }">
                <div class="overflow-hidden rounded-xl h-[400px] shadow-lg">
                    <div class="flex transition-transform duration-500" :style="{ transform: `translateX(-${activeSlide * 100}%)` }">
                        <div class="min-w-full relative">
                            <img src="https://source.unsplash.com/random/1200x400?event" class="w-full h-[400px] object-cover" alt="Event 1">
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/60 to-transparent">
                                <h3 class="text-white text-2xl font-bold">Featured Event 1</h3>
                                <p class="text-white/80">Description of your amazing event</p>
                            </div>
                        </div>
                        <div class="min-w-full relative">
                            <img src="https://source.unsplash.com/random/1200x400?concert" class="w-full h-[400px] object-cover" alt="Event 2">
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/60 to-transparent">
                                <h3 class="text-white text-2xl font-bold">Featured Event 2</h3>
                                <p class="text-white/80">Another exciting event description</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button @click="activeSlide = activeSlide === 0 ? 1 : 0" class="absolute top-1/2 -translate-y-1/2 left-4 bg-white/30 hover:bg-white/50 rounded-full p-2 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button @click="activeSlide = activeSlide === 0 ? 1 : 0" class="absolute top-1/2 -translate-y-1/2 right-4 bg-white/30 hover:bg-white/50 rounded-full p-2 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>

            <!-- Events Cards Section -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Your Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Event Card 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="https://source.unsplash.com/random/400x200?event" class="w-full h-48 object-cover" alt="Event">
                    <div class="p-6">
                        <div class="text-sm font-semibold text-indigo-600 mb-2">Dec 24, 2023</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Event Title</h3>
                        <p class="text-gray-600 mb-4">Brief description of the event goes here.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">100 attendees</span>
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Manage</button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="https://source.unsplash.com/random/400x200?concert" class="w-full h-48 object-cover" alt="Event">
                    <div class="p-6">
                        <div class="text-sm font-semibold text-indigo-600 mb-2">Dec 31, 2023</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Another Event</h3>
                        <p class="text-gray-600 mb-4">Another brief description goes here.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">75 attendees</span>
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Manage</button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="https://source.unsplash.com/random/400x200?festival" class="w-full h-48 object-cover" alt="Event">
                    <div class="p-6">
                        <div class="text-sm font-semibold text-indigo-600 mb-2">Jan 15, 2024</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">New Event</h3>
                        <p class="text-gray-600 mb-4">Description for the new event here.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">50 attendees</span>
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Manage</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
