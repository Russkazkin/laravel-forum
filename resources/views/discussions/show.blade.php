@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <img width="40" style="border-radius: 50%;" src="{{ Gravatar::src($discussion->author->email) }}" alt="">
                    <b class="ml-2">{{ $discussion->author->name }}</b>
                </div>
                <div class="div">
                    <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-success btn-sm">View</a>
                </div>
            </div>

        </div>

        <div class="card-body">
            {{ $discussion->title }}
            <hr>
            {{ $discussion->content }}
        </div>
    </div>
@endsection
