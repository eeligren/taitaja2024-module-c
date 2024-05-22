@extends('layouts.main')

@section('main-content')
    <h1>Omat pelit/tapahtumat</h1>

    <div class="list">
        @forelse($events as $event)
            <div class="list-row">
                <div class="left">
                    <p>{{ $event->title }}</p>
                    <p>{{ \Carbon\Carbon::make($event->created_at)->format('Y-m-d') }}</p>
                </div>
                <div class="right">
                    <a href="{{ route('events.myevents.edit', $event) }}">Muokkaa</a>
                </div>
            </div>
        @empty
            Ei pelejä/tapahtumia.
        @endforelse
    </div>
@endsection
