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


        $kas = DB::select("SELECT
                            CONVERT(datetime, date) as date,
                            SUM(nominal) as saldo
                        FROM
                            transactions as a
                        WHERE
                            type = 'debit'
                        GROUP BY
                            CONVERT(datetime, date)
                        ORDER BY
                            CONVERT(datetime, date) DESC
                        LIMIT
                            0, 2");

        $kas_awal = (isset($kas[1])) ? ($kas[1]->saldo) : 0;
        $kas_akhir = (isset($kas[0])) ? ($kas[0]->saldo) : 0;
        $kas_increst = ($kas_akhir > $kas_awal) ? true : false;
        if ($kas_awal == 0 || $kas_akhir == 0) {
            $kas_percentage = 0;
            $kas_increst = false;
        } else {
            $kas_percentage = ($kas_akhir - $kas_awal) / $kas_awal * 100;
        }

        $expenses = DB::select("SELECT
                            CONVERT(datetime, date) as date,
                            SUM(nominal) as saldo
                        FROM
                            transactions as a
                        WHERE
                            type = 'credit'
                        GROUP BY
                            CONVERT(datetime, date)
                        ORDER BY
                            CONVERT(datetime, date) DESC
                        LIMIT
                            0, 2");

        $expenses_awal = (isset($expenses[1])) ? ($expenses[1]->saldo) : 0;
        $expenses_akhir = (isset($expenses[0])) ? ($expenses[0]->saldo) : 0;
        $expenses_increst = ($expenses_akhir > $expenses_awal) ? true : false;
        if ($expenses_awal == 0 || $expenses_akhir == 0) {
            $expenses_percentage = 0;
            $expenses_increst = false;
        } else {
            $expenses_percentage = ($expenses_akhir - $expenses_awal) / $expenses_awal * 100;
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
                'title' => "TODAY'S KAS",
                'number' => number_format($kas_akhir, 0, ',', '.'),
                'percentage' => (($kas_increst) ? '+' : '') . $kas_percentage . '%',
                'increst' => $kas_increst,
                'since' => "since before",
                'icon' => "fas fa-hand-holding-usd",
                'icon-bg' => "bg-gradient-success shadow-success",
            ],
            [
                'title' => "TODAY'S EXPENSES",
                'number' => number_format($expenses_akhir, 0, ',', '.'),
                'percentage' => (($expenses_increst) ? '+' : '') . $expenses_percentage . '%',
                'increst' => $expenses_increst,
                'since' => "since before",
                'icon' => "fas fa-credit-card",
                'icon-bg' => "bg-gradient-danger shadow-danger",
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
