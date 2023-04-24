<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\Meter;
use App\Http\Controllers\MeterController;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = auth()->user();
        // $measurement = $meter->measurement;
        // return view('measurements.index')
        // ->with('measurements', $measurements);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('measurements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'measurement_period' => 'required',
            'timestamp' => 'required',
            'consumption_value' => 'required',
            'location' => 'required',
        ]);

        Measurement::create([
            // 'meter_id' => meter()->id,
            'measurement_period' => $request->name,
            'timestamp' => $request->timestamp,
            'consumption_value' => $request->consumption_value,
            'location' => $request->location
        ]);
        
        
        return redirect()->route('meters.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Measurement $measurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Measurement $measurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Measurement $measurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Measurement $measurement)
    {
        //
    }
}
