@extends('layouts.app')

@section('title','index')
    
@section('content')

    <h1 class="text-success text-center mt-3 mb-3">List</h1>
    @if (session()->has('create')) 
        <p class="btn-success text-center">{{session('create')}}</p>
    @endif
    @if (session()->has('delete')) 
    <p class="btn-danger text-center">{{session('delete')}}</p>
    @endif
    @if (session()->has('update')) 
    <p class="btn-warning text-center">{{session('update')}}</p>
    @endif
    <form method="GET" class="form-inline my-2 my-lg-0 mb-4 " >
        @csrf
        @method('POST')
        <input class="form-control" name="search" type="text" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <table class="table table-striped table-inverse table-responsive mt-2">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>address</th>
                <th>action</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $customer)
                <tr>
                    <td scope="row">{{$customers->firstItem() + $key}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->address}}</td>
                    <td ><a href="{{route('customer.edit',$customer->id)}}" class="btn btn-sm btn-outline-warning">Edit</a></td>
                    <td><a href="{{route('customer.delete',$customer->id)}}" class="btn btn-sm btn-outline-danger">Delete</a></td>
                    <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                </tr>
            @endforeach
        </tbody>       
    </table>
@endsection