@extends('layouts.app')

@section('content')
    <div class="card mb-3">

        @include('partials.discussion-header')

        <div class="card-body">
            <div class="text-center">
                <b>{{ $discussion->title }}</b>
            </div>
            <hr>
            {!! $discussion->content !!}
        </div>
    </div>

    @foreach($discussion->replies()->paginate(3) as $reply)
        <div class="card my-3">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ Gravatar::src($reply->owner->email) }}" width="40" alt="" style="border-radius: 50%">
                        <span class="ml-2">{{ $reply->owner->name }}</span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Mark as best reply</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>
    @endforeach
    {{ $discussion->replies()->paginate(3)->links() }}
    @auth
        <div class="card my-5">
            <div class="card-header">
                Add a reply
            </div>
            <div class="card-body">
                <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                    @csrf
                    <input type="hidden" name="content" id="content">
                    <trix-editor input="content"></trix-editor>
                    <button type="submit" class="btn btn-success btn-sm mt-2">Add Reply</button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="btn btn-info" style="color: white">Sign in to add a reply</a>
    @endauth
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js"></script>
@endsection
