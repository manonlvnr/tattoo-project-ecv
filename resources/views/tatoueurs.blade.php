@extends('layouts.app')

@section('content')

<h2>{{ count($tatoueurs)}} Résultats</h2>

    <div class="d-flex flex-row">
        @foreach ($tatoueurs as $tatoueur)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('images/profil_picture/' . $tatoueur->PictureFile->filename) }}"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $tatoueur->tattooist_name }}</h5>
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        @endforeach
    </div>
    {{ $tatoueurs->links() }}
@endsection
