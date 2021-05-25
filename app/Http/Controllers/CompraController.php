<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function donacion(Request $request)
    {
        $stripeCharge = Auth::user()->charge($request->quantity, $request->paymentMethodId);

        return back();
    }

    public function formdonacion()
    {
        return view('pagos');
    }
}
