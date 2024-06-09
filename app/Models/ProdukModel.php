<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = "produk";
    protected $primaryKey = "idproduk";
    protected $fillable = ['nama', 'harga', 'foto'];

    // tak menggunakan kolom created_at dan updated_at
    // yang disarankan Laravel maka Anda
    // harus mendefinisikan nama kolom penggantinya
    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diubah_pada';
}
