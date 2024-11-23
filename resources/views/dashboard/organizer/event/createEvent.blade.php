@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Create New Event</h1>

                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Event Name</label>
                            <input type="text" id="name" name="name" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <input type="text" id="category" name="category" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">
                            @error('category')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea id="description" name="description" rows="4" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="event_date" class="block text-sm font-medium text-gray-700 mb-2">Event Date</label>
                            <input type="date" id="event_date" name="event_date" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">
                            @error('event_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="event_time" class="block text-sm font-medium text-gray-700 mb-2">Event Time</label>
                            <input type="time" id="event_time" name="event_time" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">
                            @error('event_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                            <input type="text" id="location" name="location" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Event Image</label>
                            <input type="file" id="image" name="image"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quota" class="block text-sm font-medium text-gray-700 mb-2">Quota</label>
                            <input type="number" id="quota" name="quota" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">
                            @error('quota')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                            <input type="number" step="0.01" id="price" name="price" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#367a7f] focus:ring focus:ring-[#367a7f] focus:ring-opacity-50">
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" 
                            class="w-full py-3 px-6 text-black bg-[#367a7f] hover:bg-[#2b6165] rounded-lg shadow-md transition duration-200 ease-in-out transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-[#367a7f] focus:ring-opacity-50">
                            Create Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection