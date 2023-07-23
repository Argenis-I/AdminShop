<?php

namespace App\Http\Controllers;

use App\Models\SpendSodexo;
use Illuminate\Http\Request;

class SpendSodexoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spendsodexos = SpendSodexo::all();
        return view('spendsodexos.index', compact('spendsodexos'));
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
            'amounts' => 'required|numeric',
        ]);

        $amounts = $request->input('amounts');
        session(['amounts' => session('amounts', 0) + $amounts]);

        // Otras acciones o redirección después de acumular el monto

        return redirect()->back()->with('success', 'Monto acumulado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(SpendSodexo $spendSodexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpendSodexo $spendSodexo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpendSodexo $spendSodexo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpendSodexo $spendSodexo)
    {
        //
    }

    public function arqueos()
{
    $spendSodexos = SpendSodexo::all();

    return view('arqueos.index', compact('spendSodexos'));
}

public function getAmountFieldName()
{
    return 'amounts';
}

}
