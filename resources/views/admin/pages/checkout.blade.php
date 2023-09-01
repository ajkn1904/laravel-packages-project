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

        @foreach($products as $product)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">Price: ${{ $product->price }}</p>
                <form action="/session" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type='hidden' name="total" value="{{ $product->price }}">
                    <input type='hidden' name="name" value="{{ $product->name }}">
                    <button class="btn btn-primary" type="submit" id="checkout-live-button"><i class="fa fa-money"></i>
                        Checkout</button>
                </form>
            </div>
        </div>
        @endforeach

    </div>

</div>
@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('assets/admin/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/admin/js/demo/chart-pie-demo.js') }}"></script>
@endsection