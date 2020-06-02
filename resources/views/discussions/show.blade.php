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
@endsection
