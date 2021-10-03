<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\KepalaSekolah;
use App\Models\GuruPTT;
use App\Models\GuruPTTAbsen;
use App\Models\GuruPNS;
use App\Models\GuruPNSAbsen;

class HomeController extends Controller
{
    public function index()
    {
        $timezone = 'Asia/Makassar'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');

        $admin = Admin::count();
        $kepsek = KepalaSekolah::count();
        $guru_ptt = GuruPTT::count();
        $guru_pns = GuruPNS::count();

        // menghitung guru2 yang sudah hadir hari ini
        $pns_absen = GuruPNSAbsen::where('tgl', $tanggal)->count();
        $ptt_absen = GuruPTTAbsen::where('tgl', $tanggal)->count();

        // mendapatkan list guru2 yang sudah absen hari ini
        $detail_pns = GuruPNSAbsen::where('tgl', $tanggal)->get();
        $detail_ptt = GuruPTTAbsen::where('tgl', $tanggal)->get();

        // persentase kehadiran guru pns dan ptt
        $persen_pns = ((GuruPNSAbsen::where('tgl', $tanggal)->count()) / (GuruPNS::count())) * 100;
        $persen_ptt = ((GuruPTTAbsen::where('tgl', $tanggal)->count()) / (GuruPTT::count())) * 100;

        return view('pages.home', compact('admin', 'kepsek', 'guru_ptt', 'guru_pns', 'pns_absen', 'ptt_absen', 'detail_pns', 'detail_ptt', 'tanggal', 'persen_pns', 'persen_ptt'));
    }
}
