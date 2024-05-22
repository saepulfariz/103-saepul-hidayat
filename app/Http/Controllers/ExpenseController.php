<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionHistory;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::where('type', 'credit')->orderBy('id', 'DESC')->get();
        $menu = "List";

        return view('pages.expenses.index', compact('data', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $menu = "Create";

        return view('pages.expenses.create', compact('members', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'member_id'         => 'required',
            'nominal'         => 'required',
        ];

        $request->validate($rules);

        Transaction::create([
            'member_id'         => $request->member_id,
            'nominal'         => $request->nominal,
            'note'         => $request->note,
            'type'         => 'credit',
            'datetime'         => date('Y-m-d H:i:s'),
        ]);

        $transaction_last =  Transaction::orderBy("id", "DESC")->first();
        $TransactionHistory =  TransactionHistory::orderBy("id", "DESC")->first();
        $balance_last = ($TransactionHistory) ? $TransactionHistory['balance'] : 0;

        // insert ke history
        TransactionHistory::create([
            'transaction_id'         => $transaction_last['id'],
            'balance'         => $balance_last - $transaction_last['nominal'],
            'debit'         => 0,
            'credit'         => $transaction_last['nominal'],
            'datetime'         => date('Y-m-d H:i:s'),
            'user_id'         => session()->get('userId'),
        ]);

        return redirect()->route('expenses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('expenses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('expenses.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('expenses.index');
    }
}
