@extends('layouts.app')

@section('content')
<h1>Events</h1>
<a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{ $event->name }}</td>
            <td>{{ $event->event_date }}</td>
            <td>{{ $event->location }}</td>
            <td>
                <a href="{{ route('event.show', $event) }}">View</a>
                @can('update', $event)
                <a href="{{ route('event.edit', $event) }}">Edit</a>
                @endcan
                @can('delete', $event)
                <form action="{{ route('event.destroy', $event) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $events->links() }}
@endsection
