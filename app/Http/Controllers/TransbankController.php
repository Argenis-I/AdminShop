<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

class TransbankController extends Controller
{

    public function index(Request $request)
{
    $price = $request->input('price');
    $quantity = $request->input('quantity');

    // Lógica adicional según tus necesidades

    return view('transbank.index', compact('price', 'quantity'));
}

    public function __construct()
    {
        if ( app()->environment('production') ){
            WebpayPlus::configureForProduction(
                env('webpay_plus_cc'),
                env('webpay_plus_api_key')
            );
        } else {
            WebpayPlus::configureForTesting();
            }
    }

    public function iniciar_compra(Request $request)
    {
        $nueva_compra = new Compra();
        $nueva_compra->session_id = "12345";
        $nueva_compra->total = 12345;
        $nueva_compra->save();
        $url_to_pay = $this->start_web_pay_plus_transaction($nueva_compra);
        return $url_to_pay;
    }

    public function start_web_pay_plus_transaction( $nueva_compra )
    {
        $transaccion = (new Transaction)->create(
            $nueva_compra->id,
            $nueva_compra->session_id,
            $nueva_compra->total,
            route('confirmar_pago')
        );
        $url = $transaccion->getUrl().'?token_ws='.$transaccion->getToken();
        return $url;
    }

    public function confirmar_pago(Request $request)
    {
        $token_ws = $request->input('token_ws');

        $transaction = (new Transaction)->commit($token_ws);

        $buyOrder = $transaction->buyOrder;

        $compra = Compra::find($buyOrder);

        if ($transaction->isApproved()) {
            $compra->status = 2;
            $compra->save();

            return redirect(env('URL_FRONTEND_AFTER_PAYMENT') . "?compra_id=$compra->id");
        } else {
            return redirect(env('URL_FRONTEND_AFTER_PAYMENT') . "?compra_id=$compra->id");
        }
    }
}
