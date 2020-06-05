<?php
/**
 * @var $discussion \LaravelForum\Discussion
 * @var $reply \LaravelForum\Reply
 */
?>

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
            @if($discussion->bestReply)
                <div class="card bg-success my-4" style="color: white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <img src="{{ Gravatar::src($discussion->bestReply->owner->email) }}" alt="" width="30" style="border-radius: 50%">
                                <span class="ml-2">{{ $discussion->bestReply->owner->name }}</span>
                            </div>
                            <div>
                                <span class="badge badge-warning">Best reply</span>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        {!! $discussion->bestReply->content !!}
                    </div>
                </div>
            @endif
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
                        @if(auth()->user()->id == $discussion->user_id)
                            <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Mark as best reply</button>
                            </form>
                        @endif
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
