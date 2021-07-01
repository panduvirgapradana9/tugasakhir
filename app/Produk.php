<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'kategori_id',
        'supplier_id',
        'user_id',
        'kode_produk',
        'nama_produk',
        'slug_produk',
        'deskripsi_produk',
        'exp_date',
        'foto',
        'qty',
        'satuan',
        'harga',
        'status',
    ];

    public function kategori() {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function images() {
        return $this->hasMany('App\ProdukImage', 'produk_id');
    }
    public function cart()
    {
        return $this->belongsToMany('App\Cart');
    }
    
    public function detail() {
        return $this->hasMany('App\CartDetail', 'produk_id');
    }
    
    public function promo() {
        return $this->hasOne('App\ProdukPromo', 'produk_id');
    }

    public function supplier() {
        return $this->hasOne('App\Supplier', 'supplier_id');
    }



}
