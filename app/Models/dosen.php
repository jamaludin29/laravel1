<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dosen extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nip','nama','alamat','id_dept','contact'
    ];

    // baca prodi
    public function prodis()
    {
        return $this->belongsTo(prodi::class, 'id_prodi', 'id_prodi');
    }


    /** baca departemen
     * Get the departemens that owns the dosen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departemens()
    {
        return $this->belongsTo(departemen::class, 'id_dept', 'id_dept');
    }


}
