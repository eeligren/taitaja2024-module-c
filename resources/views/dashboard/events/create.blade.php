@extends('layouts.main')

@section('main-content')
    <h1>Luo peli/tapahtuma</h1>

    <div class="form-container">
        <form action="{{ route('events.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <label for="title">Otsikko</label>
                <input type="text" name="title" id="title" placeholder="Otsikko">
                @error('title')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="thumbnail">Kuva</label>
                <input type="file" name="thumbnail" id="thumbnail">
                @error('thumbnail')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="created_at">Päivämäärä</label>
                <input type="date" name="created_at" id="created_at">
                @error('created_at')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="user_id">Käyttäjät</label>
                <select name="user_id" id="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <label for="results_amount">Tulosten määrä</label>
                <input type="number" name="results_amount" id="results_amount" placeholder="Tulosten määrä">
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
