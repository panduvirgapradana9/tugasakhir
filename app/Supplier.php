<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'telp',
    ];
    
    public function produk()
    {
            return $this->hasMany('App\Produk', 'supplier_id');
    }
}
