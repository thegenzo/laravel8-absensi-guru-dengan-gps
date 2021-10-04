<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Administrator';
        $user->level = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = 'admin123';
        $user->save();

        $admin = new Admin();
        $admin->id_user = $user->id;
        $admin->nip = '7472024675850001';
        $admin->alamat = 'baubau';
        $admin->no_hp = '082233445566';
        $admin->save();
    }
}
