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
        $data1 = $tglawal;
        $data2 = $tglakhir;
        $absen_pns = GuruPNSAbsen::whereBetween('tgl', [$tglawal, $tglakhir])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.filter-pns', compact('absen_pns', 'data1', 'data2'));
    }

    public function laporanPTT()
    {
        return view('pages.laporan.laporan-ptt');
    }

    public function filterPTT($tglawal, $tglakhir)
    {
        $data1 = $tglawal;
        $data2 = $tglakhir;
        $absen_ptt = GuruPTTAbsen::whereBetween('tgl', [$tglawal, $tglakhir])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.filter-ptt', compact('absen_ptt', 'data1', 'data2'));
    }

    public function cetakPNS($data1, $data2)
    {
        $tglawal = $data1;
        $tglakhir = $data2;

        $absen_pns = GuruPNSAbsen::whereBetween('tgl', [$data1, $data2])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.cetak-pns', compact('absen_pns', 'tglawal', 'tglakhir'));
    }

    public function cetakPTT($data1, $data2)
    {
        $tglawal = $data1;
        $tglakhir = $data2;

        $absen_ptt = GuruPTTAbsen::whereBetween('tgl', [$data1, $data2])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.cetak-ptt', compact('absen_ptt', 'tglawal', 'tglakhir'));
    }
}
