<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Pelanggan;
use App\Models\Agama;
use App\Models\Jenis_kelamin;
use App\Models\User;


class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $agama = Agama::all();
        $jenis_kelamin = Jenis_kelamin::all();
        return view('admin.pelanggan.index', compact(['pelanggan', 'jenis_kelamin', 'agama']));
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



    public function store(Request $request)
    {

        $request->validate([
            'nama_pelanggan' =>'required|max:255|unique:pelanggan,nama_pelanggan|string',
            'email' =>'required|max:255|unique:users,email|string',
            'jenis_kelamin_id' =>'required',
            'agama_id' =>'required',
            'alamat_pelanggan' =>'required',
            'foto_pelanggan' =>'required|mimes:jpg,png|file|'
        ]);


        $user = new User;
        $user->name = $request->nama_pelanggan;
        $user->email = $request->email;
        $user->role = 'pelanggan';
        $user->password = bcrypt('12345');
        $user->remember_token = str::random(100);
        $user->save();



        $namaFoto = str::random(60).'-'.time().'.'.$request->foto_pelanggan->extension();
        $request->file('foto_pelanggan')->move('admin/img_pelanggan/', $namaFoto);



        Pelanggan::create([
            'user_id' => $user->id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'jenis_kelamin_id' => $request->jenis_kelamin_id,
            'agama_id' => $request->agama_id,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'foto_pelanggan' => $namaFoto
        ]);


        return redirect('/admin/pelanggan')->with('sukses', 'Data Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }



    public function destroy(Pelanggan $pelanggan)
    {
        // Hapus Foto
        $file = public_path('admin/img_pelanggan/').$pelanggan->foto_pelanggan;
        if (file_exists($file)) {
            @unlink($file);
        }


        Pelanggan::destroy($pelanggan->id);
        User::destroy($pelanggan->user_id);
        return redirect('/admin/pelanggan')->with('sukses', 'Data Berhasil Dihapus');
    }
}
