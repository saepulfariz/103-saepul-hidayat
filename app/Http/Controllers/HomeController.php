<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Meeting;
use App\Helpers\MyHelper;
use App\Models\Attendance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home.index');
    }

    public function kas()
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
            'range_date' => $range_date,
        ];
        return view('pages.home.kas', $data);
    }

    public function attendances()
    {
        $members = Member::all();
        $meetings = Meeting::all();
        $presensis = (new Attendance)->presensis;
        $report = [];
        $a = 0;
        foreach ($members as $member) {
            $attendances = [];
            foreach ($meetings as $meet) {
                $attendance =  Attendance::where('meet_id', $meet['id'])->where('member_id', $member['id'])->first();
                $attendances[] = [
                    'title' => $meet->title,
                    'tgl' => $meet->date,
                    'presensi' => ($attendance) ? $attendance->presensi : '-',
                ];
            }
            $summary_presensi = [];
            foreach ($presensis as $presensi) {
                $jumlah_presensi = Attendance::selectRaw('COUNT(id) as jumlah')->where('presensi', "$presensi")->where('member_id', $member['id'])->first();
                $jumlah_presensi = ($jumlah_presensi) ? $jumlah_presensi['jumlah'] : 0;
                $summary_presensi[] = [
                    "presensi" => $presensi,
                    "jumlah" => $jumlah_presensi,
                ];
            }
            $report[] = [
                'name' => $member->user->name,
                'attendances' => $attendances,
                'summary_presensi' => $summary_presensi,
            ];
        }
        $data = [
            'data' => $report,
            'menu' => 'Report',
            'meetings' => $meetings,
            'presensis' => $presensis
        ];
        return view('pages.home.attendances', $data);
    }
}
