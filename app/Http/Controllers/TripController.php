<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\SeatAllocation;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class TripController extends Controller
{

    public function index()
    {

        $totalTrips = Trip::count();
        $totalUsers = User::count();
        $totalTickets = SeatAllocation::count();
        $locations = Location::count();

        return view('pages.index', compact('totalTrips', 'totalUsers', 'totalTickets', 'locations'));
    }

    public function addTrip()
    {
        $locations = Location::get();
        return view('pages.add_trip', compact('locations'));
    }

    public function storeTrip(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|min:4',
            'start_location_id' => 'required|string',
            'end_location_id'   => 'required|string',
            'date'              => 'required|date',
        ]);

        if ($request->start_location_id != $request->end_location_id) {

            Trip::insert([
                "name"              => $request->name,
                "start_location_id" => $request->start_location_id,
                "end_location_id"   => $request->end_location_id,
                "date"              => $request->date,
            ]);
        } else {

            return redirect()->route('add.trip')->with('error', 'Start and End Location can\'t be same');}

        return redirect()->route('add.trip')->with('success', 'Trip created successfully.');
    }

    public function bookTrip()
    {
        $locations = Location::get();
        return view('pages.book_trip', compact('locations'));
    }

    public function searchTrip(Request $request)
    {
        $request->validate([
            'name'              => 'string |required',
            'mobile'            => 'required|regex:/^(?:\+?88)?\d{11}$/',
            'start_location_id' => 'string',
            'end_location_id'   => 'string',
            'date'              => 'required|date',
        ]);
        if ($request->start_location_id == $request->end_location_id) {
            return redirect()->route('book.trip')->with('error', 'Start and End Location can\'t be same');}

        $trips = Trip::where('start_location_id', $request->start_location_id)->where('end_location_id', $request->end_location_id)
            ->where('date', $request->date)
            ->get();

        $startLocation = Location::where('id', $request->start_location_id)->select('name')->first();
        $endLocation = Location::where('id', $request->end_location_id)->select('name')->first();
        // $date = Trip::where('date', $request->date)
        //     ->first();

        $booking_info = [
            'name'           => $request->name,
            'mobile'         => $request->mobile,
            'start_location' => $startLocation->name,
            'end_location'   => $endLocation->name,
            'date'           => $request->date,
        ];

        return view('pages.searched_trip', compact('trips', 'booking_info'));
    }

}
