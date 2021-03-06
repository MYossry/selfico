<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=auth()->user()->following()->pluck('profiles.user_id');
        $posts=post::whereIn('user_id',$users)->latest()->get();
        return view('home',compact('posts'));
    }
}
