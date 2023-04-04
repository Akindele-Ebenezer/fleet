<?php

namespace App\Http\Controllers;

use App\Models\Refueling;
use Illuminate\Http\Request;

class RefuelingController extends Controller
{
    
    public function config() {
        return [
            'Refuelings' => Refueling::orderBy('Date', 'DESC')->get(),
        ];
    }

    public function index()
    {
        $Config = self::config();
        
        return view('Refueling', $Config);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Refueling $refueling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Refueling $refueling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Refueling $refueling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Refueling $refueling)
    {
        //
    }
}
