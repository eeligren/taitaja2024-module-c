@extends('layouts.main')

@section('main-content')
    <h1>Käyttäjät</h1>
    <a href="{{ route('users.create') }}">Luo uusi käyttäjä</a>

    <div class="list">
        @forelse($users as $user)
            <div class="list-row">
                <div class="left">
                    <p>{{ $user->username }}</p>
                    <p>{{ \Illuminate\Support\Carbon::make($user->created_at)->format('Y-m-d') }}</p>
                    <p>{{ $user->is_admin ? 'ADMIN KÄYTTÄJÄ' : '' }}</p>
                </div>
                <div class="right">
                    <a href="{{ route('users.edit', $user) }}">Muokkaa</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Poista</button>
                    </form>
                </div>
            </div>
        @empty
            Ei käyttäjiä.
        @endforelse
    </div>
@endsection
