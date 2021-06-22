@extends('layout.admin')
@section('title', " Ubah Produk | Hood Coffe Shop")
@section('judul_content', 'Ubah Produk')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url("/admin/produk/ubah/$produk->id")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="nama_produk">Nama</label>
                            <input type="text" id="nama_produk" name="nama_produk" class="form-control  @error('nama_produk') is-invalid @enderror" value="{{$produk->nama_produk}}">

                                @error('nama_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>




                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control  @error('kategori_id') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach($kategori as $value)
                                    <option value="{{$value->id}}"{{($produk->kategori_id == $value->id) ? ' selected' : ''}}>{{$value->nama_kategori}}</option>
                                @endforeach
                            </select>

                                @error('kategori_id') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga_produk">Harga</label>
                            <input type="number" id="harga_produk" name="harga_produk" class="form-control  @error('harga_produk') is-invalid @enderror" value="{{$produk->harga_produk}}">

                                @error('harga_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="berat_produk">Berat ( Dalam Gram )</label>
                            <input type="number" id="berat_produk" name="berat_produk" class="form-control  @error('berat_produk') is-invalid @enderror" value="{{$produk->berat_produk}}">

                                @error('berat_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="stok_produk">Stok</label>
                            <input type="number" id="stok_produk" name="stok_produk" class="form-control  @error('stok_produk') is-invalid @enderror" value="{{$produk->stok_produk}}">

                                @error('stok_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto_produk">Foto</label><br>
                            
                            <img src="{{asset("img/$produk->foto_produk")}}" width="100" height="100" class="my-3"><br>

                            <input type="file" id="foto_produk" name="foto_produk" class="form-form-control-file @error('foto_produk') is-invalid @enderror">

                            @error('foto_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>


                        <div class="form-group">
                            <label for="deskripsi_produk">Deskripsi</label>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="10" class="form-control  @error('deskripsi_produk') is-invalid @enderror">{{$produk->deskripsi_produk}}</textarea>


                                @error('deskripsi_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>

                        <button type="submit" class="btn btn-warning">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
