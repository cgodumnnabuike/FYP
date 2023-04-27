<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Meter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $meters = $user->meters;
       // dd($meters);
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
        return view ('meters.show') 
        ->with([
            'meter' => $meter
        ]);
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
