@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container flex">
        <h1 style="text-align: center; margin-top: 20px;">Send Email</h1>
        <form action="{{route('dashboard-email.send')}}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mt-3">
                <label for="subject">Subjek:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group mt-3">
                <label for="body">Deskripsi:</label>
                <textarea class="form-control" id="body" name="body" required></textarea>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
@endsection
