<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\GuruPNS;

class GuruPNSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Suharsih';
        $user->level = 'guru_pns';
        $user->email = 'suharsih01@gmail.com';
        $user->password  = 'suharsih123';
        $user->save();

        $pns = new GuruPNS();
        $pns->id_user = $user->id;
        $pns->nip = '7472099802210004';
        $pns->alamat = 'Batauga';
        $pns->no_hp = '082145671234';
        $pns->save();
    }
}
