<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::with('user')->get();

        return view('pages.admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.create');
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
            'nip'                   => 'required|numeric|unique:admins',
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
            'level' => 'admin',
            'password' => $request->password,
        ]);

        $input = $request->except(['name', 'email', 'password', 'konfirmasi_password']);

        Admin::create(array_merge($input, ['id_user' => $user->id]));

        Alert::success('Berhasil', 'Admin Berhasil Ditambahkan');

        return redirect('/admin');

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
        $admin = Admin::find($id);

        return view('pages.admin.edit', compact('admin'));
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
        $admin = Admin::find($id);

        $rules = [
            'name'                  => 'required',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'email'                 => 'required|email|',Rule::unique('users')->ignore($id),
            'nip'                   => 'required|numeric|',Rule::unique('admins')->ignore($id),
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

        
        $admin->nip = $request->nip;
        $admin->no_hp = $request->no_hp;
        $admin->alamat = $request->alamat;
        $admin->save();

        $user = User::find($admin->id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        Alert::success('Berhasil', 'Admin berhasil diubah');

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $login = Admin::where('id_user', auth()->user()->id)->first()->id;
        if($admin->id_user == $login) {
            Alert::error('Gagal', 'Tidak bisa menghapus admin yang sedang login di perangkat ini');
            return redirect()->back();
        }
        else {
            $user = User::where('id', $admin->id_user)->delete();
            $admin->delete();
    
            Alert::success('Berhasil', 'Admin berhasil dihapus');
    
            return redirect('/admin');
        }


    }
}
