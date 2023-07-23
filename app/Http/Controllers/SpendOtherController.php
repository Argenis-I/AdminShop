<?php

namespace App\Http\Controllers;

use App\Models\SpendOther;
use Illuminate\Http\Request;

class SpendOtherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spendothers = SpendOther::all();
        return view('spendothers.index', compact('spendothers'));
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
        $request->validate([
            'amountac' => 'required|numeric',
        ]);

        $amountac = $request->input('amountac');
        session(['amountac' => session('amountac', 0) + $amountac]);

        // Otras acciones o redirección después de acumular el monto

        return redirect()->back()->with('success', 'Monto acumulado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(SpendOther $spendOther)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpendOther $spendOther)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpendOther $spendOther)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpendOther $spendOther)
    {
        //
    }

    public function arqueos()
{
    $spendOthers = SpendOther::all();

    return view('arqueos.index', compact('spendOthers'));
}

public function getAmountFieldName()
{
    return 'amountac';
}

}
