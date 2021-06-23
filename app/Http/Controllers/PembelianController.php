<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pembelian;
use App\Models\pelanggan;
use App\Models\Pembayaran;
use App\Models\PembelianProduk;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('admin.pembelian.index', compact(['pembelian']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        $pembelianProduk = PembelianProduk::where('pembelian_id', 'like', $pembelian->id)->get();
        return view('admin.pembelian.detail', compact(['pembelian', 'pembelianProduk']));
    }






    public function lihatPembayaran($idPembelian)
    {
        // dd($idPembelian);
        $arrayPembayaran = Pembayaran::where('pembelian_id', 'like', $idPembelian)->get();
        foreach ($arrayPembayaran as $key => $pembayaran) {
            return view("admin.pembelian.lihatPembayaran", compact(['pembayaran']));
        }
        // dd($pembayaran);


    }


    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
