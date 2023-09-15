<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $siswa_count = Siswa::count();
        $user_count = User::count();
        $kelas_count = Kelas::count();

        $start_date = Carbon::today()->firstOfMonth();
        $dupe = Carbon::today()->firstOfMonth();
        $sum_day = $start_date->daysInMonth;
        $end_date = $dupe->addDays($sum_day);

        $total = Pembayaran::select(Pembayaran::raw('SUM(jumlah_bayar) as total'))
            ->whereBetween('tanggal_bayar',[$start_date,$end_date])
            ->first();

        $history = Pembayaran::select()->orderBy('tanggal_bayar','desc')->limit(5)->get();

        return view('dashboard', compact(['siswa_count','user_count','kelas_count','total','history']));
    }
}
