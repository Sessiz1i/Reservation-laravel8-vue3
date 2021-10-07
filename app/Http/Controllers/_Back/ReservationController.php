<?php

namespace App\Http\Controllers\_Back;

use App\Http\Controllers\Controller;
use App\Models\_Back\Reservation;
use App\Models\_Back\ReservationHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $items = Reservation::whereUserId(auth()->user()->id)->paginate(5);
        $items = json_decode(json_encode($items), 1);
        return Inertia::render('Reservation',['items'=> $items]);
////get the data for the map list page
//        $data = Reservation::whereUserId(auth()->user()->id)->paginate(5);
//        $data = json_decode(json_encode($data), 1);
//        //Edit This for your requirements
//        return Inertia::render('Reservation', ['pageData' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $resData = ReservationHours::all();
        return Inertia::render('_Back/Reservation/CreateReservation', ['hours' => $resData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::make($request->post(), [
            'user_id' => ['required'],
            'date' => ['required', 'min:today'],
            'hour' => ['required']
        ])->validate();
        Reservation::create([
            "user_id" => $request->user_id,
            "date" => $request->date,
            "hour" => json_encode($request->hour),
            "nots" => $request->nots
        ]);
        return redirect()->route('reservation.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\_Back\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\_Back\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\_Back\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\_Back\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
