@extends('layouts.main')

@section('main-content')
    <h1>Muokkaa pelaajan "{{ $result->username }}" tulosta</h1>

    <div class="form-container">
        <form action="{{ route('results.update', [$event, $result]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="username">Nimimerkki</label>
                <input type="text" name="username" id="username" placeholder="Käyttäjätunnus" value="{{ $result->username }}">
                @error('username')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="score">Pisteet</label>
                <input type="number" name="score" id="score" placeholder="Pisteet" value="{{ $result->score }}">
                @error('score')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <button>Tallenna muutokset</button>
            </div>
        </form>
    </div>
@endsection
