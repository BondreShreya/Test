@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <a href="{{ url('/add_product')}}">Add Product</a> -->
                   
                    <div class="card-body">
                    <a href="{{ route('fetch_data')}}" type="btn btn-primary">Fetch Data</a>
               

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
