@extends('layouts.app')

@section('title','form-create')

@section('content')
    <h1 class="text-success text-center mt-3 mb-3">Create</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-group" method="POST" action="{{route('customer.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">NAME</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div>
            <label for="">EMAIL</label>
            <input type="email" name="email" class="form-control">
        </div>   <div>
            <label for="">ADDRESS</label>
            <input type="text" name="address" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary mt-3">SUBMIT</button>
    </form>
@endsection