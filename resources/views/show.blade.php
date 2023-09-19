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
                    <p><strong> Id : </strong>{{ $post->id }}</p>
                    <p><strong> UserID : </strong>{{ $post->userId }}</p>
                    <p><strong> Title : </strong>{{ $post->title }}</p>
                    <p><strong> Body : </strong>{{ $post->body }}</p>
                    
                    <!-- Bookmark button -->
                    <form method="POST" action="{{ route('bookmark', ['id' => $post->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Bookmark</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
