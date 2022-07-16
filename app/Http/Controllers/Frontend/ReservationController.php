<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Rersavation;
use Carbon\Carbon;
use App\Enums\TableStatus;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(Request $request){

        $reservation = $request->session()->get('rersavation');
        $min_date= Carbon::today();
        $max_date= Carbon::now()->addWeek();
        return view('reservations.step-one', compact('reservation','min_date','max_date'));
    }

    public function StorestepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'tel_number' => ['required'],
            'guest_number' => ['required'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween]

        ]);
        if (empty($request->session()->get('resarvation'))) {
            $reservation = New Rersavation();
            $reservation->fill($validated);
            $request->session()->put('resarvation',$reservation);
        }
        else{
            $reservation= $request->session()->get('resarvation');
            $reservation->fill($validated);
            $request->session()->put('resarvation',$reservation);

        }
        return redirect()->route('reservations.step.two');
    }
}
