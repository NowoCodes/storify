<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyAdmin;
use App\Mail\NewStoryNotification;

class DashboardController extends Controller
{
    public function index()
    {
        $query = Story::where('status', 1);

        $type = request()->input('type');
        if (in_array($type, ['short', 'long'])) {
            $query->where('type', $type);
        }

        $stories =$query->with('user')
            ->orderBy('id', 'DESC')
            ->Paginate(9);
        return view('dashboard.index', [
            'stories' => $stories,
        ]);
    }

    public function show(Story $activeStory)
    {
        return view('dashboard.show', [
            'story' => $activeStory,
        ]);
    }

    public function email()
    {
        // Mail::raw('This is the Test Email', function ($message) {
        //     // $message->from('john@johndoe.com', 'John Doe');
        //     // $message->sender('john@johndoe.com', 'John Doe');
        //     // $message->to('john@johndoe.com', 'John Doe');
        //     // $message->cc('john@johndoe.com', 'John Doe');
        //     // $message->bcc('john@johndoe.com', 'John Doe');
        //     // $message->replyTo('john@johndoe.com', 'John Doe');
        //     $message->subject('Subject');
        //     // $message->priority(3);
        //     // $message->attach('pathToFile');
        // });
        // Mail::send(new NotifyAdmin('Title of the story'));
        Mail::send(new NewStoryNotification('Title of the Story!!!'));

        dd('here');
    }
}
