@extends('layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<div class="container">
    @if (count($flashes) > 0)
    <h1>Flash</h1>
    @endif
    <div class="d-flex flex-row mb-4">
        @foreach ($flashes as $flash)
        <div class="card me-2" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('images/flashes/' . $flash->PictureFile->filename) }}"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $flash->name }}</h5>
                <p class="card-text">{{ $flash->tattooist->tattooist_name }}</p>
                <p class="card-text">{{ $flash->price }}$</p>
                <a href="{{ route('booking', $flash->id) }}" class="btn btn-primary">Réserver</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mb-5">
        <a href="{{ route('flashes') }}">Voir tous les tatouages</a>
    </div>

    @if (count($tatoueurs) > 0)
    <h1>Tatoueurs</h1>
    @endif
    <div class="d-flex flex-row mb-4">
        @foreach ($tatoueurs as $tatoueur)
        <div class="card me-2" style="width: 18rem;">
            @if ($tatoueur->PictureFile->filename != null)
            <img class="card-img-top" src="{{ asset('images/profil_picture/' . $tatoueur->PictureFile->filename) }}"
                @endif alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $tatoueur->tattooist_name }}</h5>
                <a href="" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ route('tatoueurs') }}">Voir tous les tatoueurs</a>
    </div>
</div>
@endsection
