<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPTT extends Model
{
    use HasFactory;

    protected $table = 'guru_p_t_t_s';

    protected $fillable = ['id_user', 'nuptk', 'nik', 'no_hp', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function guru_ptt_absen()
    {
        return $this->hasMany(GuruPTTAbsen::class, 'id_guru_ptt');
    }
}
