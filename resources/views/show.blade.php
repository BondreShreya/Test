@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Single Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <p>UserID: {{ $post->id }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
