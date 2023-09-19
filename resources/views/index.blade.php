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
                        <ul class="list-unstyled">
                            @foreach ($posts as $post)
                                <li class="d-flex justify-content-between align-items-center">
                                    <div style="border-bottom: 1px solid #00000057;margin-bottom: 10px;">
                                        <p><strong>Id : </strong>{{ $post->id }}</p>
                                        <p><strong>UserID : </strong>{{ $post->userId }}</p>
                                        <p><strong>Title : </strong>{{ $post->title }}</p>
                                        <p><strong>Body : </strong>{{ $post->body }}</p>
                                    </div>
                                    
                                    <!-- Add a "View" button that links to the single post view -->
                                    <a href="{{ route('show', ['id' => $post->id]) }}" class="btn btn-primary">View</a>
                                    
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
