<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StatisticController extends Controller
{
    public function index(): View
    {
        return view('statistic-index');
    }
}
