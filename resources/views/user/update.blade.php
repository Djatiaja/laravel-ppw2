@extends('layouts.app')

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <form class="card-body p-5 h-auto" action="{{ route('dashboard-user.save', $user->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-3 w-100 text-center">Update User</h3>

                    <div class="mb-4">
                        <label class="form-label" for="typeEmailX-2">Email</label>
                        <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email"
                            value="{{ old('email', $user->email ?? '') }}" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input id="name" class="form-control form-control-lg" name="name"
                            value="{{ old('name', $user->name ?? '') }}" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="age">Age</label>
                        <input id="age" class="form-control form-control-lg" name="age" type="number" min="0" max="120"
                            value="{{ old('age', $user->age ?? '') }}" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="photo">Photo</label>
                        <input id="photo" class="form-control form-control-lg" name="photo" type="file" />
                        @if (isset($user) && $user->photo)
                        <br>
                        <p>Current photo: <img src="{{ asset('storage/'.$user->photo) }}" alt="User Photo"
                                width="100" /></p>
                        @endif
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">Is Admin</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="admin_no" name="is_admin" value="no" {{
                                old('is_admin', $user->is_admin) == false ? 'checked' : '' }} />
                            <label class="form-check-label" for="admin_no">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="admin_yes" name="is_admin" value="yes" {{
                                old('is_admin', $user->is_admin) == true ? 'checked' : '' }} />
                            <label class="form-check-label" for="admin_yes">Yes</label>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="typePasswordX-2">Password</label>
                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                            name="password" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="typePasswordX-2">Confirm password</label>
                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                            name="password_confirmation" />
                    </div>

                    <button class="btn btn-primary btn-lg btn-block w-100 mb-4" type="submit">Update</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection