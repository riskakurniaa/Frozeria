<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = [
        'nama','kategori_id','jumlah_stok','stok_minimum',
        'satuan','harga_jual','harga_beli','berat_ukuran',
        'lokasi_simpan','deskripsi','foto'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
