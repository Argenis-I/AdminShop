<?php

namespace App\Http\Controllers;

use App\Models\SpendDebito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpendDebitoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spenddebitos = SpendDebito::all();
        return view('spenddebitos.index', compact('spenddebitos'));
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amountd' => 'required|numeric',
        ]);

        $amountd = $request->input('amountd');
        session(['amountd' => session('amountd', 0) + $amountd]);

        // Otras acciones o redirección después de acumular el monto

        return redirect()->back()->with('success', 'Monto acumulado exitosamente');
    }

    public function show(SpendDebito $spend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpendDebito $spend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpendDebito $spend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpendDebito $spend)
    {
        //
    }

    public function arqueos()
{
    $spendDebitos = SpendDebito::all();

    return view('arqueos.index', compact('spendDebitos'));
}

public function getAmountFieldName()
{
    return 'amountd';
}

}
