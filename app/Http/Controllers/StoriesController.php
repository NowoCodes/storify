<?php

namespace App\Http\Controllers;

use App\Events\StoryCreated;
use App\Events\StoryEdited;
use App\Models\Story;
use App\Http\Requests\StoryRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewStoryNotification;
use Illuminate\Support\Facades\Log;

class StoriesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Story::class, 'story');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::where('user_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->Paginate(5);
        return view('stories.index', [
            'stories' => $stories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create');
        $story = new Story;
        return view('stories.create', [
            'story' => $story,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $story = auth()->user()->stories()->create($request->validated());
        event(new StoryCreated($story->title));

        return redirect()->route('stories.index')
            ->with('status', 'Story Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        // $this->authorize('view', $story);
        return view('stories.show', [
            'story' => $story,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        // ? Prevent other users from editing another user's story
        // Gate::authorize('edit-story', $story);
        // $this->authorize('update', $story);
        // ?
        return view('stories.edit', [
            'story' => $story,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {
        $story->update($request->validated());
        event(new StoryEdited($story->title));

        return redirect()->route('stories.index')
            ->with('status', 'Story Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        // $this->authorize('delete', $story);
        $story->delete();
        return redirect()->route('stories.index')
            ->with('status', 'Story Deleted Successfully');
    }
}
