<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    function index()
    {
        $data = TransactionHistory::orderBy('id', 'DESC')->get();
        $saldo = TransactionHistory::select('balance')->orderBy('id', 'DESC')->first();
        $saldo = ($saldo) ? $saldo['balance'] : 0;
        $menu = 'List';
        return view('pages.transaction_history.index', compact('menu', 'data', 'saldo'));
    }
}
