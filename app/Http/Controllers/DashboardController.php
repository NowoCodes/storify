<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

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
            ->Paginate(10);
        return view('dashboard.index', [
            'stories' => $stories,
        ]);
    }
}
