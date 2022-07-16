<?php

namespace App\Http\Controllers\Admin;
use App\Models\Rersavation;
use App\Models\Table;
use App\Enums\TableStatus;
use Carbon\Carbon;
use App\Http\Requests\ReservationStoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $reservations =Rersavation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('admin.reservations.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {   
        $table= Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return redirect()->route('admin.reservations.index')->with('message', 'Please choose the table base on guests');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res){
            if($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')){

                return redirect()->route('admin.reservations.index')->with('message', 'This table is reserved for this day.');

            }
        }
        Rersavation::create($request->validated());
        return redirect()->route('admin.reservations.index')->with('message', 'Reservation Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rersavation $reservation)
    {   
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reservation)
    {
        $request -> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'guest_number' => 'required',
            'email' => 'required',
            'tel_number' => 'required',
            'table_id' => 'required',
            'res_date' => 'required'

        ]);
        $reservation->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email' =>$request->email,
            'tel_number'=> $request->tel_number,
            'table_id'=> $request->table_id,
            'res_date' =>$request->res_date,
            'guest_number' =>$request->guest_number,
            
        ]);
        return redirect()->route('admin.reservations.index')->with('message', 'Reservation Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rersavation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('message', 'Reservation Deleted Successfully');
    }
}
