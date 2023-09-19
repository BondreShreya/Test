@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bookmark Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bookmark', ['id' => $post->id]) }}">
                        @csrf

                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->body }}</p>
                        <p>UserID: {{ $post->userId }}</p>

                        <button type="submit" class="btn btn-primary">Bookmark</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
