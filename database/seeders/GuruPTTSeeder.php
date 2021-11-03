<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\GuruPTT;

class GuruPTTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Asrila';
        $user->level = 'guru_ptt';
        $user->email = 'asrila@gmail.com';
        $user->password = 'asrila123';
        $user->save();

        $ptt = new GuruPTT;
        $ptt->id_user = $user->id;
        $ptt->nuptk = '7573077894450009';
        $ptt->nik = '747123912032013';
        $ptt->alamat = 'Pimpi';
        $ptt->no_hp = '085756219908';
        $ptt->save();
    }
}
