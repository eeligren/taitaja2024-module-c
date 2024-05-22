<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    //Result controller, used for result create, delete, update
    public function create(Event $event) {
        return view('dashboard.results.create', compact('event'));
    }

    //Creates new event
    public function store(Event $event, Request $request)
    {
        $request->validate([
            'username' => 'required',
            'score' => 'required'
        ]);

        $event->results()->create([
            'username' => $request->input('username'),
            'score' => $request->input('score'),
            'event_id' => $event->id
        ]);

        return redirect()->route('events.myevents.edit', $event);
    }

    //Result edit
    public function edit(Event $event, Result $result)
    {
        //Check if user owns the event
        $userIds = json_decode($result->event->users);
        if(array_search(strval(auth()->user()->id), $userIds)) {
            return redirect()->route('events.index');
        }

        return view('dashboard.results.edit', compact('event', 'result'));
    }

    //Update result
    public function update(Event $event, Result $result, Request $request)
    {
        //Check if user owns the event
        $userIds = json_decode($event->users);
        if(array_search(strval(auth()->user()->id), $userIds)) {
            return redirect()->route('events.index');
        }

        $request->validate([
            'username' => 'required',
            'score' => 'required'
        ]);

        $result->update([
            'username' => $request->input('username'),
            'score' => $request->input('score'),
        ]);

        return redirect()->route('events.myevents.edit', $event);
    }

    //Destory result
    public function destroy(Event $event, Result $result) {
        //Check if user owns the event
        $userIds = json_decode($event->users);
        if(array_search(strval(auth()->user()->id), $userIds)) {
            return redirect()->route('events.index');
        }

        $result->delete();
        return redirect()->route('events.myevents.edit', $event);
    }
}
