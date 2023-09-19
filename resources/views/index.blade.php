@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of Posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($posts) > 0)
                        <ul>
                            @foreach ($posts as $post)
                                <li>
                                    <h2>{{ $post->title }}</h2>
                                    <p>{{ $post->body }}</p>
                                    <p>UserID: {{ $post->id }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No posts available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
