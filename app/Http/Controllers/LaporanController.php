<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view("admin.laporan.index");
    }



    public function ambilData(Request $request)
    {
        $request->validate([
            'tglm' =>'required',
            'tgls' =>'required'
        ]);

        $pembelian = Pembelian::all();
        
        $filter = $pembelian->whereBetween('tanggal_pembelian', [$request->tglm, $request->tgls]);
        
        $hasil = $filter->all();


        // return back()->withInput(compact("hasil"))->with('sukses', 'Data Berhasil Ditambahkan');

        return view('admin.laporan.tampilLaporan', compact('hasil'));

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
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
