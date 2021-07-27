<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('status.index')->with('statuses', $statuses);
    }

    public function create()
    {
        return view('status.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        Status::create($data);

        return redirect()->route('status.index');
    }
}
