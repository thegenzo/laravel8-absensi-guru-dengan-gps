<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koordinat;

class KoordinatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $koord = new Koordinat;
        $koord->latitude = "-5.665431872322224";
        $koord->longitude = "122.62142281138496";
        $koord->save();
    }
}
