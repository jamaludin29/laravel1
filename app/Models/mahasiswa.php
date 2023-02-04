<?php

namespace App\Models;

use App\Models\prodi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mahasiswa extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nim','nama','alamat','id_prodi','foto','jenkel','ipk'

        // 'nim','nama','alamat','jurusan','contact','ipk' hilangkan nim untuk fungsi hidden saat di dd
    ];

    protected $hidden = [
        'nim'
    ];

   
        /**
         * Get the user that owns the mahasiswa
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function prodis()
        {
            return $this->belongsTo(prodi::class, 'id_prodi', 'id_prodi');
        }
   
}