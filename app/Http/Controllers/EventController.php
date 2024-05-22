<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Init middleware to protect functions
    public function __construct()
    {
        $this->middleware('admin')->except(['myevents_index', 'myevents_edit', 'myevents_update']);
    }

    //Show all events
    public function index()
    {
        //Get events
        $events = Event::all();
        return view('dashboard.events.index', compact('events'));
    }

    /**
     * New event creation
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.events.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'title' => 'required',
            'results_amount' => 'required',
            'users' => 'required'
        ]);

        //File upload
        if($request->hasFile('thumbnail')) {
            $filePath = $request->file('thumbnail')->store();
        } else {
            $filePath = null;
        }

        $userIds = json_encode($request->get('users'));

        Event::create([
            'title' => $request->input('title'),
            'thumbnail_path' => $filePath,
            'results_count' => $request->input('results_amount'),
            'users' => $userIds,
            'user_id' => 1,
            'created_at' => $request->input('created_at') ? $request->input('created_at') : now(),
        ]);

        return redirect()->route('events.index');
    }

    //Show all own user events
    public function myevents_index()
    {
        $events = auth()->user()->events;
        return view('dashboard.events.myevents_index', compact('events'));
    }

    //Show user own event page
    public function myevents_edit(Event $event)
    {
        //Check if user owns the event
        $userIds = json_decode($event->users);
        if(array_search(strval(auth()->user()->id), $userIds)) {
            return redirect()->route('events.index');
        }
        return view('dashboard.events.myevents_edit', ['event' => $event, 'results' => $event->results]);
    }

    //Function to update user own event
    public function myevents_update(Event $event, Request $request)
    {
        //Check if user owns the event
        $userIds = json_decode($event->users);
        if(array_search(strval(auth()->user()->id), $userIds)) {
            return redirect()->route('events.index');
        }

        $request->validate([
            'results_amount' => 'required'
        ]);

        $event->update([
            'results_count' => $request->input('results_amount'),
        ]);

        return redirect()->route('events.myevents.edit', $event);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Edit event page view
     */
    public function edit(Event $event)
    {
        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Event $event, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'created_at' => 'required',
            'results_amount' => 'required',
        ]);

        //Thumbnail upload
        if($request->hasFile('thumbnail')) {
            $filePath = $request->file('thumbnail')->store();
        } else {
            $filePath = null;
        }

        $event->update([
            'title' => $request->input('title'),
            'thumbnail_path' => $filePath,
            'results_count' => $request->input('results_amount'),
            'created_at' => $request->input('created_at') ? $request->input('created_at') : now(),
        ]);

        return redirect()->route('events.index');
    }
}
