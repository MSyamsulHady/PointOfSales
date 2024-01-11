<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produk extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'produks';
    protected $primaryKey = 'id_produk';
    protected $fillable = ['id_katagori', 'id_supplier', 'nama_produk', 'image', 'harga_produk', 'stok_produk'];


    public function katagori()
    {
        return $this->belongsTo(Katagori::class, 'id_katagori', 'id_katagori');
    }
    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'id_supplier');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}
