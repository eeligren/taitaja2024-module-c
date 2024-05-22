@extends('layouts.main')

@section('main-content')
    <a href="{{ route('users.show', auth()->user()) }}">Käyttäjätilisi</a>
    <br>
    <a href="{{ route('users.user_edit') }}">Muokkaa käyttäjätiliäsi</a>
    <br>
    @if(auth()->user()->is_admin)
        <a href="{{ route('users.index') }}">Käyttäjät</a>
        <br>
        <a href="{{ route('events.index') }}">Pelit/tapahtumat</a>
    @else
        <br>
        <a href="{{ route('events.myevents.index') }}">Omat pelit/tapahtumat</a>
    @endif
@endsection
