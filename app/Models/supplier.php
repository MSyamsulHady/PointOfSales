<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'suppliers';
    protected $primaryKey = 'id_supplier';
    protected $fillable = [
        'nama_supplier',
        'alamat',
        'contact'
    ];



    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_produk');
    }
}
