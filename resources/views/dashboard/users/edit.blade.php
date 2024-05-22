@extends('layouts.main')

@section('main-content')
    <h1>Muokkaa käyttäjää: {{ $user->username }}</h1>

    <div class="form-container">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            @error('edit')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <div class="row">
                <label for="username">Käyttäjätunnus</label>
                <input type="text" name="username" placeholder="Käyttäjätunnus" value="{{ $user->username }}">
                @error('username')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="password">Salasana</label>
                <input type="password" name="password" placeholder="Uusi salasana">
                @error('password')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <input type="checkbox" name="is_admin" id="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
                <label for="is_admin">Ylläpitäjä</label>
            </div>
            <div class="row">
                <button>Tallenna muutokset</button>
            </div>
        </form>
    </div>
@endsection
