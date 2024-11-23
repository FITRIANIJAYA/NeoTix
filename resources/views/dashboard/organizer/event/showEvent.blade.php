@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <!-- Image Container -->
                <div class="md:w-1/2 h-64 md:h-auto">
                    <img src="{{ asset('storage/' . $event->image) }}" 
                         alt="{{ $event->name }}" 
                         class="w-full h-full object-cover rounded-l-2xl">
                </div>

                <!-- Content Container -->
                <div class="flex-1 p-8">
                    <div class="mb-6">
                        <span class="inline-block px-4 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $event->category }}
                        </span>
                        <h1 class="text-3xl font-bold text-gray-900 mt-4">{{ $event->name }}</h1>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">About This Event</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $event->description }}</p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 space-y-4 shadow-sm">
                        <h3 class="text-base font-semibold text-gray-800">Event Details</h3>
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $event->event_date }}</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $event->event_time }}</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $event->location }}</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span>Available Quota: {{ $event->tickets->sum('available_quota') ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Price: Rp.{{ number_format($event->price ?? 0, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 space-y-3">
                        <a href="{{ route('event.edit', $event->id) }}" 
                           class="block w-full text-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-gray-700 font-medium rounded-lg transition duration-300">
                            Edit Event
                        </a>
                        <a href="{{ route('event.index') }}" 
                           class="block w-full text-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition duration-300">
                            Back to Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
