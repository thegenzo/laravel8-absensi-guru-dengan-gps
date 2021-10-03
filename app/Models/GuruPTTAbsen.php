<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPTTAbsen extends Model
{
    use HasFactory;

    protected $table = 'guru_ptt_absens';

    protected $fillable = ['id_guru_ptt', 'tgl', 'jam_masuk', 'jam_keluar', 'jam_kerja', 'lokasi_absen'];

    public function guru_ptt()
    {
        return $this->belongsTo(GuruPTT::class, 'id_guru_ptt');
    }
}
