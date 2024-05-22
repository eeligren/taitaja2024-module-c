@extends('layouts.main')

@section('main-content')
    <h1>Luo käyttäjä</h1>

    <div class="form-container">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row">
                <label for="username">Käyttäjätunnus</label>
                <input type="text" name="username" placeholder="Käyttäjätunnus">
                @error('username')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="password">Salasana</label>
                <input type="text" name="password" placeholder="Salasana" value="taitaja2024">
                @error('password')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <input type="checkbox" name="is_admin" id="is_admin">
                <label for="is_admin">Ylläpitäjä</label>
            </div>
            <div class="row">
                <button>Luo</button>
            </div>
        </form>
    </div>
@endsection
