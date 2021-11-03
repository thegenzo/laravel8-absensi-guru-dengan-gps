<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruPTT;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;
use Illuminate\Validation\Rule;

class GuruPTTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru_ptt = GuruPTT::with('user')->get();

        return view('pages.guru-ptt.index', compact('guru_ptt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.guru-ptt.create');
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
            'name'                    => 'required',
            'password'                => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'     => 'required|min:8',
            'email'                   => 'required|email|unique:users',
            'nuptk'                   => 'required|numeric|unique:guru_p_t_t_s',
            'nik'                     => 'required|numeric|unique:guru_p_t_t_s',
            'no_hp'                   => 'required|numeric',
            'alamat'                  => 'required'
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
            'nuptk.required'                => 'NUPTK wajib diisi',
            'nuptk.unique'                  => 'NUPTK sudah terdaftar',
            'nik.required'                  => 'NIK wajib diisi',
            'nik.unique'                    => 'NIK sudah terdaftar',
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
            'level' => 'guru_ptt',
            'password' => $request->password,
        ]);

        $input = $request->except(['name', 'email', 'password', 'konfirmasi_password']);

        GuruPTT::create(array_merge($input, ['id_user' => $user->id]));

        Alert::success('Berhasil', 'Guru PTT Berhasil Ditambahkan');

        return redirect('/guru-ptt');

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
        $guru_ptt = GuruPTT::find($id);

        return view('pages.guru-ptt.edit', compact('guru_ptt'));
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
        $rules = [
            'name'                  => 'required',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'email'                 => 'required|email|',Rule::unique('users')->ignore($id),
            'nip'                   => 'required|numeric|',Rule::unique('guru_p_t_t_s')->ignore($id),
            'nuptk'                 => 'required|numeric|',Rule::unique('guru_p_t_t_s')->ignore($id),
            'nik'                   => 'required|numeric|',Rule::unique('guru_p_t_t_s')->ignore($id),
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
            'nuptk.required'                => 'NUPTK wajib diisi',
            'nuptk.unique'                  => 'NUPTK sudah terdaftar',
            'nik.required'                  => 'NIK wajib diisi',
            'nik.unique'                    => 'NIK sudah terdaftar',
            'no_hp.required'                => 'Nomor handphone wajib diisi',
            'no_hp.numeric'                 => 'Nomor handphone harus berupa angka',
            'alamat.required'               => 'Alamat wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $guru_ptt = GuruPTT::find($id);
        $guru_ptt->nuptk = $request->nuptk;
        $guru_ptt->nik = $request->nik;
        $guru_ptt->no_hp = $request->no_hp;
        $guru_ptt->alamat = $request->alamat;
        $guru_ptt->save();

        $user = User::find($guru_ptt->id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        Alert::success('Berhasil', 'Guru PTT berhasil diubah');

        return redirect('/guru-ptt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru_ptt = GuruPTT::find($id);
        if($guru_ptt->guru_ptt_absen()->count()) {
            Alert::error('Gagal', 'Guru PTT ini sudah memiliki riwayat absen');
            return redirect()->back();
        }
        else {
            $user = User::where('id', $guru_ptt->id_user)->delete();
            $guru_ptt->delete();
    
            Alert::success('Berhasil', 'Guru PTT berhasil dihapus');
    
            return redirect('/guru-ptt');
        }
    }
}
