<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //menambahkan penjualan_id primary key,user_id foreign key, pembeli(string50),penjualan_kode(string 20), penjualan_tanggal(datetime)
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
    protected $fillable = ['user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'];
        function user()
        {
            return $this->belongsTo(User::class, 'user_id', 'user_id');
        }
}
