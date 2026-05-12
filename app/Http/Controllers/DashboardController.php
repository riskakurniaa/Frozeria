<?php
namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $query = Barang::with('kategori');

        if (request('search')) {
            $query->where('nama', 'like', '%' . request('search') . '%');
        }
        if (request('kategori_id')) {
            $query->where('kategori_id', request('kategori_id'));
        }

        $barangs       = $query->paginate(10)->withQueryString();
        $kategoris     = Kategori::all();
        $totalBarang   = Barang::count();
        $totalKategori = Kategori::count();
        $stokMenipis   = Barang::where('jumlah_stok', '>', 0)->where('jumlah_stok', '<', 20)->count();
        $stokHabis     = Barang::where('jumlah_stok', 0)->count();

        return view('dashboard', compact(
            'barangs','kategoris','totalBarang','totalKategori','stokMenipis','stokHabis'
        ));
    }
}
