<?php

namespace App\Http\Controllers;

use App\Models\Spend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnvaseController extends Controller
{
    public function index()
    {
        $envases = Spend::all();
        return view('envases.index', compact('envases'));
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
            'amount' => 'required|numeric',
        ]);

        $amount = $request->input('amount');
        session(['amount' => session('amount', 0) - $amount]);

        // Otras acciones o redirección después de descontar el monto de los envases

        return redirect()->back()->with('success', 'Monto de envases descontado exitosamente');
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
}
