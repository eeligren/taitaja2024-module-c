@extends('layouts.main')

@section('main-content')
    <h1>Luo tulos/osallistuja</h1>

    <div class="form-container">
        <form action="{{ route('results.store', $event) }}" method="POST">
            @csrf
            <div class="row">
                <label for="username">Pisteet</label>
                <input type="text" name="username" id="username" placeholder="Käyttäjätunnus">
                @error('username')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="score">Pisteet</label>
                <input type="number" name="score" id="score" placeholder="Pisteet">
                @error('score')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <button>Luo</button>
            </div>
        </form>
    </div>
@endsection
