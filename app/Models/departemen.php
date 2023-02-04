<?php

namespace App\Models;

use App\Models\prodi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departemen extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_dept','nama_dept','id_prodi'
    ];

    /**
     * Get the user that owns the departemen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prodis()
    {
        return $this->belongsTo(prodi::class, 'id_prodi', 'id_prodi');
    }
    
}
