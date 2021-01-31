<?php

namespace App\Http\Controllers;

use App\Team;
use App\Officials;
use App\Competitor;
use App\TravelSchedule;
use Illuminate\Http\Request;


class NominativeFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($form)
    {
        $teams = Team::where('kind', 'pair')->get();
        return view('registration.nominative.'.$form, ['team' => $teams]);
    }


    public function recordsData(Request $request, $kind)
    {
        if ($kind == 'travelSchedule') {
            $data = TravelSchedule::where('user_id', auth()->id())
            ->where('competition_id', $request->activeCompetition)->get();
            $data[0]['competitors'] = count(Competitor::where('user_id', auth()->id())->where('competition_id', $request->activeCompetition)->get());
            $data[0]['officials'] = count(Officials::where('user_id', auth()->id())->where('competition_id', $request->activeCompetition)->get());
        } else if ($kind == 'official') {
            $data = Officials::where('user_id', auth()->id())
            ->where('competition_id', $request->activeCompetition)->get();
        } else {
            $data = Team::where('kind', $kind)
            ->where('competition_id', $request->activeCompetition)->get();
        }
        return view('registration.nominative.recordsCycle', ['data' => $data, 'kind' => $kind]);
    }
}
