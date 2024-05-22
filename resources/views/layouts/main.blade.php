@extends('layouts.app')

@section('content')
    <header class="header">
        <a href="{{ route('admin.index') }}" class="brand">
            <img src="{{ asset('images/logo.png') }}" alt="RTH Logo"><h1>Intra</h1></a>
        <div class="buttons">
            <a href="{{ route('users.show', auth()->user()) }}">Käyttäjätilisi: {{ auth()->user()->username }}</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Kirjaudu ulos</button>
            </form>
        </div>
    </header>
    <main class="main">
        @yield('main-content')
    </main>
@endsection
