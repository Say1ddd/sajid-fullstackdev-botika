<?php

namespace App\Models;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';

    protected $fillable = [
        'nama_pekerjaan',
        'deskripsi_pekerjaan',
    ];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
