<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kurir extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'kurirs';
    protected $primaryKey = 'id_kurir';
    protected $fillable = [
        'nama_kurir',
        'no_hp',
        'jenis_kurir'
    ];
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pesanan');
    }
}
