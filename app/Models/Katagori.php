<?php

namespace App\Models;


use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katagori extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'katagoris';
    protected $primaryKey = 'id_katagori';
    protected $fillable = ['image', 'nama_katagori'];



    public function setSlugAttribute($value)
    {
        $this->attributes['nama_katagori'] = Str::nama_katagori($value, '-');
    }

    public function getRouteKeyName()
    {

        return 'nama_katagori';
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_produk');
    }
}
