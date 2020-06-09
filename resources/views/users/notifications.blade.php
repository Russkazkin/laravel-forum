@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Notifications</div>

        <div class="card-body">
            <ul class="list-group">
                @foreach($notifications as $notification)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @if($notification->type == 'LaravelForum\Notifications\NewReplyAdded')
                            <div>
                                A new reply was added to your discussion
                                <b>"{{ $notification->data['discussion']['title'] }}"</b>
                            </div>
                            <div>
                                <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-sm btn-info color-white">
                                    View discussion
                                </a>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

