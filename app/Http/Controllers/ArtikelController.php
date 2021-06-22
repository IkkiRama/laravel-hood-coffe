<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Artikel;
use App\Models\User;
use App\Models\Kategoriartikel;
use App\Models\Artikel_kategoriartikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin/artikel.index', compact(['artikel']));
    }




    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|max:255|unique:artikel,title|string',
            'slug_title' =>'required|max:255|unique:artikel,slug_title|string',
            'slug_content' =>'required|string',
            'content' =>'required|string',
            'foto' =>'required|mimes:jpg,png|file|'
        ]);



        $namaFoto = str::random(60).'-'.time().'.'.$request->foto->extension();
        $request->file('foto')->move('admin/img_artikel/', $namaFoto);



        Artikel::create([
            'user_id' => '3',
            'title' => $request->title,
            'slug_title' => $request->slug_title,
            'slug_content' => $request->slug_content,
            'content' => $request->content,
            'foto' => $namaFoto
        ]);



        return redirect('/admin/artikel')->with('sukses', 'Data Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        //
    }

    public function destroy(Artikel $artikel)
    {
        // Hapus Foto
        $kategoriartikel = Artikel_kategoriartikel::find($artikel->kategoriartikel);
        dd(kategoriartikel);
        $file = public_path('admin/img_artikel/').$artikel->foto;
        if (file_exists($file)) {
            @unlink($file);
        }

        Artikel::destroy($artikel->id);
        return redirect('/admin/artikel')->with('sukses', 'Data Berhasil Ditambahkan');
    }
}
