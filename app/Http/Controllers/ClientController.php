<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Obtener todos los clientes y mostrarlos en una vista
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        // Mostrar formulario para crear un nuevo cliente
        return view('clients.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario y guardar el nuevo cliente en la base de datos
        $validatedData = $request->validate([
            'name' => 'required',
            'rut' => 'required',
            'comment' => 'nullable',
        ]);

        Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function edit(Client $client)
    {
        // Mostrar formulario para editar un cliente existente
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        // Validar los datos del formulario y actualizar el cliente en la base de datos
        $validatedData = $request->validate([
            'name' => 'required',
            'rut' => 'required',
            'comment' => 'nullable',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Client $client)
    {
        // Eliminar un cliente de la base de datos
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
