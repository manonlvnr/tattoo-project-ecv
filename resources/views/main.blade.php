@extends('layouts.app')

@section('content')
    @if (count($flashes) > 0)
        <h1>Flash</h1>
    @endif
    <div class="d-flex flex-row">
        @foreach ($flashes as $flash)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/flashes/' . $flash->PictureFile->filename) }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $flash->name }}</h5>
                    <p class="card-text">{{ $flash->tattooist->tattooist_name }}</p>
                    <p class="card-text">{{ $flash->price }}$</p>
                    <a href="" class="btn btn-primary">Réserver</a>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('flashes') }}">Voir tous les tatouages</a>

    @if (count($tatoueurs) > 0)
        <h1>Tatoueurs</h1>
    @endif
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
    <a href="{{ route('tatoueurs') }}">Voir tous les tatoueurs</a>
@endsection
