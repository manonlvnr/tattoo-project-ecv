@extends('layouts.app')

@section('content')

<div class="container">
    <form action="" method="get">
        <select name="locality" class="form-select" style="width: 30%;">
            <option value="" disabled selected>Choisir par style</option>
            @foreach ($locality_users as $user)
            <option value="{{ $user->locality }}">{{ $user->locality }}</option>
            @endforeach
        </select>
        <input type="submit" value="Rechercher" class="btn btn-primary mb-4">
    </form>
    <h2>{{ count($tatoueurs)}} Résultats</h2>

    <div class="d-flex flex-row">
        @foreach ($tatoueurs as $tatoueur)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('images/profil_picture/' . $tatoueur->PictureFile->filename) }}"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $tatoueur->tattooist_name }}</h5>
                <p>{{ $tatoueur->locality }}</p>
                <a href="{{ route('showTatoueur', $tatoueur->id) }}" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        @endforeach
    </div>
    {{ $tatoueurs->links() }}
</div>
@endsection
