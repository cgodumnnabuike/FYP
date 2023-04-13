<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Validation\Rule;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        return view('meters/index');
        // ->with('meters', $meters);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('meters/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //This will check if the user is authenticated
        $user = auth::user();

        $request->validate([
            'Location' => 'required',
        ]);
          
        Meter::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        // $user->meter()->save($meter);

        // return redirect()->route('meters.index')
        // ->with('success', 'Task created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Meter $meter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meter $meter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meter $meter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meter $meter)
    {
        //
    }
}
