<?php

namespace App\Http\Controllers;

use App\Team;
use App\Competitor;
use App\Officials;
use App\TravelSchedule;
use Illuminate\Http\Request;

class NominativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('registration.nominative.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->team) {
            if ($request->team == "travelSchedule") {
                $current = TravelSchedule::where('user_id', auth()->id())
                ->where('competition_id', $request->activeCompetition)
                ->first();
                if ($current) {
                    $current->delete();
                }
                $team = new TravelSchedule();
                $team->user_id = auth()->id();
                $team->competition_id = $request->activeCompetition;
                foreach ($request->travelSchedule as $key => $value) {
                    $team[$key] = $value;
                }
                $team->save();
                $team['competitors'] = count(Competitor::where('user_id', auth()->id())->where('competition_id', $request->activeCompetition)->get());
                $team['officials'] = count(Officials::where('user_id', auth()->id())->where('competition_id', $request->activeCompetition)->get());
                return view('registration.nominative.travelScheduleResCard', ['record' => $team]);
            } else {
                $team = new Team();
                $team->user_id = auth()->id();
                $team->competition_id = $request->activeCompetition;
                foreach ($request->team as $key => $value) {
                    $team[$key] = $value;
                }
                $team->save();
                foreach ($request->competitors as $competitor_record) {
                    $competitor = new Competitor();
                    $competitor->competition_id = $request->activeCompetition;
                    $competitor->user_id = auth()->id();
                    foreach ($competitor_record as $key => $value) {
                        $competitor[$key] = $value;
                    }
                    $competitor->save();
                    $team->competitors()->attach($competitor);
                }
            }
        } else {
            $team = new Officials();
            $team->competition_id = $request->activeCompetition;
            $team->user_id = auth()->id();
            foreach ($request->competitors as $officials) {
                foreach ($officials as $key => $value) {
                    $team[$key] = $value;
                }
            }
            $team->save();
        }
        return view('registration.nominative.responseCard', ['record' => $team]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id)
    {
        if ($type == 'team') {
            Team::where('id', $id)->delete();
        } else {
            Officials::where('id', $id)->delete();
        }
    }
}
