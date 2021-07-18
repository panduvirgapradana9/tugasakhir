<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $table = 'pengadaan';
    protected $fillable = [
        'id_pengadaan',
        'id_produk',
        'masuk',
        'awal',
        'akhir',
        'harga_beli',
        'created_at',
        'kadaluarsa'
    ];

    public function produk() {
        return $this->belongsTo('App\Produk', 'id_produk');
    }

}
