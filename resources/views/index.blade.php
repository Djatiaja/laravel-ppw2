@extends('layouts.app')

@section('style')
<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #f2dede; 
        border-color: #ebccd1;
        color: #a94442;
    }
</style>
@endsection



@section('content')
<div class="mt-16">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @elseif ($message = Session::get('error')) <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @endif
    <h1>Home</h1>
    <p>This is the home page</p>
@endsection