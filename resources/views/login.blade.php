@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <h1>Login</h1>
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            @error('login')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <div class="row">
                <input type="text" name="username" id="username" placeholder="Käyttäjätunnus">
                @error('username')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <input type="password" name="password" id="password" placeholder="Salasana">
                @error('password')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <button>Kirjaudu</button>
            </div>
        </form>
    </div>
@endsection
