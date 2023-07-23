<?php

namespace App\Http\Controllers;

use App\Models\Arqueo;
use App\Models\Spend;
use App\Models\SpendDebito;
use App\Models\SpendCredito;
use App\Models\SpendAmipass;
use App\Models\SpendSodexo;
use App\Models\SpendOther;
use Illuminate\Http\Request;

class ArqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spend = Spend::first();
        $spendDebito = SpendDebito::first();
        $spendCredito = SpendCredito::first();
        $spendAmipass = SpendAmipass::first();
        $spendSodexo = SpendSodexo::first();
        $spendOther = SpendOther::first();

        $spendAmount = $spend ? $spend->amount : null;
        $spendDebitoAmount = $spendDebito ? $spendDebito->amountd : null;
        $spendCreditoAmount = $spendCredito ? $spendCredito->amountc : null;
        $spendAmipassAmount = $spendAmipass ? $spendAmipass->amounta : null;
        $spendSodexoAmount = $spendSodexo ? $spendSodexo->amounts : null;
        $spendOtherAmount = $spendOther ? $spendOther->amountac : null;

        $totalAmount = session('amount', 0) + session('amountd', 0) + session('amountc', 0) + session('amounta', 0) + session('amounts', 0) + session('amountac', 0);

        return view('arqueos.index', compact('spendAmount', 'spendDebitoAmount', 'spendCreditoAmount', 'spendAmipassAmount', 'spendSodexoAmount', 'spendOtherAmount', 'totalAmount'));
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
        //
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
}
