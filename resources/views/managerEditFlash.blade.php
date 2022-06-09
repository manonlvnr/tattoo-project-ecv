@extends('layouts.appManager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit your tattoo : {{ $flash->name }}</div>
      
                <div class="card-body">


                <form action="{{ route('manager.updateFlash') }}" method="POST"  enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Flash photo</label> <br>
                
                                    <!-- <label for="file-input">
                                        <div id="flash_photo_u" class="form-control-file" class="align-middle"
                                            style="text-align: -webkit-center; line-height: 200px; height: 200px; width: 200px; color: #ffcb20;font-size: 50px;background: #fff;border: 1px solid #dfdfdf;-webkit-transition: .2s;transition: .2s ease all;">
                                            +
                                        </div>
                                    </label> -->
                                

                                    @if ($flash->pictureFile)
                                        <img class="card-img-top" src="{{ asset('images/flashes/' . $flash->PictureFile->filename) }}">
                                        @endif
                                        <input type="file" name="fileImageEdit" style="" class="mt-3 mb-3" />
                            </div>

                        </div>

                  
                            <input type="hidden" name="id" value="{{$flash['id']}}">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $flash->name }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Price (€)</label>
                                        <input type="text" class="form-control" name="price" value="{{ $flash->price}}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-check">
                                        @if($flash->active == "1")
                                            <input class="form-check-input" type="checkbox" value="1" name="active"
                                                checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" value="0" name="active">
                                        @endif
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Active
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('manager.flashes') }}" class="btn btn-dark">Cancel</a>

                                        <button type="submit" class="btn btn-warning">Save</button>
                                        <div>
                                        </div>

                                    </div>

                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection