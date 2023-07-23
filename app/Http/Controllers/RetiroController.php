<?php

namespace App\Http\Controllers;

use App\Models\Spend;
use App\Models\Retiro;
use Illuminate\Http\Request;

class RetiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retiros = Retiro::all();
        return view('retiros.index', compact('retiros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('retiros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric',
        'name' => 'required',
    ]);

    $amount = $request->input('amount');

    // Descontar el monto de la variable de sesión
    session(['amount' => session('amount', 0) - $amount]);

    // Registrar el retiro en la base de datos
    $retiro = new Retiro();
    $retiro->name = $request->input('name');
    $retiro->amount = $amount;
    $retiro->save();

    return redirect()->back()->with('success', 'Monto de retiro descontado exitosamente');
}

    /**
     * Display the specified resource.
     */
    public function show(Retiro $retiro)
    {
    return view('retiros.show', compact('retiro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener el retiro por su ID y pasar los datos a la vista de edición
        $retiro = Retiro::find($id);
        return view('retiros.edit', compact('retiro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spend $spend)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $amount = $request->input('amount');
        $spend->update(['amount' => $amount]);

        // Otras acciones o redirección después de actualizar el monto del retiro

        return redirect()->route('retiros.index')->with('success', 'Monto de retiro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar y eliminar el retiro por su ID
        $retiro = Retiro::find($id);
        $retiro->delete();

        return redirect()->route('retiros.index')->with('success', 'Retiro eliminado exitosamente');
    }
}
