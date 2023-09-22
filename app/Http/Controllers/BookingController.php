<?php

namespace App\Http\Controllers;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\bookingtoreRequest;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();
        return view('admin.booking.index', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking/create', ['tables' => $tables]); // liste des tables dispo

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bookingtoreRequest $request)
    {

        $tables = Table::where('reservee', 0)->get();
        
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->booking as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'Cette table est réservée pour cette date
                .');
            }
        }
        Booking::create($request->validated());

        return to_route('admin.booking.index')->with('success', 'Réservation créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view("booking.show"); // resources\views\booking\show.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $Booking)
    {
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        return view('admin.booking.edit', compact('Booking', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(bookingtoreRequest $request, Booking $Booking)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        $booking = $table->booking()->where('id', '!=', $Booking->id)->get();
        foreach ($booking as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'Attention cette table est déjà réservé.');
            }
        }

        $Booking->update($request->validated());
        return to_route('admin.booking.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $Booking)
    {
        $Booking->delete();

        return to_route('admin.booking.index')->with('warning', 'Booking deleted successfully.');
    }
}
