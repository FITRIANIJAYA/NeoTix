<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Display events
    public function index(Request $request)
    {
        $events = Event::with('tickets')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(10);

        return view('dashboard.organizer.event.event', compact('events'));
    }

    // Display events for user
    public function userDashboard()
    {
        $events = Event::with('tickets')->where('status', 'published')->paginate(10);
        return view('dashboard.user.events.homeUser', compact('events'));
    }

    // // Display events for organizer
    // public function organizerEvents()
    // {
    //     $organizerEvents = Event::with('tickets')->where('organizer_id', Auth::id())->paginate(10);
    //     return view('dashboard.user.homeUser', compact('organizerEvents'));
    // }

    // Show create form
    public function create()
    {
        return view('dashboard.organizer.event.createEvent');
    }

    // Store new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'location' => 'required|string|max:255',
            'quota' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0|max:999999999',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'status' => 'in:draft,published,cancelled',
        ]);

        $validated['organizer_id'] = Auth::id();
        $validated['status'] = 'draft'; // Ensure default status is 'draft'

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event = Event::create($validated);

        Tickets::create([
            'event_id' => $event->id,
            'available_quota' => $request->quota,
            'price' => $request->price,
            'is_active' => true,
        ]);

        return redirect()->route('event.index')->with('success', 'Event created successfully!');
    }

    // Show event details
    public function show(Event $event)
    {
        $event->load('tickets');
        return view('dashboard.organizer.event.showEvent', compact('event'));
    }

    // Show edit form
    public function edit(Event $event)
    {
        return view('dashboard.organizer.event.editEvent', compact('event'));
    }

    // Update event
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'location' => 'required|string|max:255',
            'quota' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'status' => 'in:draft,published,cancelled',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        $event->tickets()->update([
            'available_quota' => $request->quota,
            'price' => $request->price,
        ]);

        return redirect()->route('event.index')->with('success', 'Event updated successfully!');
    }

    // Delete event
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully!');
    }
}
