@extends('layouts.appManager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Calendar') }}</div>
  
                <div class="card-body">
                
                <div class="m-4">


<ul class="nav nav-tabs" id="myTab">
    <li class="nav-item">
        <a href="#tocome" class="nav-link active" data-bs-toggle="tab">Appointments to come</a>
    </li>
    <li class="nav-item">
        <a href="#past" class="nav-link" data-bs-toggle="tab">Past appointments</a>
    </li>

</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="tocome">
        <!-- <p class="mt-2">You don't have a reservation yet.</p> -->

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


    </div>
    <div class="tab-pane fade" id="past">
        <p class="mt-2">You haven't tattooed with the platform yet.</p>

    </div>

</div>
</div>











                </div>
            </div>
        </div>
    </div>
</div>
@endsection
