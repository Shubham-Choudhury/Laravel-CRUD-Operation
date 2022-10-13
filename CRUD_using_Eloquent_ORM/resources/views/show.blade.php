@extends('layouts.main')

@push('title')
    <title>{{$student->first_name}} {{$student->last_name}}</title>
@endpush

@push('btn')
    <a class="btn btn-success" href="/edit/{{$student->id}}">Edit Data</a>
@endpush

@section('main')
    <div class="container d-flex justify-content-center">
        <div class="card p-3" style="width: 500px;">
            <h3 class="text-center my-3">{{$student->first_name}} {{$student->last_name}}</h3>
            <form method="post">
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->first_name}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->last_name}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->email}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">City</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->city}}" disabled>
                </div>

                <a class="btn btn-primary" href="/">Home</a>
            </form>

        </div>
    </div>
@endsection