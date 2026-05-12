<?php
namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function show(int $id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.form', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'         => 'required|string|max:255',
            'kategori_id'  => 'nullable|exists:kategoris,id',
            'jumlah_stok'  => 'required|integer|min:0',
            'stok_minimum' => 'nullable|integer|min:0',
            'satuan'       => 'required|string|max:50',
            'harga_jual'   => 'nullable|numeric|min:0',
            'harga_beli'   => 'nullable|numeric|min:0',
            'berat_ukuran' => 'nullable|string|max:100',
            'lokasi_simpan'=> 'nullable|string|max:100',
            'deskripsi'    => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Barang::create($data);
        return redirect()->route('dashboard')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $barang    = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('barang.form', compact('barang', 'kategoris'));
    }

    public function update(Request $request, int $id)
    {
        $barang = Barang::findOrFail($id);

        $data = $request->validate([
            'nama'         => 'required|string|max:255',
            'kategori_id'  => 'nullable|exists:kategoris,id',
            'jumlah_stok'  => 'required|integer|min:0',
            'stok_minimum' => 'nullable|integer|min:0',
            'satuan'       => 'required|string|max:50',
            'harga_jual'   => 'nullable|numeric|min:0',
            'harga_beli'   => 'nullable|numeric|min:0',
            'berat_ukuran' => 'nullable|string|max:100',
            'lokasi_simpan'=> 'nullable|string|max:100',
            'deskripsi'    => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $barang->update($data);
        return redirect()->route('dashboard')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(int $id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('dashboard')->with('success', 'Barang berhasil dihapus.');
    }
}
