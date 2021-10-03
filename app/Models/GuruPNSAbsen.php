<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPNSAbsen extends Model
{
    use HasFactory;

    protected $table = 'guru_pns_absens';

    protected $fillable = ['id_guru_pns', 'tgl', 'jam_masuk', 'jam_keluar', 'jam_kerja','lokasi_absen'];

    public function guru_pns()
    {
        return $this->belongsTo(GuruPNS::class, 'id_guru_pns');
    }
}
