@extends('layouts.appManager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My flashes') }}</div>

                <div class="card-body">

                    <div class="m-4">

                        <a class="btn btn-primary mb-3" type="button" href="{{ route('manager.add')}}">Add a new flash</a>

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
                                <h4 class="mt-2">All tab content</h4>

                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">400.00 € - 50min - 30cm / 30cm </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="available">
                                <h4 class="mt-2">Profile tab content</h4>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">400.00 € - 50min - 30cm / 30cm </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reserved">
                                <h4 class="mt-2">Messages tab content</h4>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">400.00 € - 50min - 30cm / 30cm </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tattooed">
                                <h4 class="mt-2">Messages tab content</h4>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">400.00 € - 50min - 30cm / 30cm </p>
                                    </div>
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