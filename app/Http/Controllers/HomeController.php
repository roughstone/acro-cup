<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;

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
    public function index(Request $request)
    {
        $currentActive = Competition::where('active', 'active')->get();

        if ($currentActive) {
            return view('registration.home', ['participationtax' => $currentActive[0]->participation_fee_tax]);
        }
        return view('registration.home');
    }
}
