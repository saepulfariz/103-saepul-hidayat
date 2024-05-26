<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHistory;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index()
    {
        // $saldo_awal = TransactionHistory::select('CONVERT(datetime, date) as date')->select(DB::raw(' (
        //     SELECT
        //         balance
        //     FROM
        //         transaction_history as b
        //     WHERE
        //         CONVERT(b.datetime, date) = CONVERT(transaction_history.datetime, date)
        //     ORDER BY
        //         b.id DESC
        //     LIMIT
        //         1
        // ) as saldo'))->groupBy('CONVERT(datetime, date)')->orderBy('CONVERT(datetime, date)', 'DESC')->limit(2)->get();
        $saldo = DB::select("SELECT
                        CONVERT(a.datetime, date) as date,
                        (
                            SELECT
                                b.balance
                            FROM
                                transaction_history as b
                            WHERE
                                CONVERT(b.datetime, date) = CONVERT(a.datetime, date)
                            ORDER BY
                                b.id DESC
                            LIMIT
                                1
                        ) as saldo
                    FROM
                        transaction_history as a
                    GROUP BY
                        CONVERT(a.datetime, date)
                    ORDER BY
                        CONVERT(a.datetime, date) DESC
                    LIMIT
                        0, 2");
        $saldo_awal = (isset($saldo[1])) ? ($saldo[1]->saldo) : 0;
        $saldo_akhir = (isset($saldo[0])) ? ($saldo[0]->saldo) : 0;
        $saldo_increst = ($saldo_akhir > $saldo_awal) ? true : false;
        if ($saldo_awal == 0 || $saldo_akhir == 0) {
            $saldo_percentage = 0;
            $saldo_increst = false;
        } else {
            $saldo_percentage = ($saldo_akhir - $saldo_awal) / $saldo_awal * 100;
        }
        $resume = [
            [
                'title' => "TODAY'S MONEY",
                'number' => number_format($saldo_akhir, 0, ',', '.'),
                'percentage' => (($saldo_increst) ? '+' : '') . $saldo_percentage . '%',
                'increst' => $saldo_increst,
                'since' => "since before",
                'icon' => "ni ni-money-coins",
                'icon-bg' => "bg-gradient-primary shadow-primary",
            ],
            [
                'title' => "TODAY'S USERS",
                'number' => "2,300",
                'percentage' => "+3%",
                'increst' => true,
                'since' => "since last week",
                'icon' => "ni ni-world",
                'icon-bg' => "bg-gradient-danger shadow-danger",
            ],
            [
                'title' => "NEW CLIENTS",
                'number' => "+3,462",
                'percentage' => "-2%",
                'increst' => false,
                'since' => "since last quarter",
                'icon' => "ni ni-paper-diploma",
                'icon-bg' => "bg-gradient-success shadow-success",
            ],
            [
                'title' => "SALES",
                'number' => "$103,430",
                'percentage' => "+5%",
                'increst' => true,
                'since' => "than last month",
                'icon' => "ni ni-cart",
                'icon-bg' => "bg-gradient-warning shadow-warnin",
            ],
        ];
        return view('pages.dashboard.index', [
            'resume' => $resume
        ]);
    }
}
