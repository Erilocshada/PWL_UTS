<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Penjualan_detail;

class Penjualan extends Model
{
    //menambahkan penjualan_id primary key,user_id foreign key, pembeli(string50),penjualan_kode(string 20), penjualan_tanggal(datetime)
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
    protected $fillable = ['user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'];
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id', 'user_id');
        }
        function penjualan_detail()
        {
            return $this->hasMany(Penjualan_detail::class, 'penjualan_id', 'penjualan_id');
        }
}
