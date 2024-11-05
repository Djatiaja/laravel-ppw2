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
@if ($message = Session::get('success'))
<div class="alert alert-success mt-3">
    {{ $message }}
</div>
@elseif ($message = Session::get('error'))
<div class="alert alert-danger mt-3" role="alert">
    {{ $message }}
</div>
@endif

<div class="container mt-4 mb-4">
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Email verified at
                </th>
                <th>
                    Age
                </th>
                <th>
                    photo
                </th>
                <th>
                    Is admin
                </th>
                <th>
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $user)
            <tr>
                <td> {{ $user->name }}</td>
                <td> {{ $user->email }}</td>
                <td> {{ \Carbon\Carbon::parse($user->email_verified_at)->format('d-m-Y') }}</td>
                <td> {{ $user->age}}</td>
                <td>
                    @if (isset($user->photo))
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="" width="50" height="50">
                    @endif
                </td>
                <td> {{ $user->is_admin?'true':'false'}}</td>
                <td>
                    <form action="{{ route('dashboard-user.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger"
                            onclick="confirm('data user akan terhapus')">Delete</button>
                    </form>
                    <form action="{{ 'dashboard-user/update/'. $user->id }}" method="GET">
                        <button type="submit" class="btn-secondary">update</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="w-100 d-flex justify-content-center">
        <a href="{{ route('dashboard-user.create') }}">
            <button class="btn-primary rounded-3">
                Tambah User
            </button>
        </a>
    </div>
</div>
@endsection('content')