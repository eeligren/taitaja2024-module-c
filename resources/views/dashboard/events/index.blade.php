@extends('layouts.main')

@section('main-content')
    <h1>Pelit/tapahtumat</h1>
    <a href="{{ route('events.create') }}">Luo uusi</a>

    <div class="list">
        @forelse($events as $event)
            <div class="list-row">
                <div class="left">
                    <p>{{ $event->title }}</p>
                    <p>{{ \Carbon\Carbon::make($event->created_at)->format('Y-m-d') }}</p>
                    <p>{{ $event->user->username }}</p>
                </div>
                <div class="right">
                    <a href="{{ route('events.edit', $event) }}">Muokkaa</a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Poista</button>
                    </form>
                </div>
            </div>
        @empty
            Ei pelejä/tapahtumia.
        @endforelse
    </div>
@endsection
