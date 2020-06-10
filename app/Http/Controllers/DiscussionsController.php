<?php

namespace LaravelForum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use LaravelForum\Discussion;
use LaravelForum\Http\Requests\CreateDiscussionRequest;
use LaravelForum\Reply;

class DiscussionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create', 'store', 'destroy', 'update', 'edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('discussions.index', [
            'discussions' => Discussion::filterByChannels()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDiscussionRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateDiscussionRequest $request)
    {
        auth()->user()->discussions()->create([
            'title' => $request['title'],
            'slug' => Str::slug($request['title']),
            'content' => $request['content'],
            'channel_id' => $request['channel'],
        ]);

        session()->flash('success', 'Discussion posted.');

        return redirect()->route('discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \LaravelForum\Discussion  $discussion
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.show', ['discussion' => $discussion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LaravelForum\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \LaravelForum\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LaravelForum\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        //
    }

    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->markAsBestReply($reply);

        session()->flash('success', 'Marked as best reply');

        return redirect()->back();
    }
}
