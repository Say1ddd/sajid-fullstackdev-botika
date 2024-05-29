<?php

namespace App\Models;

use App\Models\Divisi;
use App\Models\Pekerjaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
        'jenis_kelamin',
        'aktif',
        'divisi_id',
        'pekerjaan_id',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }
}
