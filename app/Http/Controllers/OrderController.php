<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product' => 'required',
            'supplier' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ]);

        Order::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Orden creada exitosamente.');
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'product' => 'required',
            'supplier' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ]);

        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Orden actualizada exitosamente.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Orden eliminada exitosamente.');
    }
}
