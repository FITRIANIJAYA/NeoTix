@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">All Events</h1>
            <a href="{{ route('event.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-300">
                Create Event
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $event->name }}</h2>
                        <span class="px-3 py-1 rounded-full text-sm font-medium
                            @if($event->status === 'published') bg-green-100 text-green-800
                            @elseif($event->status === 'draft') bg-gray-100 text-gray-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $event->description }}</p>
                    
                    <div class="space-y-2">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $event->event_date }} at {{ $event->event_time }}</span>
                        </div>
                        
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $event->location }}</span>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">
                                {{ $event->category }}
                            </span>
                            <span class="text-green-600 font-semibold">
                                Rp{{ number_format($event->price, 2) }}
                            </span>
                        </div>
                        
                        <div class="flex items-center justify-between mt-4 pt-4 border-t">
                            <span class="text-sm text-gray-600">
                                Quota: {{ $event->quota }}
                            </span>
                            <div class="flex space-x-2">
                                <a href="{{ route('event.show', $event->id) }}" 
                                   class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition duration-300">
                                    Show
                                </a>
                                <a href="{{ route('event.edit', $event->id) }}" 
                                   class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md transition duration-300">
                                    Edit
                                </a>
                                <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md transition duration-300"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection
