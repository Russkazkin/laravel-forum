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
    <div class="card my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="reply" id="reply">
                <trix-editor input="reply"></trix-editor>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js"></script>
@endsection
