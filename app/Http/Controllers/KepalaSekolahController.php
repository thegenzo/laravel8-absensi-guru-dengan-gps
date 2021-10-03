<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KepalaSekolah;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;
use Illuminate\Validation\Rule;

class KepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepsek = KepalaSekolah::with('user')->get();

        return view('pages.kepsek.index', compact('kepsek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kepsek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'                  => 'required',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'email'                 => 'required|email|unique:users',
            'nip'                   => 'required|numeric|unique:kepala_sekolahs',
            'no_hp'                 => 'required|numeric',
            'alamat'                => 'required'
        ];


        $messages = [
            'name.required'                 => 'Nama wajib diisi',
            'password.required'             => 'Password wajib diisi',
            'password.min'                  => 'Password minimal 8 karakter',
            'password.same'                 => 'Konfirmasi password harus sama dengan password',
            'konfirmasi_password.required'  => 'Konfirmasi password wajib diisi',
            'konfirmasi_password.min'       => 'Konfirmasi password minimal 8 karakter',
            'email.required'                => 'Email wajib diisi',
            'email.email'                   => 'Email tidak valid',
            'email.unique'                  => 'Email sudah terdaftar',
            'nip.required'                  => 'NIP wajib diisi',
            'nip.unique'                    => 'NIP sudah terdaftar',
            'no_hp.required'                => 'Nomor handphone wajib diisi',
            'no_hp.numeric'                 => 'Nomor handphone harus berupa angka',
            'alamat.required'               => 'Alamat wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'kepsek',
            'password' => $request->password,
        ]);

        $input = $request->except(['name', 'email', 'password', 'konfirmasi_password']);

        KepalaSekolah::create(array_merge($input, ['id_user' => $user->id]));

        Alert::success('Berhasil', 'Kepala Berhasil Ditambahkan');

        return redirect('/kepala-sekolah');

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
        $kepsek = KepalaSekolah::find($id);

        return view('pages.kepsek.edit', compact('kepsek'));
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
        $kepsek = KepalaSekolah::find($id);

        $rules = [
            'name'                  => 'required',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'email'                 => 'required|email|',Rule::unique('users')->ignore($id),
            'nip'                   => 'required|numeric|',Rule::unique('kepala_sekolahs')->ignore($id),
            'no_hp'                 => 'required|numeric',
            'alamat'                => 'required'
        ];


        $messages = [
            'name.required'                 => 'Nama wajib diisi',
            'password.required'             => 'Password wajib diisi',
            'password.min'                  => 'Password minimal 8 karakter',
            'password.same'                 => 'Konfirmasi password harus sama dengan password',
            'konfirmasi_password.required'  => 'Konfirmasi password wajib diisi',
            'konfirmasi_password.min'       => 'Konfirmasi password minimal 8 karakter',
            'email.required'                => 'Email wajib diisi',
            'email.email'                   => 'Email tidak valid',
            'email.unique'                  => 'Email sudah terdaftar',
            'nip.required'                  => 'NIP wajib diisi',
            'nip.numeric'                   => 'NIP harus berupa angka',
            'nip.unique'                    => 'NIP sudah terdaftar',
            'no_hp.required'                => 'Nomor handphone wajib diisi',
            'no_hp.numeric'                 => 'Nomor handphone harus berupa angka',
            'alamat.required'               => 'Alamat wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        
        $kepsek->nip = $request->nip;
        $kepsek->no_hp = $request->no_hp;
        $kepsek->alamat = $request->alamat;
        $kepsek->save();

        $user = User::find($kepsek->id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        Alert::success('Berhasil', 'Kepala Sekolah berhasil diubah');

        return redirect('/kepala-sekolah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kepsek = KepalaSekolah::find($id);
        $user = User::where('id', $kepsek->id_user)->delete();
        $kepsek->delete();

        Alert::success('Berhasil', 'Kepala Sekolah berhasil dihapus');

        return redirect('/kepala-sekolah');

    }
}
