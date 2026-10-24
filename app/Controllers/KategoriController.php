<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $data = Kategori::orderBy('id_Kategori','desc')->paginate(10);
    return view('kategori.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'nama_kategori' => 'required|string|max:20',
            'kode_kategori' => 'required|varchar|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        Kategori::create($data);
        return redirect(route('kategori.index'))->with('success', 'Kategori berhasil ditambahkan.');
    
    }
    public function edit(Request $request, $id)
    {
    $kategori = kategori::findorfail($id);
    return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori'=>'required',
            'kode_kategori'=>'required',
            'keterangan'=>'required'
        ]);
        $kategori = kategori::findorfail($id);
        $kategori->update([
            'nama_kategori'=> $request->nama_kategori,
            'kode_kategori'=> $request->kode_kategori,
            'keterangan'=> $request->keterangan,
        ]);
        return redirect()->route('kategori.index')->with('success','daftar kategori berhasil di perbarui');
    }
    public function destroy($id)
    {
        $kategori=kategori::findorfail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'kategori berhasil di hapus');
    }
}
