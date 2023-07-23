<?php

namespace App\Http\Controllers;

use App\Models\SpendCredito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpendCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spendcreditos = SpendCredito::all();
        return view('spendcreditos.index', compact('spendcreditos'));
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
            'amountc' => 'required|numeric',
        ]);

        $amountc = $request->input('amountc');
        session(['amountc' => session('amountc', 0) + $amountc]);

        // Otras acciones o redirección después de acumular el monto

        return redirect()->back()->with('success', 'Monto acumulado exitosamente');
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

    public function arqueos()
{
    $spendCreditos = SpendCredito::all();

    return view('arqueos.index', compact('spendCreditos'));
}

public function getAmountFieldName()
{
    return 'amountc';
}
}
