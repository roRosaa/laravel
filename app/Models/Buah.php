<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buah extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'buah';
    protected $fillable = [
        'nama_buah','stok_buah','harga_buah'
    ];

    public function transaksi(){
        return $this->hasMany(Transaksi::class,'id');
    }
}
