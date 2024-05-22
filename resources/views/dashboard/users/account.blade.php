@extends('layouts.main')

@section('main-content')
    <h1>Käyttäjätilisi: {{ $user->username }}</h1>

    <div class="form-container">
        <form action="{{ route('users.user_update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            @error('edit')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <div class="row">
                <label for="password">Salasana</label>
                <input type="password" name="password" id="password" placeholder="Uusi salasana">
                @error('password')
                <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <button>Tallenna muutokset</button>
            </div>
        </form>
    </div>
@endsection
