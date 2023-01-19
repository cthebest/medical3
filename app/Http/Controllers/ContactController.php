<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        //Inertia::share('props', ['errors' => 'Error']);
        return view('contacts.create');
    }
}
