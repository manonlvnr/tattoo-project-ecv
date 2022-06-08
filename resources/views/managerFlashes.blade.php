@extends('layouts.appManager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My flashes') }}</div>

                <div class="card-body">

                    <div class="m-4">

                        <a class="btn btn-primary mb-3" type="button" href="{{ route('manager.add')}}">Add a new
                            flash</a>

                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a href="#all" class="nav-link active" data-bs-toggle="tab">All</a>
                            </li>
                            <li class="nav-item">
                                <a href="#available" class="nav-link" data-bs-toggle="tab">Available</a>
                            </li>
                            <li class="nav-item">
                                <a href="#reserved" class="nav-link" data-bs-toggle="tab">Reserved</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tattooed" class="nav-link" data-bs-toggle="tab">Tattooed</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="all">
                                <div class="row">
                                    @foreach ($flashes as $flash)

                                    <div class="col-6">
                                        <div class="card" style="margin:12px;">

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $flash->name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $flash->price }} €</h6>
                                                <p class="card-text">All tattoos</p>
                                                <a href="{{ route('manager.editFlash', $flash->id) }}"
                                                    class="card-link">Edit</a>
                                                <a href="{{ route('manager.deleteFlash', $flash->id) }}"
                                                    class="card-link">Delete</a>
                                            </div>

                                        </div>

                                    </div>

                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="available">
                                <div class="row">
                                    @foreach ($flashes as $flash)
                                    @if ($flash->active == 1 && $flash->order == 0)

                                    <div class="col-6">
                                        <div class="card" style="margin:12px;">

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $flash->name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $flash->price }} €</h6>
                                                <p class="card-text">This tattoo is available</p>
                                                <a href="{{ route('manager.editFlash', $flash->id) }}"
                                                    class="card-link">Edit</a>
                                                <a href="{{ route('manager.deleteFlash', $flash->id) }}"
                                                    class="card-link">Delete</a>
                                            </div>

                                        </div>

                                    </div>
                                    @endif

                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reserved">
                                <div class="row">
                                    @foreach ($flashes as $flash)
                                    @if ($flash->active == 0 && $flash->order == 0)

                                    <div class="col-6">
                                        <div class="card" style="margin:12px;">

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $flash->name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $flash->price }} €</h6>
                                                <p class="card-text">This tattoo is reserved</p>
                                                <a href="{{ route('manager.editFlash', $flash->id) }}"
                                                    class="card-link">Edit</a>
                                                <a href="{{ route('manager.deleteFlash', $flash->id) }}"
                                                    class="card-link">Delete</a>
                                            </div>

                                        </div>

                                    </div>
                                    @endif

                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tattooed">
                                <div class="row">
                                    @foreach ($flashes as $flash)
                                    @if ($flash->order == 1)

                                    <div class="col-6">
                                        <div class="card" style="margin:12px;">

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $flash->name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $flash->price }} €</h6>
                                                <p class="card-text">This tattoo has been ordered yet</p>
                                                <a href="{{ route('manager.editFlash', $flash->id) }}"
                                                    class="card-link">Edit</a>
                                                <a href="{{ route('manager.deleteFlash', $flash->id) }}"
                                                    class="card-link">Delete</a>
                                            </div>

                                        </div>

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection