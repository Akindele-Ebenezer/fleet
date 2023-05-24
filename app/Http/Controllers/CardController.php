<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\MasterCard;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function credit_card_index()
    {
        $Cars = Car::orderBy('PurchaseDate', 'DESC')->paginate(7);
        return view('CreditCard', [
            'Cars' => $Cars,
        ]);
    }

    public function master_card_index()
    {
        $MasterCards = MasterCard::orderBy('Date', 'DESC')->paginate(7);
        return view('MasterCard', [
            'MasterCards' => $MasterCards,
        ]);
    }

    public function master_card_deposits()
    {
        $Deposits_MasterCards = MasterCard::orderBy('Date', 'DESC')->paginate(7);
        return view('Deposits_MasterCard', [
            'Deposits_MasterCards' => $Deposits_MasterCards,
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
