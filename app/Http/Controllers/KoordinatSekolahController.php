<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koordinat;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KoordinatSekolahController extends Controller
{
    public function index()
    {
        $koord = Koordinat::where('id', 1)->first();

        return view('pages.lokasi.lokasi-sekolah', compact('koord'));
    }

    public function update(Request $request) {
        $data = $request->all();
        $koord = Koordinat::where('id', 1)->first();
        $koord->update($data);

        Alert::success('Berhasil', 'Koordinat Lokasi berhasil diupdate');
        return redirect('lokasi-sekolah');
    }
}
