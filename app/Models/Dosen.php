<?php
// File: app/Models/Dosen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $primaryKey = 'nidn';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nidn',
        'nama',
        'status',
        'kategori',
        'jenis_kepegawaian',
        'status_tugas',
        'email',
        'kelamin',
        'jabatan',
        'jenis_jabatan',
        'prodi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nidn', 'nim');
    }
}
