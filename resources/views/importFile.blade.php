@extends('admin.layouts.two_col')
@section('main')
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import and Export Excel data
            to database Using Laravel 5.8
        </div>
        <div class="card-body">
            <form action="{{ route('import-user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button type="submit" class="btn btn-success">
                    Submit
                </button>
                <a class="btn btn-warning" href="{{ route('export-user') }}">
                    Export Data
                </a>
            </form>
        </div>
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