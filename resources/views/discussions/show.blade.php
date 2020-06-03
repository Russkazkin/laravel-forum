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
    @auth
    <div class="card my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="reply" id="reply">
                <trix-editor input="reply"></trix-editor>
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
