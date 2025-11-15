<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
class InFlowController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([
                'amount' => 'required|numeric',
                'payment_method' => 'required|in:bank_transfer,credit_card,mobile_money',
                'datetime' => 'required|date',
            ]);
    
            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'datetime' => $request->datetime,
                'type' => 'inflow',
            ]);
            if($transaction){
                return response()->json(['message' => 'Transaction created successfully'], 201);
            } else {
                return response()->json(['message' => 'Transaction creation failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Validation failed', 'errors' => $e->getMessage()], 422);
        }
    }
}
