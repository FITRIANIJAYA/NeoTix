@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Event</h1>

        <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" class="form-input w-full rounded-lg border-gray-300" id="name" name="name" value="{{ $event->name }}" required>
                @error('name')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea class="form-textarea w-full rounded-lg border-gray-300" id="description" name="description" rows="3" required>{{ $event->description }}</textarea>
                @error('description')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="event_date" class="block text-gray-700 font-medium mb-2">Event Date</label>
                <input type="date" class="form-input w-full rounded-lg border-gray-300" id="event_date" name="event_date" value="{{ $event->event_date }}" required>
                @error('event_date')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="event_time" class="block text-gray-700 font-medium mb-2">Event Time</label>
                <input type="time" class="form-input w-full rounded-lg border-gray-300" id="event_time" name="event_time" value="{{ $event->event_time }}" required>
                @error('event_time')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-medium mb-2">Location</label>
                <input type="text" class="form-input w-full rounded-lg border-gray-300" id="location" name="location" value="{{ $event->location }}" required>
                @error('location')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                <input type="file" class="form-input w-full rounded-lg border-gray-300" id="image" name="image">
                @error('image')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="quota" class="block text-gray-700 font-medium mb-2">Quota</label>
                <input type="number" class="form-input w-full rounded-lg border-gray-300" id="quota" name="quota" value="{{ $event->quota }}" required>
                @error('quota')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                <input type="number" step="0.01" class="form-input w-full rounded-lg border-gray-300" id="price" name="price" value="{{ $event->price }}" required>
                @error('price')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
                <input type="text" class="form-input w-full rounded-lg border-gray-300" id="category" name="category" value="{{ $event->category }}" required>
                @error('category')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                <select id="status" name="status" class="form-select w-full rounded-lg border-gray-300">
                    <option value="draft" {{ $event->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $event->status == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="cancelled" {{ $event->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between">
                <button type="submit" class="py-2 px-6 bg-[#367a7f] rounded-r-lg text-black text-center flex-1 mx-1">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection