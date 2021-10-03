<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    use HasFactory;

    protected $table = 'kepala_sekolahs';

    protected $fillable = ['id_user', 'nip', 'no_hp', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
