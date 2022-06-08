@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card flex-row mb-5"><img class="card-img-left" style="width: 200px"
            src="{{ asset('images/profil_picture/' . $tatoueur->PictureFile->filename) }}" />
        <div class="card-body">
            <h4 class="card-title h3 h3-sm">@if ($tatoueur->tattooist_name != null)
                {{ $tatoueur->tattooist_name }}
                @else
                {{ $tatoueur->name }}
                @endif</h4>
            <div class="d-flex">
                @if ($tatoueur->country != null)
                <p class="card-text">{{ $tatoueur->country }} </p>
                @endif
                @if ($tatoueur->locality != null)
                <p class="card-text ps-2"> {{ $tatoueur->locality }} </p>
                @endif
            </div>
            @if ($tatoueur->tattoo_parlor != null)
            <p class="card-text">{{ $tatoueur->tattoo_parlor }} </p>
            @endif
        </div>
    </div>

    <h2>Flash</h2>
    <div class="d-flex flex-row m-2">
        @foreach ($tatoueur->Flash as $flash)
        @if ($flash->active != 0)
        <div class="card me-2" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('images/flashes/' . $flash->PictureFile->filename) }}"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $flash->name }}</h5>
                <p class="card-text">{{ $flash->tattooist->tattooist_name }}</p>
                <p class="card-text">{{ $flash->price }}$</p>
                @if ($flash->color == 1)
                <p class="card-text">En couleur</p>
                @else
                <p class="card-text">Noir et blanc</p>
                @endif
                <a href="{{ route('booking', $flash->id) }}" class="btn btn-primary">Réserver</a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection
