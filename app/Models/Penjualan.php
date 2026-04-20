<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //menambahkan penjualan_id primary key,user_id foreign key, pembeli(string50),penjualan_kode(string 20), penjualan_tanggal(datetime)
    protected $primaryKey = 'penjualan_id';
    protected $fillable = ['user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'];
}
