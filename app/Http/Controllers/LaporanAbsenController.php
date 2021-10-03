<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruPNSAbsen;
use App\Models\GuruPTTAbsen;

class LaporanAbsenController extends Controller
{
    public function laporanPNS()
    {
        return view('pages.laporan.laporan-pns');
    }

    public function filterPNS($tglawal, $tglakhir)
    {
        $absen_pns = GuruPNSAbsen::whereBetween('tgl', [$tglawal, $tglakhir])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.filter-pns', compact('absen_pns'));
    }

    public function laporanPTT()
    {
        return view('pages.laporan.laporan-ptt');
    }

    public function filterPTT($tglawal, $tglakhir)
    {
        $absen_ptt = GuruPTTAbsen::whereBetween('tgl', [$tglawal, $tglakhir])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.filter-ptt', compact('absen_ptt'));
    }
}
