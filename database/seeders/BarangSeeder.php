<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $barangs = [
            ['nama'=>'Ayam nugget crispy','kategori_id'=>1,'jumlah_stok'=>120,'stok_minimum'=>20,'satuan'=>'pcs','harga_jual'=>35000,'harga_beli'=>28000,'berat_ukuran'=>'500 gram','lokasi_simpan'=>'Rak A-3','deskripsi'=>'Nugget ayam dengan lapisan tepung crispy.'],
            ['nama'=>'Sosis sapi premium','kategori_id'=>3,'jumlah_stok'=>15,'stok_minimum'=>10,'satuan'=>'pack','harga_jual'=>28000,'harga_beli'=>22000,'berat_ukuran'=>'250 gram','lokasi_simpan'=>'Rak B-1','deskripsi'=>'Sosis sapi premium rasa gurih.'],
            ['nama'=>'Dim sum udang','kategori_id'=>2,'jumlah_stok'=>0,'stok_minimum'=>5,'satuan'=>'box','harga_jual'=>45000,'harga_beli'=>35000,'berat_ukuran'=>'300 gram','lokasi_simpan'=>'Rak C-2','deskripsi'=>'Dim sum isi udang frozen.'],
            ['nama'=>'Bakso urat sapi','kategori_id'=>3,'jumlah_stok'=>60,'stok_minimum'=>15,'satuan'=>'pack','harga_jual'=>22000,'harga_beli'=>17000,'berat_ukuran'=>'500 gram','lokasi_simpan'=>'Rak B-2','deskripsi'=>'Bakso urat sapi kenyal dan gurih.'],
            ['nama'=>'Edamame beku','kategori_id'=>4,'jumlah_stok'=>0,'stok_minimum'=>10,'satuan'=>'pack','harga_jual'=>18000,'harga_beli'=>13000,'berat_ukuran'=>'400 gram','lokasi_simpan'=>'Rak D-1','deskripsi'=>'Edamame beku siap rebus.'],
            ['nama'=>'Chicken karaage','kategori_id'=>1,'jumlah_stok'=>45,'stok_minimum'=>20,'satuan'=>'pack','harga_jual'=>32000,'harga_beli'=>25000,'berat_ukuran'=>'400 gram','lokasi_simpan'=>'Rak A-1','deskripsi'=>'Karaage ayam gaya Jepang.'],
            ['nama'=>'Udang tempura','kategori_id'=>2,'jumlah_stok'=>18,'stok_minimum'=>10,'satuan'=>'pack','harga_jual'=>52000,'harga_beli'=>40000,'berat_ukuran'=>'250 gram','lokasi_simpan'=>'Rak C-1','deskripsi'=>'Udang tempura crispy beku.'],
            ['nama'=>'Corn dog mini','kategori_id'=>5,'jumlah_stok'=>90,'stok_minimum'=>20,'satuan'=>'pack','harga_jual'=>25000,'harga_beli'=>18000,'berat_ukuran'=>'300 gram','lokasi_simpan'=>'Rak E-1','deskripsi'=>'Corn dog mini siap goreng.'],
        ];

        foreach ($barangs as $b) {
            DB::table('barangs')->insert(array_merge($b, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
