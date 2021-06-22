<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('admin.produk.index', compact(['produk', 'kategori']));
    }



    public function show(Produk $produk)
    {
        return view('admin.produk.detail', compact(['produk']));
    }



    public function create()
    {

    }





    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'nama_produk' =>'required|max:255|unique:produk,nama_produk|string',
            'kategori_id' =>'required',
            'harga_produk' =>'required',
            'berat_produk' =>'required',
            'stok_produk' =>'required',
            'deskripsi_produk' =>'required|string',
            'foto_produk' =>'required|mimes:jpg,png|file|'
        ]);



        $namaFoto = str::random(60).'-'.time().'.'.$request->foto_produk->extension();
        $request->file('foto_produk')->move('img/', $namaFoto);



        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'harga_produk' => $request->harga_produk,
            'berat_produk' => $request->berat_produk,
            'stok_produk' => $request->stok_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'foto_produk' => $namaFoto
        ]);


        return redirect('/admin/produk')->with('sukses', 'Data Berhasil Ditambahkan');


    }


    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        return view('admin.produk.ubah', compact(['produk', 'kategori']));
    }


    public function update(Request $request, Produk $produk)
    {
        $id = Produk::find($produk->id);

        if ($request->hasFile('foto_produk')) {

            $namaFoto = str::random(60).'-'.time().'.'.$request->foto_produk->extension();
            $request->file('foto_produk')->move('img/', $namaFoto);

            $id->update([
                'kategori_id' => $request->kategori_id,
                'nama_produk' => $request->nama_produk,
                'harga_produk' => $request->harga_produk,
                'berat_produk' =>$request->berat_produk,
                'stok_produk' => $request->stok_produk,
                'foto_produk' => $namaFoto,
                'deskripsi_produk' => $request->deskripsi_produk
            ]);

        }else{

            $id->update($request->only('kategori_id','nama_produk', 'harga_produk', 'berat_produk', 'stok_produk', 'deskripsi_produk'));

        }


        return redirect('/admin/produk')->with('sukses', 'Data Berhasil Diubah');
    }



    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect('/admin/produk')->with('sukses', 'Data Berhasil Dihapus');
    }
}
