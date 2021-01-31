<?php

namespace App\Http\Controllers;

use App\Definative;
use Illuminate\Http\Request;

class DefinativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $definative = Definative::where('user_id', auth()->id())->get();
        if (count($definative) != 0) {
            $data = $definative[0];
        } else {
            $definative = new Definative();
            $definative->user_id = auth()->id();
            $definative->competition_id = $request->activeCompetition;
            $definative->save();
            $data = $definative;
        }
        return view('registration.definative.index', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $definative = Definative::where('user_id', auth()->id())
        ->where('competition_id', $request->activeCompetition)->first();
        foreach ($request->records as $key => $value) {
            $definative->update([$key => $value]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Definative  $definative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Definative $definative)
    {
        //
    }
}
