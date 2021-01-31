<?php

namespace App\Http\Controllers;

use App\Accommodation;
use Illuminate\Http\Request;
use App\Hotel;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hotels = Hotel::where('competition_id', $request->activeCompetition)->get();
        $accommudations = Accommodation::where('user_id', auth()->user()->id)->where('competition_id', $request->activeCompetition)->get();
        for ($i=0; $i < count($accommudations); $i++) {
            $accommudations[$i]->hotel = $accommudations[$i]->getHotel;
        }
        return view('registration.accommodation.index', ['hotels' => $hotels, 'accommudations' => $accommudations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $records = (object) $request->records;
        $hotel = Hotel::where('id', $records->hotel)->first();
        if ($hotel[$records->room . '_avivable'] > $records->number) {
            $hotel->update([
                $records->room . '_avivable' => $hotel[$records->room . '_avivable'] - $records->number
            ]);
        }
        $accommodation = new Accommodation();
        $accommodation->user_id = auth()->user()->id;
        $accommodation->competition_id = $request->activeCompetition;
        foreach ($request->records as $key => $value) {
            $accommodation[$key] = $value;
        }
        $accommodation->save();
        $accommodation->hotel = $accommodation->getHotel;
        return view('registration.accommodation.responseCard', ['accommudation' => $accommodation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $data = [];
        $object = [];
        if ($hotel->single_room) {
            $object['type'] = "Single Room";
            $object['price'] = $hotel->single_room_price;
            $object['avivable'] = $hotel->single_room_avivable;
            $object['value'] = 'single_room';
            array_push($data, (object) $object);
        }
        if ($hotel->double_room) {
            $object['type'] = "Double Room";
            $object['price'] = $hotel->double_room_price;
            $object['avivable'] = $hotel->double_room_avivable;
            $object['value'] = 'double_room';
            array_push($data, (object) $object);
        }
        if ($hotel->triple_room) {
            $object['type'] = "Triple Room";
            $object['price'] = $hotel->triple_room_price;
            $object['avivable'] = $hotel->triple_room_avivable;
            $object['value'] = 'triple_room';
            array_push($data, (object) $object);
        }
        if ($hotel->room_for_four) {
            $object['type'] = "Room for four";
            $object['price'] = $hotel->room_for_four_price;
            $object['avivable'] = $hotel->room_for_four_avivable;
            $object['value'] = 'room_for_four';
            array_push($data, (object) $object);
        }
        return view('registration.accommodation.roomType', ['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {

        $hotel = $accommodation->getHotel;
        $hotel->update([
            $accommodation->room.'_avivable' => $hotel[$accommodation->room.'_avivable'] + $accommodation->number
        ]);
        $accommodation->delete();
    }
}
