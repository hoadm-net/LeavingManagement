<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function show(string $id): View
    {
        return view('edit-department', [
            'department' => Department::findOrFail($id)
        ]);
    }
}
