<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategoriartikel;
use App\Models\Artikel_kategoriartikel;
use Illuminate\Http\Request;

class KategoriartikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        $kategoriartikel = Kategoriartikel::all();
        return view('admin.kategori-artikel.index', compact(['kategoriartikel', 'artikel']));
    }

    public function show(Kategoriartikel $kategoriartikel)
    {
        return view('admin.kategori-artikel.profil', compact(['kategoriartikel']));
    }



    public function create(Request $request)
    {

        // dd($request);
        $request->validate([
            'artikel_id' =>'required',
            'kategoriartikel_id' =>'required'
        ]);

        // if (Artikel_kategoriartikel::has($request->artikel_id)) {
        //     return redirect('/admin/kategori-artikel')->with('gagal', 'Data Sudah Ada Di Kategori Tersebut!');
        // }

        Artikel_kategoriartikel::create([
            'artikel_id' => $request->artikel_id,
            'kategoriartikel_id' => $request->kategoriartikel_id
        ]);


        return redirect('/admin/kategori-artikel')->with('sukses', 'Data Berhasil Ditambahkan');

    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' =>'required|max:255|unique:kategoriartikel,nama|string'
        ]);


        Kategoriartikel::create([
            'nama' => $request->nama
        ]);


        return redirect('/admin/kategori-artikel')->with('sukses', 'Data Berhasil Ditambahkan');

    }

    public function destroy(Kategoriartikel $kategoriartikel)
    {
        Kategoriartikel::destroy($kategoriartikel->id);
        return redirect('/admin/kategori-artikel')->with('sukses', 'Data Berhasil Dihapus');
    }

    public function delete(Artikel $artikel)
    {
        Artikel_kategoriartikel::where('artikel_id', $artikel->id)->delete();
        return redirect('/admin/kategori-artikel')->with('sukses', 'Data Berhasil Dihapus');
    }
}
