@extends('layouts.appManager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add a new flash') }}</div>

                <div class="card-body">
                <form action="{{ route('manager.newFlash') }}" method="POST" enctype="multipart/form-data" >
                    
                            @csrf
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Flash photo</label> <br>
<!--                 
                                    <label for="file-input">
                                        <div id="flash_photo_u" class="form-control-file" class="align-middle"
                                            style="text-align: -webkit-center; line-height: 200px; height: 200px; width: 200px; color: #ffcb20;font-size: 50px;background: #fff;border: 1px solid #dfdfdf;-webkit-transition: .2s;transition: .2s ease all;">
                                            +
                                        </div>
                                    </label> -->
                                    <input id="file-input" type="file" name="fileImage" style="" />
                
                            </div>

                        </div>

                      
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter a name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Price (€)</label>
                                        <input type="text" class="form-control" name="price" placeholder="--">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="available"
                                                checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Available
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('manager.flashes') }}" class="btn btn-dark">Cancel</a>

                                        <button type="submit" class="btn btn-primary">Add</button>
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
