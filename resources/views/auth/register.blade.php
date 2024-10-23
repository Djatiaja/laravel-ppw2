@extends('layouts.app')

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <form class="card-body p-5 h-auto" action="{{route('register.store')}}" method="post">
                    @csrf
                    <h3 class="mb-3 w-100 text-center">Sign Up</h3>

                    <div data-mdb-input-init class=" mb-4">
                        <label class="form-label" for="typeEmailX-2">Email</label>
                        <input type="email" id="typeEmailX-2" class="form-control form-control-lg form-control"
                            name="email" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input  id="name" class="form-control form-control-lg"
                            name="name" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="age">Age</label>
                        <input id="age" class="form-control form-control-lg" name="age" type="number" min="0" max="120"/>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="typePasswordX-2">Password</label>
                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                            name="password" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="typePasswordX-2">Confirm password</label>
                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                            name="password_confirmation" />
                    </div>

                    <button data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-primary btn-lg btn-block w-100 mb-4 " type="submit">Register</button>
                    <div class="d-flex">
                        <p>Already have an Account? </p>
                        <a href="/login" class="link-secondary ms-2"> Login</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection