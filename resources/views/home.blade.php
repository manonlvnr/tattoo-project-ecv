@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Welcome to your user account !</h1></div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My profile') }}</div>

                <div class="card-body">

                        <form method='POST' action="/home/updateInfo">
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name</label>

                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name"
                                                    value=" {{ $user->name }} ">
                                                @csrf
                                                <input type="hidden" name="id" value=" {{ $user['id'] }} ">
                                                <button class="btn btn-outline-secondary" type="submit">Update</button>
                                            </div>

                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Birthdate</label>

                                            <div class="input-group">
                                                <input type="date" class="form-control" name="birthdate"
                                                    value=" {{ Auth::user()->birthdate }} ">

                                                <input type="hidden" name="id" value=" {{ $user['id'] }} ">

                                                <button class="btn btn-outline-secondary" type="submit">Update</button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $user->email }}">
                                                <button class="btn btn-outline-secondary" type="submit">Update</button>
                                            </div>

                                        </div>

                                        <div class="mb-3 ">
                                            <label for="exampleFormControlInput1" class="form-label">Phone
                                                number</label>        
                                            <div class="input-group">        
                                                <input type="tel" class="form-control" name="phone"
                                                    value="{{ $user->phone }}">
                                                <button class="btn btn-outline-secondary"
                                                    type="submit">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
