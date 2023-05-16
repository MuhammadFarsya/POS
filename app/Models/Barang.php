<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $primaryKey="id";
    protected $fillable =
    [
        'id',
        'category_id',
        'kategori'.
        'nama_brg',
        'harga',
        'jumlah',
        'satuan'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
