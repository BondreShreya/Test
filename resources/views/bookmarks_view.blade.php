@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Bookmarks') }}</div>

                <div class="card-body">
                    @if (count($bookmarks) > 0)
                        <ul>
                        @foreach ($bookmarks as $bookmark)
                            <li>
                                @if ($bookmark->post) <!-- Check if post relationship is not null -->
                                    <h2>{{ $bookmark->post->title }}</h2>
                                    <p>{{ $bookmark->post->body }}</p>
                                    <p>UserID: {{ $bookmark->post->userId }}</p>
                                @else
                                    <p>Bookmark ID: {{ $bookmark->id }}</p>
                                @endif
                            </li>
                        @endforeach
                        </ul>
                    @else
                        <p>No bookmarks available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
