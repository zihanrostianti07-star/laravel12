<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::withCount('bukus')
            ->orderBy('nama_kategori')
            ->get();

        return view('admin.index', compact('kategori'));
    }

    public function create()
    {
        $kategori = new Kategori();

        return view('admin.kategori.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        Kategori::create($this->validateKategori($request));

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori->update($this->validateKategori($request, $kategori));

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    private function validateKategori(Request $request, ?Kategori $kategori = null): array
    {
        return $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:100',
                Rule::unique('kategori', 'nama_kategori')->ignore($kategori),
            ],
        ]);
    }
}
