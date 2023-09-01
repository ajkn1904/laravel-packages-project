@extends('admin.layouts.two_col')
@section('main')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    @if(Session::has('user_email'))
    <div>
        <h2>Welcome {{Session::get('user_fname')}} {{Session::get('user_lname')}}</h2>
        <h3>{{Session::get('user_email')}}</h3>
    </div>
    @endif

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

    <div class="container">
        <section>
            <div class="container py-3">

                <header class="text-center mb-2">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <h1>Subscription</h1>
                            <h3>PRICING</h3>
                        </div>
                    </div>
                </header>

                <div class="row text-center align-items-end">
                    <!-- <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="bg-white p-5 rounded-lg shadow">
                            <h1 class="h6 text-uppercase font-weight-bold mb-4">FREE</h1>
                            <h2 class="h1 font-weight-bold">$0<span class="text-small font-weight-normal ml-2">/
                                    free</span></h2>

                            <div class="custom-separator my-4 mx-auto bg-primary"></div>

                            <ul class="list-unstyled my-5 text-small text-left">
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Lorem ipsum dolor sit amet
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> At vero eos et accusamus
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Nam libero tempore</del>
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Sed ut perspiciatis</del>
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Sed ut perspiciatis</del>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>
                        </div>
                    </div> -->

                    @foreach($plans as $plan)
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="bg-white p-5 rounded-lg shadow">
                            <h1 class="h6 text-uppercase font-weight-bold mb-4">{{ $plan->name }}</h1>
                            <h2 class="h1 font-weight-bold">${{ $plan->price }}<span
                                    class="text-small font-weight-normal ml-2">/ month</span></h2>

                            <div class="custom-separator my-4 mx-auto bg-primary"></div>

                            <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Lorem ipsum dolor sit amet
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> At vero eos et accusamus
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Nam libero tempore
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Sed ut perspiciatis</del>
                                </li>
                            </ul>
                            <a href="{{ route('plans.show', $plan->slug) }}"
                                class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo/chart-pie-demo.js') }}"></script>
    @endsection