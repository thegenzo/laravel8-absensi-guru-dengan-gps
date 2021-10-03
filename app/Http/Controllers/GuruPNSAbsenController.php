<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Koordinat;
use App\Models\GuruPNS;
use App\Models\GuruPNSAbsen;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Carbon\Carbon;


class GuruPNSAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tanggal = date("d-m-Y");

        // $date = Carbon::now();
        
        // $carbon = $date->locale('id')->format('d-m-Y');

        // $cek = $tanggal == $carbon ? 'sama' :'tidak sama';

        // return $cek;
        $guru_pns = GuruPNS::where('id_user', auth()->user()->id)->first();
        $data_absen = GuruPNSAbsen::where('id_guru_pns', '=', $guru_pns->id)->get();
        return view('pages.absen-pns.index', compact('data_absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // mendapatkan data login dari pns
        $guru_pns = GuruPNS::where('id_user', auth()->user()->id)->first();

        // data tanggal hari ini
        $timezone = 'Asia/Makassar'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        // data koordinat sekolah
        $koord = Koordinat::where('id', 1)->first();

        $jarak = $this->distance($request->lat, $request->lng, $koord->latitude, $koord->longitude, "K"); // <-- dihitung menggunakan satuan kilometer

        $pns_absen = GuruPNSAbsen::where('id_guru_pns', '=', $guru_pns->id)->where('tgl', '=', $tanggal)->first();

        if($pns_absen) {
            Alert::warning('Peringatan', 'Sudah melakukan absensi masuk');
            return redirect()->back();
        }
        else {
            if($jarak > 0.001) {
                Alert::error('Gagal', 'Jarak anda jauh dari sekolah!');
                return redirect()->back();
            }
            else {
                GuruPNSAbsen::create([
                    'id_guru_pns' => $guru_pns->id,
                    'tgl'         => $tanggal,
                    'jam_masuk'    => $localtime
                ]);
    
                Alert::success('Berhasil', 'Berhasil melakukan absen masuk');
                return redirect('/absen-guru-pns');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function absenKeluar(Request $request)
    {
        $guru_pns = GuruPNS::where('id_user', auth()->user()->id)->first();

        $timezone = 'Asia/Makassar'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        // data koordinat sekolah
        $koord = Koordinat::where('id', 1)->first();

        $jarak = $this->distance($request->lat, $request->lng, $koord->latitude, $koord->longitude, "K"); // <-- dihitung menggunakan satuan kilometer

        $pns_absen = GuruPNSAbsen::where('id_guru_pns', '=', $guru_pns->id)->where('tgl', '=', $tanggal)->first();

        if($pns_absen) {
            if($pns_absen->jam_keluar == "") {
                if ($jarak < 0.015) {
                    $pns_absen->update([
                        'jam_keluar' => $localtime,
                        'jam_kerja' => date('H:i:s', strtotime($localtime) - strtotime($pns_absen->jam_masuk))
                    ]);
    
                    Alert::success('Berhasil', 'Sampai ketemu lagi besok :)');
                    return redirect('/absen-guru-pns');
                }
                else {
                    Alert::error('Gagal', 'Jarak anda jauh dari sekolah!');
                    return redirect()->back();
                }
            }
            else {
                Alert::warning('Peringatan', 'Sudah melakukan absensi keluar');
                return redirect()->back();
            }
        } 
        else {
            Alert::error('Gagal', 'Anda belum melakukan absensi masuk!');
            return redirect()->back();
        }
        
    }

    // menghitung jarak latitude dan longitude dari sekolah ke device absen
    public function distance($lat1, $lon1, $lat2, $lon2, $unit) 
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
      
          if ($unit == "K") {
            return ($miles * 1.609344);
          } else if ($unit == "N") {
            return ($miles * 0.8684);
          } else {
            return $miles;
          }
        }
    }
}
