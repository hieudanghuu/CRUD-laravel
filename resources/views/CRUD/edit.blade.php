@extends('layouts.app')

@section('title','form-edit')

@section('content')
<h1 class="text-success text-center mt-3 mb-3">Edit</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form class="form-group" action="{{route('customer.update',$customer->id)}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div>
        <label for="">name</label>
    <input type="text" name="name" class="form-control" value="{{$customer->name}}">
    </div>
    <div>
        <label for="">email</label>
        <input type="email" name="email" class="form-control" value="{{$customer->email}}">
    </div>   <div>
        <label for="">address</label>
        <input type="text" name="address" class="form-control" value="{{$customer->address}}">
    </div>
    <button class="btn btn-sm btn-primary mt-3">SUBMIT</button>
</form>
@endsection