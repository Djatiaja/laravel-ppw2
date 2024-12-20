@extends('layouts.app')

@section('content')
@if($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <form class="card-body p-5 h-auto" action="{{route('login.verify')}}" method="post">
                    @csrf
                    <h3 class="mb-3 w-100 text-center">Sign in</h3>

                    <div data-mdb-input-init class=" mb-4">
                        <label class="form-label" for="typeEmailX-2">Email</label>
                        <input type="email" id="typeEmailX-2" class="form-control form-control-lg form-control" name="email"/>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="typePasswordX-2">Password</label>
                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password"/>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-start mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3"  name="remember"/>
                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                    </div>

                    <button class="btn btn-primary btn-lg btn-block w-100 mb-4 "
                        type="submit">Login</button>

                    <div class="d-flex">
                        <p>Don't have an Account? </p>
                        <a href="/register" class="link-secondary ms-2"> Register</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection