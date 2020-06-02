@extends('layouts.app')

@section('content')
    <div class="card mb-3">

        @include('partials.discussion-header')

        <div class="card-body">
            {{ $discussion->title }}
            <hr>
            {!! $discussion->content !!}
        </div>
    </div>
@endsection
