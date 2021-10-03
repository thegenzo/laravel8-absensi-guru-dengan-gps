<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinat extends Model
{
    use HasFactory;

    protected $table = 'koordinats';

    protected $fillable = ['latitude', 'longitude'];
}
