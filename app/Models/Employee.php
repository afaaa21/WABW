<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nomor_telepon',
        'email',
        'alamat',
        'tanggal_masuk',
        'tanggal_lahir',
        'status',
    ];
}
