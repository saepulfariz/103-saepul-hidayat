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

        return redirect()->route('kas.show', $id)->with('success', 'Add Success');
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
        $kas = Transaction::where('type', 'debit')->orderBy('id', 'ASC')->first();
        $range_date = [];
        if ($kas) {
            $range_date  = MyHelper::getDatesFromRange(date('Y-m-d', strtotime($kas['datetime'])), date('Y-m-d'));
        }
        $report = [];
        $a = 0;
        foreach ($members as $member) {
            $kas_members = [];
            foreach ($range_date as $date) {
                $kas_member =  Transaction::where('type', 'debit')->whereRaw("CONVERT(datetime, date) = '" . $date . "'")->where('member_id', $member['id'])->orderBy('id', 'DESC')->first();
                $kas_member = ($kas_member) ? $kas_member['nominal'] : 0;
                $kas_members[] = [
                    'date' => $date,
                    'nominal' => $kas_member,
                ];
            }
            $report[] = [
                'name' => $member->user->name,
                'kas' => $kas_members
            ];
        }

        $data = [
            'data' => $report,
            'menu' => 'Report',
            'range_date' => $range_date,
        ];
        return view('pages.kas.report', $data);
    }
}
