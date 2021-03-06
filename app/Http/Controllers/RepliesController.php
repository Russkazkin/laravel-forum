<?php

namespace LaravelForum\Http\Controllers;

use Illuminate\Http\Request;
use LaravelForum\Discussion;
use LaravelForum\Http\Requests\CreateReplyRequest;
use LaravelForum\Notifications\NewReplyAdded;
use LaravelForum\Reply;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateReplyRequest $request
     * @param Discussion $discussion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateReplyRequest $request, Discussion $discussion)
    {
        auth()->user()->replies()->create([
            'discussion_id' => $discussion->id,
            'content' => $request['content'],
        ]);

        if ($discussion->author->id != auth()->user()->id) {
            $discussion->author->notify(new NewReplyAdded($discussion));
        }

        session()->flash('success', 'Reply added.');

        return redirect()->route('discussions.show', $discussion->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \LaravelForum\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LaravelForum\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \LaravelForum\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LaravelForum\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
