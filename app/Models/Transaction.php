<?php

namespace App\Models;

use App\Helpers\MyHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'datetime',
        'type',
        'nominal',
        'note',
    ];

    public $table = 'transactions';

    function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public static function getTransactionDaily($date = null)
    {
        $date = ($date == null) ? date('Y-m-d') : $date;

        $date2 = $date;
        $date1 = date('Y-m-d', strtotime($date . ' - 7 day'));

        $chart = [];

        // jika sesuai dengan tanggal pake ini,
        // $chart['debit'] = Transaction::selectRaw('SUM(nominal) as jumlah, CONVERT(datetime, date) as tanggal')->where('type', 'debit')->whereRaw("CONVERT(datetime, date) >= '" . $date1 . "'")->whereRaw("CONVERT(datetime, date) <= '" . $date2 . "'")->get();

        // $chart['credit'] = Transaction::selectRaw('SUM(nominal) as jumlah, CONVERT(datetime, date) as tanggal')->where('type', 'credit')->whereRaw("CONVERT(datetime, date) >= '" . $date1 . "'")->whereRaw("CONVERT(datetime, date) <= '" . $date2 . "'")->get();

        $range_date  = MyHelper::getDatesFromRange($date1, $date2);

        $debit = [];
        $credit = [];
        // jika cari berdasarkan tanggal
        foreach ($range_date as $date) {
            $jumlah_debit = Transaction::selectRaw('SUM(nominal) as jumlah')->where('type', 'debit')->whereRaw("CONVERT(datetime, date) = '" . $date . "'")->first();
            $jumlah_debit = ($jumlah_debit) ? $jumlah_debit['jumlah'] : 0;
            $jumlah_debit = ($jumlah_debit == null) ? 0 : $jumlah_debit;
            $debit[] = [
                'jumlah' => $jumlah_debit,
                'tanggal' => $date,
            ];

            $jumlah_credit = Transaction::selectRaw('SUM(nominal) as jumlah')->where('type', 'credit')->whereRaw("CONVERT(datetime, date) = '" . $date . "'")->first();
            $jumlah_credit = ($jumlah_credit) ? $jumlah_credit['jumlah'] : 0;
            $jumlah_credit = ($jumlah_credit == null) ? 0 : $jumlah_credit;
            $credit[] = [
                'jumlah' => $jumlah_credit,
                'tanggal' => $date,
            ];
        }

        $chart['debit'] = $debit;
        $chart['credit'] = $credit;

        return $chart;
    }
}
