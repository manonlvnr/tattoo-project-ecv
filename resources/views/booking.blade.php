@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $flash->name }}</h1>
    <p>{{ $flash->tattooist->tattooist_name }}</p>

    <form action="{{ route('post', $flash->id) }}" method="POST">
        <div class="mb-3">
            @csrf
            <label for="exampleInputEmail1" class="form-label">Premier tatouage</label>
            <select name="firstTattoo" class="form-select" style="width: 30%;" required>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Message</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="optionalMessage">
        </div>
        <div class="mb-3">
            <input type="date" class="form-control" id="calendar" name="date" placeholder="Select a date">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/flatpickr">
</script>

<script>
    var bool = {!! json_encode($dates_array) !!};
    console.log(bool);
    flatpickr('#calendar', {
                    "minDate": new Date().fp_incr(1),
                    disable: bool,
                    dateFormat: "Y-m-d",
});
</script>
@endsection
