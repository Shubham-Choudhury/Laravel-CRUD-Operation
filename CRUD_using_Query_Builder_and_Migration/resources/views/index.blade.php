@extends('layouts.main')

@push('title')
    <title>CRUD using Query Builder and Migration</title>
@endpush

@push('btn')
    <a class="btn btn-success" href="/create">Add Data</a>
@endpush

@section('main')
    <div class="container card">
        <h3 class="text-center my-3">Students Information</h3>
        <table class="table container">
            <thead>
            <tr class="table-dark text-white">
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col" class="d-flex justify-content-evenly">Action</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="row">{{$student->id}}</th>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td class="d-flex justify-content-evenly">
                        {{-- <a href="/show/{{$student->id}}" class="btn btn-primary">View</a> --}}
                        {{-- <a href="{{route('show', ['id'=>$student->id])}}" class="btn btn-primary">View</a> --}}
                        <a href="{{url('/show')}}/{{$student->id}}" class="btn btn-primary">View</a>

                        {{-- <a href="/edit/{{$student->id}}" class="btn btn-warning">Edit</a> --}}
                        <a href="{{route('edit', ['id'=>$student->id])}}" class="btn btn-warning">Edit</a>
                        {{-- <a href="{{url('/edit')}}/{{$student->id}}" class="btn btn-warning">Edit</a> --}}

                        {{-- <a href="/delete/{{$student->id}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('delete', ['id'=>$student->id])}}" class="btn btn-danger">Delete</a> --}}
                        <a href="{{url('/delete')}}/{{$student->id}}" class="btn btn-danger">Delete</a>
                    </td>
            @endforeach

            
            </tbody>
        </table>
    </div>
@endsection
    

