<?php

namespace App\Http\Controllers;

use App\Models\SpendAmipass;
use Illuminate\Http\Request;

class SpendAmipassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spendamipasss = SpendAmipass::all();
        return view('spendamipasss.index', compact('spendamipasss'));
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
            'amounta' => 'required|numeric',
        ]);

        $amounta = $request->input('amounta');
        session(['amounta' => session('amounta', 0) + $amounta]);

        // Otras acciones o redirección después de acumular el monto

        return redirect()->back()->with('success', 'Monto acumulado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(SpendAmipass $spendAmipass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpendAmipass $spendAmipass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpendAmipass $spendAmipass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpendAmipass $spendAmipass)
    {
        //
    }

    public function arqueos()
{
    $spendAmipasses = SpendAmipass::all();

    return view('arqueos.index', compact('spendAmipasses'));
}

public function getAmountFieldName()
{
    return 'amounta';
}

}
