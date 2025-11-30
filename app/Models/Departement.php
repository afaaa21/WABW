<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    // Nama tabel di database (opsional jika nama tabel jamak bahasa Inggris standar, tapi aman ditambahkan)
    protected $table = 'departments';

    protected $fillable = [
        'nama_departemen',
    ];

    // Relasi: Satu Departemen memiliki banyak Employee
    public function employees()
    {
        return $this->hasMany(Employee::class, 'departemen_id');
    }
}