<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * TODO 1: Atur properti $fillable atau $guarded
     * 
     * Kolom yang perlu di-mass assign:
     * - restoran_id
     * - nama
     * - harga
     * - jumlah
     */
    protected $fillable = [
        'restoran_id',
        'nama',
        'harga',
        'jumlah'
    ];

    /**
     * TODO 2: Definisikan Relasi Many-to-One (Belongs To)
     * 
     * Setiap Menu dimiliki oleh satu Restoran
     */
    public function restoran()
    {
        return $this->belongsTo(Restoran::class);
    }
}
