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
    public function index()
    {
        $items = Reservation::whereUserId(auth()->user()->id)->paginate(5)->onEachSide(1);
        $items = json_decode(json_encode($items), 1);
        return Inertia::render('Reservation', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param $date
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $date = $date ?? date("Y-m-d");
        $resData = [];
        $hours = ReservationHours::all();
        foreach ($hours as $k => $v) {
            $control = Reservation::where('date', $date)->whereJsonContains('hour', $v['hours'])->count();
            $v['isActive'] = $control;
            $resData[] = $v;
        }
        return Inertia::render('_Back/Reservation/CreateReservation', ['hours' => $resData, 'date' => $date]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
