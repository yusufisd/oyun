<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class InFlowController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|in:bank_transfer,credit_card,mobile_money',
            'datetime' => 'required|date',
            'type' => 'required|in:inflow,outflow',
        ]);

        $transaction = Transaction::create([
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'datetime' => $request->datetime,
            'type' => $request->type,
        ]);

      

        return redirect()->route('transactions.index');
    }
}
