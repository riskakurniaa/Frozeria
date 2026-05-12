<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama' => 'Ayam',    'deskripsi' => 'Produk berbahan dasar ayam beku',   'created_at' => '2026-01-01'],
            ['nama' => 'Seafood', 'deskripsi' => 'Produk berbahan dasar makanan laut', 'created_at' => '2026-01-01'],
            ['nama' => 'Sapi',    'deskripsi' => 'Produk berbahan dasar daging sapi',  'created_at' => '2026-01-05'],
            ['nama' => 'Sayuran', 'deskripsi' => 'Produk berbahan dasar sayuran beku', 'created_at' => '2026-01-10'],
            ['nama' => 'Siap saji','deskripsi' => 'Produk makanan beku siap saji',     'created_at' => '2026-01-12'],
        ];

        foreach ($kategoris as $k) {
            DB::table('kategoris')->insert([
                'nama'       => $k['nama'],
                'deskripsi'  => $k['deskripsi'],
                'created_at' => $k['created_at'],
                'updated_at' => $k['created_at'],
            ]);
        }
    }
}
