<?php

namespace App\Http\Controllers;
use App\Competition;
use App\Hotel;
use App\Setting;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $organisation = Setting::where('key', 'organisation')->first();
        $phone = Setting::where('key', 'phone')->first();
        $email = Setting::where('key', 'email')->first();
        $resource = substr($request->getPathInfo(), 1);
        $data = Competition::where('id', $request->activeCompetition)->first();
        switch ($resource) {
            case 'competitions':
                $data = Competition::select('active', 'title', 'year', 'id')->get();
            break;
            case 'settings':
                $data['hotels'] = Hotel::where('competition_id', $request->activeCompetition)->get();
            break;
            default:
                $data = Competition::select('active', 'title', 'year', 'id')->get();
            break;
    }
        return view('admin.'.$resource.'.index', [
            'data' => $data,
            'organisation' => $organisation->value,
            'phone' => $phone->value,
            'email'=> $email->value
            ]);
    }


    /**
     * Display specific resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Competition $competition)
    {
        return response()->json(['competition' => $competition]);
    }
}
