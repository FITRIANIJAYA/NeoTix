@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard - Events</h1>
        @foreach ($events as $event)
            <div class="event">
                <h2>{{ $event->name }}</h2>
                <p>{{ $event->description }}</p>
                <p>Date: {{ $event->event_date }}</p>
                <p>Location: {{ $event->location }}</p>
                <p>Price: ${{ $event->price }}</p>
                <p>Status: {{ $event->status }}</p>
                <p>Average Rating: {{ $event->average_rating }}</p>
                <p>Total Reviews: {{ $event->total_reviews }}</p>
                <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary">View Details</a>
                <a href="{{ route('event.edit', $event->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
        {{ $events->links() }}
    </div>
@endsection
