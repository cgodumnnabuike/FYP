<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Http\Controllers\MeterController;
use Illuminate\Http\Request;
use App\Models\Meter;
use Illuminate\Pagination\Paginator;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $user = auth()->user();
        $meters = $user->meters()->with('measurements')->get();
        $meterId = $request->input('meter_id');
        $selectedMeter = $meters->firstWhere('id', $meterId);

        if (!$selectedMeter) {
            abort(404); // Meter not found
        }

        $measurements = Measurement::where('meter_id', $selectedMeter->id)->paginate(5);
        return view('measurements.index', compact('measurements','meters', 'selectedMeter'));   
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
       
            $userId = auth()->id();
        $meter = Meter::where('user_id', $userId)->first();

        if ($meter) {
            Measurement::create([
                'meter_id' => $meter->id,
                'measurement_period' => $request->measurement_period,
                'timestamp' => $request->timestamp,
                'consumption_value' => $request->consumption_value,
                'location' => $request->location
            ]);
            return redirect()->route('measurements.index', ['meter_id' => $meter->id])
    ->with('success', 'Measurement created successfully');


        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Measurement $measurement)
    {
        $meter = $measurement->meter;
        return view('measurements.show', compact('measurement', 'meter'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Measurement $measurement)
    {
        $meter = $measurement->meter;
        return view('measurements.edit', compact('measurement', 'meter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Measurement $measurement)
    {
        $request->validate([
            'measurement_period' => 'required',
            'timestamp' => 'required',
            'consumption_value' => 'required',
            'location' => 'required',
        ]);
    
        $measurement->update($request->all());
    
        return redirect()->route('measurements.index', ['meter_id' => $measurement->meter_id])
        ->with('success', 'Measurement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Measurement $measurement)
    {
        $meterId = $measurement->meter_id;
        $measurement->delete();
        return redirect()->route('measurements.index', ['meter_id' => $meterId])
        ->with('success', 'Measurement deleted successfully');
    }
    
}
