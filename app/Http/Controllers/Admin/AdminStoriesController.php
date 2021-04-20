<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;

class AdminStoriesController extends Controller
{
    public function index()
    {
        $stories = Story::onlyTrashed()
            ->with('user')
            ->orderBy('id', 'DESC')
            ->Paginate(10);
        return view('admin.stories.index', [
            'stories' => $stories,
        ]);
    }
}
