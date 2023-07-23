<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        // Obtener todos los proveedores y mostrarlos en una vista
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        // Mostrar formulario para crear un nuevo proveedor
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario y guardar el nuevo proveedor en la base de datos
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'item' => 'required',
            'associated' => 'required',
            'Comment' => 'required',
        ]);

        Supplier::create($validatedData);

        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado exitosamente.');
    }

    public function edit(Supplier $supplier)
    {
        // Mostrar formulario para editar un proveedor existente
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        // Validar los datos del formulario y actualizar el proveedor en la base de datos
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'item' => 'required',
            'associated' => 'required',
            'Comment' => 'required',
        ]);

        $supplier->update($validatedData);

        return redirect()->route('suppliers.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy(Supplier $supplier)
    {
        // Eliminar un proveedor de la base de datos
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}
