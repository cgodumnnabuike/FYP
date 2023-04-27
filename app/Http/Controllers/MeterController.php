<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Meter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use App\Models\Measurement;


class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $meters = $user->meters;
        return view('meters.index')
        ->with('meters', $meters);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('meters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //This will check if the user is authenticated
        $user = auth::user();

        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);
          
        Meter::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'location' => $request->location
        ]);

        return redirect()->route('meters.index')
        ->with('success', 'meter created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Meter $meter)
    {
        $measurements = Measurement::where('meter_id', $meter->id)->get();
    $chartData = [];
    foreach ($measurements as $measurement) {
        $chartData[] = [
            'x' => $measurement->timestamp->format('Y-m-d H:i:s'),
            'y' => $measurement->consumption_value
        ];
    }

    $chart = LarapexChart::lineChart()
                ->setTitle('Meter Measurements')
                // ->setXAxisType('datetime')
                // ->setXAxisFormat('yyyy-MM-dd HH:mm:ss')
                ->addData('Consumption', $chartData)
                ->setMarkers(['size' => 5])
                ->setWidth(1000)
                ->setHeight(500);

    return view('meters.show', compact('meter', 'chart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meter $meter)
    {
        return view('meters.edit')
        ->with([
                'meter' => $meter
        ]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meter $meter)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required'
            ]);

        $meter->update($request->all());
        return redirect('meters')
        ->with('success', 'Meter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meter $meter)
    {
        $meter->delete();
        
        return redirect()->route('meters.index')->with('success', 'Meter deleted successfully');
    }
}
