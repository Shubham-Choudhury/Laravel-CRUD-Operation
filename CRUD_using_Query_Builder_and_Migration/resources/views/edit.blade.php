@extends('layouts.main')

@push('title')
    <title>Edit Data</title>
@endpush

@push('btn')
    <a class="btn btn-success" href="/">Home</a>
@endpush

@section('main')
    <div class="container d-flex justify-content-center">
        <div class="card p-3" style="width: 500px;">
            <h3 class="text-center my-3">Add Data</h3>
            <form method="post" action="/update/{{$student->id}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name" value="{{$student->first_name}}">
                    @error('first_name')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="last_name" value="{{$student->last_name}}">
                    @error('last_name')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$student->email}}">
                    @error('email')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">City</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="city" value="{{$student->city}}">
                    @error('city')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection