<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Competitor;
use App\Provisional;
use App\Officials;
use App\Team;
use App\Accommodation;
use App\TravelSchedule;
use Illuminate\Http\Request;
use App\Directive;

class CompetitionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $competition = new Competition([
            'title' => $request->title,
            'year' => $request->year,
            'active' => 'inactive',
            'poster' => $request->poster,
            'file' => $request->file,
            'directive' => $request->directive,
            'directive_file' => $request->directive_file
        ]);
        $competition->save();
        return view('admin.competitions.card', ['item' => $competition]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Competition $competition)
    {
        $users = [];
        $provisionals = Provisional::where('competition_id', $competition->id)->get();
        foreach ($provisionals as $provisional) {
            $user = $provisional->user;
            $officials = Officials::where('user_id', $user->id)->where('competition_id', $competition->id)->get();
            $teams = Team::where('user_id', $user->id)->where('competition_id', $competition->id)->get();
            foreach ($teams as $key => $team) {
                $teams[$key]['competitors'] = $team->competitors;
            }
            $accommodation = Accommodation::where('user_id', $user->id)->where('competition_id', $competition->id)->get();
            $travelSchedule = TravelSchedule::where('user_id', $user->id)->where('competition_id', $competition->id)->get();
            $competitors = Competitor::where('user_id', $user->id)->where('competition_id', $competition->id)->get();
            $user->competitors = $competitors->toArray();
            $user->travelSchedule = $travelSchedule->toArray();
            $user->accommodation = $accommodation->toArray();
            $user->provisional = $provisional->toArray();
            $user->teams = $teams;
            $user->officials = $officials;
            array_push($users, $user);
        }
        /* dd( $users); */
        return view('admin.teams.index', ['users' => $users, 'competition' => $competition]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        $currentActive = Competition::where('active', 'active')->get();
        if ($competition->active  == 'inactive' && count($currentActive) > 0) {
            return response()->json(
                ['msg' => '<div class="error-msg text-danger col-12 text-center">There is active competition, deactivate it first!!!</div>'],
                403
            );
        }
        if($request->active) {
            $competition->update([
                'active' => $competition->active == 'active' ? 'inactive' : 'active',
            ]);
        } else {
            $competition->update([
                'title' => $request->title,
                'year' => $request->year,
                'poster' => $request->poster,
                'file' => $request->file
                ]);
            if ($request->directive_file && $request->directive) {
                $competition->update([
                    'directive' => $request->directive,
                    'directive_file' => $request->directive_file
                ]);
            }
        }
        return view('admin.competitions.card', ['item' => $competition]);
    }

    /**
     * Get directive from competition
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function directive(Request $request, Competition $competition)
    {
        return response()->json(['file' => $competition->directive_file, 'name' => $competition->directive]);
    }
}

