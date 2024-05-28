<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Helpers\MyHelper;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionHistory;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Member::all();
        $menu = "Members";

        return view('pages.kas.index', compact('data', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $member = Member::findOrFail($id);

        $menu = "Create";

        return view('pages.kas.create', compact('member', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $rules = [
            'member_id'         => 'required',
            'nominal'         => 'required',
        ];

        $request->validate($rules);

        Transaction::create([
            'member_id'         => $id,
            'nominal'         => $request->nominal,
            'note'         => $request->note,
            'type'         => 'debit',
            'datetime'         => date('Y-m-d H:i:s'),
        ]);

        $transaction_last =  Transaction::orderBy("id", "DESC")->first();
        $TransactionHistory =  TransactionHistory::orderBy("id", "DESC")->first();
        $balance_last = ($TransactionHistory) ? $TransactionHistory['balance'] : 0;

        // insert ke history
        TransactionHistory::create([
            'transaction_id'         => $transaction_last['id'],
            'balance'         => $balance_last + $transaction_last['nominal'],
            'debit'         => $transaction_last['nominal'],
            'credit'         => 0,
            'datetime'         => date('Y-m-d H:i:s'),
            'user_id'         => session()->get('userId'),
        ]);

        return redirect()->route('kas.show', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::findOrFail($id);
        $data = Transaction::where('type', 'debit')->where('member_id', $id)->orderBy('id', 'DESC')->get();
        $menu = "List";

        return view('pages.kas.show', compact('data', 'member', 'menu'));
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

    public function report()
    {
        $members = Member::all();
        $kas = Transaction::where('type', 'debit')->orderBy('id', 'DESC')->first();
        $report = [];
        $a = 0;
        foreach ($members as $member) {
            $report[] = [
                'name' => $member->user->name,
                'kas' => MyHelper::myFunction('TEST')
            ];
        }

        dd($report);
    }
}
