<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan_detail extends Model
{
    //menambahkan detail_id primary key,penjualan_id foreign key, barang_id FK,harga(int),jumlah(int)
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';
    protected $fillable = ['penjualan_id', 'barang_id', 'harga', 'jumlah'];
    function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'penjualan_id');
    }
}
