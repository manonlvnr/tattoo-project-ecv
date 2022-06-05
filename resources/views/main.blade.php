@extends('layouts.app')

@section('content')
    <h1>Flash</h1>
    <div class="d-flex flex-row">
        @foreach ($flashes as $flash)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/flashes/' . $flash->PictureFile->filename) }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $flash->name }}</h5>
                    <p class="card-text">{{ $flash->tattooist->tattooist_name }}</p>
                    <a href="#" class="btn btn-primary">Réserver</a>
                </div>
            </div>
        @endforeach
    </div>

    <h1>Tatoueurs</h1>
    @foreach ($tatoueurs as $tatoueur)
        <h5 class="card-title">{{ $tatoueur->tattooist_name }}</h5>
    @endforeach
@endsection
