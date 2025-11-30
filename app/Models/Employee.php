<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nomor_telepon',
        'email',
        'alamat',
        'tanggal_masuk',
        'tanggal_lahir',
        'status',
        // Tambahkan dua kolom ini agar bisa disimpan ke database
        'departemen_id',
        'jabatan_id'
    ];

    // Relasi: Employee milik satu Departement
    // Perhatikan: Saya menggunakan 'Departement' sesuai nama file di screenshot VS Code-mu
    public function department()
    {
        return $this->belongsTo(Departement::class, 'departemen_id');
    }

    // Relasi: Employee punya satu Jabatan (Position)
    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }
}