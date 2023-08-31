@extends('website.layouts.single_col')
@section('content')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>

                @if(Session::has('error'))
                <div class="alert alert-danger">

                    {{Session::get('error')}}

                </div>
                @endif

            </div>

            <form class="user" method="post" action="{{ url('/user-login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                        aria-describedby="emailHelp" placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password"
                        id="exampleInputPassword" placeholder="Password">
                </div>
                <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>


                <!-- login with provider -->
                <hr>
                <a href="/google/login" class=" btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                </a>
                <a href="/facebook/login" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                </a>
                <a href="/linkedin/login" class="btn btn-primary btn-user btn-block">
                    <i class="fab fa-linkedin fa-fw"></i> Login with Linkedin
                </a>


            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ url('/student-register') }}">Create an Account!</a>
            </div>
        </div>
    </div>
</div>
@endsection