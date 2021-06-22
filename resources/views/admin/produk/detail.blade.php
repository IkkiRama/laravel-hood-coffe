@extends('layout.admin')
@section('title', " $produk->nama_produk | Hood Coffe Shop")
@section('judul_content', 'Detail Produk')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset("img/$produk->foto_produk")}}" style="width:100%;height:40vh;">
                        </div>


                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>Nama : </th>
                                    <td>{{$produk->nama_produk}}</td>
                                </tr>

                                <tr>
                                    <th>Kategori : </th>
                                    <td>{{$produk->kategori->nama_kategori}}</td>
                                </tr>

                                <tr>
                                    <th>Harga : </th>
                                    <td>Rp {{number_format($produk->harga_produk)}}</td>
                                </tr>

                                <tr>
                                    <th>Berat :</th>
                                    <td>{{$produk->berat_produk}} GR</td>
                                </tr>

                                <tr>
                                    <th>Stok : </th>
                                    <td>{{$produk->stok_produk}} Buah</td>
                                </tr>


                            </table>
                        </div>
                    </div>

                    <strong>Deskripsi : </strong>
                    <p class="mt-3">{{$produk->deskripsi_produk}}</p>

                </div>
            </div>
        </div>
    </div>
@endsection
