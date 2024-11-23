@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Discover Amazing Events</h1>
            <p class="text-lg text-gray-600">Find and book the best events happening around you</p>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($events as $event)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <!-- Event Image -->
                @if($event->image)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $event->image) }}" 
                             alt="{{ $event->name }}" 
                             class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif

                <!-- Event Details -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                            {{ $event->category }}
                        </span>
                        <span class="text-green-600 font-semibold">
                            Rp {{ number_format($event->price, 0, ',', '.') }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $event->name }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $event->description }}</p>

                    <div class="space-y-2">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('D, d M Y') }}</span>
                        </div>

                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="truncate">{{ $event->location }}</span>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="mt-6">
                        <a href="#" class="block w-full text-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection