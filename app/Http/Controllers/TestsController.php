<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    public function one() {
        $results = DB::table('products')
            ->where('id', '4')
            ->value('name');
            // ->get();
        echo '<pre>';
        dd($results);
        echo '</pre>';

        return view(
            'tests.one',
            [
                'foo' => 'bar1',
                'haystack' => 'needle',
            ]
        );
    }

    public function two() {
        return view(
            'tests.two',
            [
                'foo' => 'bar2',
                'haystack' => 'needles',
            ]
        );
    }
}
