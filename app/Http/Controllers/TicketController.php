<?php

namespace App\Http\Controllers;

use App\Models\Leaving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function view(string $id): View
    {
        if (Auth::user()->isAdmin() && Auth::user()->isHR()) {
            abort(403);
        }

        return view('view-ticket', [
            'ticket' => Leaving::findOrFail($id)
        ]);
    }

    public function show(string $id): View
    {
        return view('show-ticket', [
            'overtime' => Leaving::findOrFail($id)
        ]);
    }
}
