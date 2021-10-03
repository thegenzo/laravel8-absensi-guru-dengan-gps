<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPNS extends Model
{
    use HasFactory;

    protected $table = 'guru_p_n_s';

    protected $fillable = ['id_user', 'nip', 'no_hp', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function guru_pns_absen()
    {
        return $this->hasMany(GuruPNSAbsen::class, 'id_guru_pns');
    }
}
