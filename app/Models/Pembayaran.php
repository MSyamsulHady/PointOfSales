<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['metode_pembayaran', 'nomer_pembayaran'];






    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pesanan');
    }
}
