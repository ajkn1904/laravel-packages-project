@extends('website.layouts.single_col')
@section('content')
<div class="row">
    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
    <div class="col-lg-7">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Teacher Account!</h1>


                @if(Session::has('success'))
                <div class="alert alert-success">

                    {{Session::get('success')}}

                </div>
                @endif


                @if(Session::has('error'))
                <div class="alert alert-danger">

                    {{Session::get('error')}}

                </div>
                @endif


            </div>
            <form class="user" method="post" action="{{ url('/teacher-registration') }}">
                @csrf
                <div class="form-group row">



                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="first_name"
                            id="exampleFirstName" placeholder="First Name">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="last_name" id="exampleLastName"
                            placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                        placeholder="Email Address">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            placeholder="Password" name="password">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                            placeholder="Repeat Password" name="conf_password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Register as a Teacher</button>

                <hr>
                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>
@endsection