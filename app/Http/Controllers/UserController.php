<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    public function show(string $id): View
    {
        return view('edit-manager', [
            'user' => User::findOrFail($id)
        ]);
    }
}
