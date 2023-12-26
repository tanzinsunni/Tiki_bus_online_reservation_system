<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class SeatAllocationController extends Controller
{
    public function storeTicket(Request $request)
    {
        $request->validate([
            'quantity.*' => 'required|integer|min:0',
        ]);

        $tripId = $request->input('trip_id');
        $bookingInfo = $request->input('booking_info');
        $quantity = $request->input('quantity.' . $tripId);

        $trip = Trip::find($tripId);

        if ($trip->available_ticket < $quantity) {
            return redirect()->route('search.trip')->withErrors(['error' => 'Insufficient available tickets']);
        }
        if (!$trip) {
            return redirect()->route('search.trip')->withErrors(['error' => 'Trip not found']);
        } else if ($trip) {
            $trip->decrement('available_ticket', $quantity);
        }

        $user = User::updateOrCreate(
            [
                'name'   => $bookingInfo['name'],
                'mobile' => $bookingInfo['mobile'],
            ],

        );

        $user_id = $user->id;

        SeatAllocation::create([
            'user_id' => $user_id,
            'trip_id' => $tripId, // Use $tripId instead of $trip
            'quantity' => $quantity,
        ]);

        return redirect()->route('get.ticket');

    }

    public function getTicket()
    {

        $tickets = SeatAllocation::with('user')->with('trip.startLocation', 'trip.endLocation')->get();

        //  return $tickets;
        return view('pages.get_ticket', compact('tickets'));
    }
}
