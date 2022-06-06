@extends('layouts.app')

@section('content')
<div class="container">
    <form action="" method="get">
        <select name="category" class="form-select" style="width: 30%;">
            <option value="" disabled selected>Choisir par style</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->libelle }}</option>
            @endforeach
        </select>
        <input type="submit" value="Rechercher" class="btn btn-primary mb-4">
    </form>

    <h2>{{ count($flashes)}} Résultats</h2>

    <div class="d-flex flex-row">
        @foreach ($flashes as $flash)
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
                <a href="" class="btn btn-primary">Réserver</a>
            </div>
        </div>
        @endforeach
    </div>
    {{ $flashes->links() }}
</div>
@endsection
