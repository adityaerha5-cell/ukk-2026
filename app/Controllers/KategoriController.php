<?php

namespace App\Controllers;
use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    
    {
        $kategori = Kategori::paginate(10);
        return view('kategori.index', compact('kategori'));
    }
    public function create(Request $request)
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $request->validate(['keterangan' => 'required|string|max:255']);
        $kategori = Kategori::create($request->all());
        return redirect('kategori.index')->with('success','Kategori berhasil ditambahkan.');

    }
    public function edit(Request $request, $id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('kategori.edit', compact('kategori'));
    }
    public function update(Request $request, $id_kategori)
    {
        $request->validate(['keterangan'=>'required|string|max:255']);
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success','Kategori berhasil diperbarui.');
    }
    public function delete(Request $request, $id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success','Kategori berhasil dihapus.');
    }

}