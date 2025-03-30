<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ThanksController extends Controller
{
    public function index(): View
    {
        return view('thanks');
    }
}
