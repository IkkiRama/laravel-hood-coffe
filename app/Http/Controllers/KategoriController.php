<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori-produk.index', compact(['kategori']));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' =>'required|max:255|unique:kategori,nama_kategori|string'
        ]);


        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);


        return redirect('/admin/kategori-produk')->with('sukses', 'Data Berhasil Ditambahkan');


    }


    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/admin/kategori-produk')->with('sukses', 'Data Berhasil Dihapus');
    }
}
