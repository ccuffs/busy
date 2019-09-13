<?php

namespace App\Http\Controllers;

class StatusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function show($id)
    {
        return view('status', ['name' => 'James']);
    }
}
