@extends('layouts.main')

@section('main-content')
    <h1>Muokkaa: {{ $event->title }}</h1>

    <div class="form-container">
        <form action="{{ route('events.myevents.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="results_amount">Tulosten määrä</label>
                <input type="number" name="results_amount" placeholder="Tulosten määrä" value="{{ $event->results_count }}">
                @error('results_amount')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <button>Tallenna muutokset</button>
            </div>
        </form>

        <h2>Tulokset:</h2>
        <a href="{{ route('results.create', $event) }}">Luo uusi</a>
        <div class="list">
            @forelse($results as $result)
                <div class="list-row">
                    <div class="left">
                        {{ $result->username }}
                    </div>
                    <div class="right">
                        {{ $result->score }}
                        <a href="{{ route('results.edit', [$event, $result]) }}">Muokkaa</a>
                        <form action="{{ route('results.destroy', [$event, $result]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Poista</button>
                        </form>
                    </div>
                </div>
            @empty
                Ei tuloksia.
            @endforelse
        </div>
    </div>
@endsection
