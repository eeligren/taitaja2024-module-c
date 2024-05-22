@extends('layouts.main')

@section('main-content')
    <h1>Käyttäjätilisi: {{ $user->username }}</h1>

    <a href="{{ route('users.user_edit') }}">Muokkaa käyttäjätiliäsi</a>
    <br>
    <a href="{{ route('events.myevents.index') }}">Omat pelit/tapahtumat</a>
@endsection
