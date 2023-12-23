<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();
// return $transactions;
        return view('transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function export($id)
    {
        $transaction = Transaction::byId($id);
        return view('transactions.export', compact('transaction'));
    }
    
    public function duplicate($uuid)
    {
        $transaction = Transaction::byUUID($uuid);
        return view('transactions.duplicate', compact('transaction'));
    }
}
