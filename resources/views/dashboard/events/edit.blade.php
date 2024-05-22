@extends('layouts.main')

@section('main-content')
    <h1>Muokkaa peliä/tapahtumaa: {{ $event->title }}</h1>

    <div class="form-container">
        <form action="{{ route('events.update', $event) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="title">Otsikko</label>
                <input type="text" name="title" id="title" placeholder="Otsikko" value="{{ $event->title }}">
                @error('title')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="thumbnail">Uusi kuva</label>
                <input type="file" name="thumbnail" id="thumbnail">
                @error('thumbnail')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="created_at">Päivämäärä</label>
                <input type="text" name="created_at" id="created_at" value="{{ $event->created_at }}">
                @error('created_at')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="results_amount">Tulosten määrä</label>
                <input type="number" name="results_amount" id="results_amount" placeholder="Tulosten määrä" value="{{ $event->results_count }}">
                @error('results_amount')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <button>Luo</button>
            </div>
        </form>
    </div>
@endsection
