<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * this controller made by auth
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');// example of checking user auth
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->session(['Hos'=>"master instructor"]);
        return view('home');
    }
}
