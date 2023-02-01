<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class WorkingHourController extends Controller
{

    public function index($user_id)
    {
        return view('agenda.working-hour.index', compact('user_id'));
    }

    public function create($user_id)
    {
        return view('agenda.working-hour.create', compact('user_id'));
    }

    public function edit($user_id)
    {
        return view('agenda.working-hour.edit', compact('user_id'));
    }

}
