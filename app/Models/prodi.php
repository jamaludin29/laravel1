<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class prodi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_prodi','nama_prodi'

        // 'nim','nama','alamat','jurusan','contact','ipk' hilangkan nim untuk fungsi hidden saat di dd
    ];
}
