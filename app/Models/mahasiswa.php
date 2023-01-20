<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mahasiswa extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama','alamat','jurusan','contact','ipk'

        // 'nim','nama','alamat','jurusan','contact','ipk' hilangkan nim untuk fungsi hidden saat di dd
    ];

    protected $hidden = [
        'nim'
    ];
}