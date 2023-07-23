<?php

namespace App\Http\Controllers;

use App\Models\Spend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spends = Spend::all();
        return view('spends.index', compact('spends'));
    }

    public function create()
    {
        return view('spends.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $amount = $request->input('amount');
        session(['amount' => session('amount', 0) + $amount]);

        // Otras acciones o redirección después de acumular el monto

        return redirect()->back()->with('success', 'Monto acumulado exitosamente');
    }

    public function show(Spend $spend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spend $spend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spend $spend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spend $spend)
    {
        //
    }

    public function arqueos()
{
    $spends = Spend::all();

    return view('arqueos.index', compact('spends'));
}

public function getAmountFieldName()
{
    return 'amount';
}


}
