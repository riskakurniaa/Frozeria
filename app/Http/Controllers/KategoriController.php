<?php
namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $search    = request('search');
        $kategoris = Kategori::withCount('barangs')
            ->when($search, fn($q) => $q->where('nama', 'like', "%$search%"))
            ->get();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);
        Kategori::create($request->only('nama', 'deskripsi'));
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.form', compact('kategori'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);
        Kategori::findOrFail($id)->update($request->only('nama', 'deskripsi'));
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy(int $id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
