<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatPengiriman extends Model
{
    protected $table = 'alamat_pengiriman';
    protected $fillable = [
        'user_id',
        'status',
        'nama_penerima',
        'no_tlp',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'ongkir',
        'kodepos',
    ];

    public function user() 
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
