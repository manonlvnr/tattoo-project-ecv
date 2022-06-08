@extends('layouts.appManager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My profile') }}</div>

                <div class="card-body">

                    <!-- Accordion -->
                    <div class="accordion" id="accordionExample">

                        <!-- Accordion 1 Personnal informations -->
                        <form method='POST' action="/manager/updateInfo">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Personnal informations
                                    </button>
                                </h2>
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
                                            <label for="exampleFormControlInput1" class="form-label">Birthdate - <strong> {{ $user->birthdate }} </strong></label>

                                            <div class="input-group">
                                                <input type="date" class="form-control" name="birthdate"
                                                    value=" {{ $user->birthdate }} ">

                                                <input type="hidden" name="id" value=" {{ $user['id'] }} ">

                                                <button class="btn btn-outline-secondary" type="submit">Update</button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Email
                                                address</label>

                                            <div class="input-group">
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $user->email }}">
                                                <button class="btn btn-outline-secondary" type="submit">Update</button>
                                            </div>

                                        </div>

                                        <div class="mb-3">
                                            <label for="ARSFile" class="form-label">ARS receipt or hygiene training
                                                (document or photo)</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="ARSdocument">Send</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Accordion 2 Informations visibles -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Visible information
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
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

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Tattooist
                                                    name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="tattooist_name"
                                                        value="{{ $user->tattooist_name }}">
                                                    <button class="btn btn-outline-secondary"
                                                        type="submit">Update</button>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Tattooist
                                                    parlor</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="tattoo_parlor"
                                                        value="{{ $user->tattoo_parlor }}">
                                                    <button class="btn btn-outline-secondary"
                                                        type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <!-- A propos de moi -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    About Me
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">

                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">My photos</label>
                                        <br>
                                        <em>Please add in order: 1) a profile picture, 2) photos of the shop if
                                            you have any and finally 3) photos of tattoos made that represent
                                            you best.</em>
                                        <br>
                                        <br>
                                        <!-- <form action="{{ route('manager.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <label for="file-input">
                                        <div id="flash_photo_u" class="form-control-file" class="align-middle"
                                            style="text-align: -webkit-center; line-height: 200px; height: 200px; width: 200px; color: #ffcb20;font-size: 50px;background: #fff;border: 1px solid #dfdfdf;-webkit-transition: .2s;transition: .2s ease all;">
                                            +
                                        </div>
                                    </label>
                                            <input id="file-input" name="imageFile" type="file" style="display:none" />
                                    
                                            <button class="btn btn-outline-secondary" type="submit">Update</button>
                                            </form> -->

                                        <form action="{{ route('manager.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label class="form-label" for="inputImage">Image:</label>
                                                <input type="file" name="image" id="inputImage"
                                                    class="form-control @error('image') is-invalid @enderror">

                                                @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-secondary">Upload</button>
                                            </div>

                                        </form>

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