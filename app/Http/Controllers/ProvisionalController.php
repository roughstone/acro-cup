<?php

namespace App\Http\Controllers;

use App\Provisional;
use Illuminate\Http\Request;

class ProvisionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provisional = Provisional::where('user_id', auth()->id())->get();
        if (count($provisional) != 0) {
            $data = $provisional[0];
        } else {
            $provisional = new Provisional();
            $provisional->user_id = auth()->id();
            $provisional->competition_id = $request->activeCompetition;
            $provisional->save();
            $data = $provisional;
        }
        return view('registration.provisional.index', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $provisional = Provisional::where('user_id', auth()->id())
        ->where('competition_id', $request->activeCompetition)->first();
        foreach ($request->records as $key => $value) {
            $provisional->update([$key => $value]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provisional  $provisional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provisional $provisional)
    {
        //
    }
}
