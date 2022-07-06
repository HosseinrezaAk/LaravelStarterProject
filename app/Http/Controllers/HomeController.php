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
//        $request->session()->put(['Hos'=>"master instructor"]);  //for adding to session
        //remember session in global
        // session(["hos"=> "master instructro"]);  // you can use this instead of using $request
//        return $request->session()->all();  // to see all inside of session

//        $request->session()->forget('hos');  // to delete a key + value from session

        return view('home');
    }
}
