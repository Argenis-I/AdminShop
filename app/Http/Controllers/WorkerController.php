<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();
        return view('workers.index', compact('workers'));
    }

    public function create()
    {
        return view('workers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'rut' => 'required',
            'phone' => 'required',
            'job' => 'required',
            'local' => 'required',
        ]);

        Worker::create($validatedData);

        return redirect()->route('workers.index')->with('success', 'Trabajador creado exitosamente.');
    }

    public function edit(Worker $worker)
    {
        return view('workers.edit', compact('worker'));
    }

    public function update(Request $request, Worker $worker)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'rut' => 'required',
            'phone' => 'required',
            'job' => 'required',
            'local' => 'required',
        ]);

        $worker->update($validatedData);

        return redirect()->route('workers.index')->with('success', 'Trabajador actualizado exitosamente.');
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index')->with('success', 'Trabajador eliminado exitosamente.');
    }
}
