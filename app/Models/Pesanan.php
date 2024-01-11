<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'pesanans';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['id_user', 'id_pembayaran', 'id_produk', 'id_kurir', 'jumlah_pesanan', 'jumlah_bayar'];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran', 'id_pembayaran');
    }
    public function kurir()
    {
        return $this->belongsTo(kurir::class, 'id_kurir', 'id_kurir');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_produk', 'id_produk');
    }
}
