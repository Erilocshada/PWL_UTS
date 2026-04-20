<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan_detail extends Model
{
    //menambahkan detail_id primary key,penjualan_id foreign key, barang_id FK,harga(int),jumlah(int)
    protected $primaryKey = 'detail_id';
    protected $fillable = ['penjualan_id', 'barang_id', 'harga', 'jumlah'];
}
