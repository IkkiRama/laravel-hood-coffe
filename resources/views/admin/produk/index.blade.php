@extends('layout.admin')
@section('title', 'Produk | Hood Coffe Shop')
@section('judul_content', 'Daftar Produk')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">Tambah Produk</button>


                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop">Download Produk</button>
                        </div>

                        <div class="col-md-3 my-2">
                            <div class="input-group">
                                <select name="" id="" class="custom-select custom-select-sm form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategori as $value)
                                    <option value="{{$value->id}}">{{$value->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 my-2">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover table-striped table-bordered mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($produk as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset("img/$value->foto_produk")}}" width="80" height="80">
                                </td>
                                <td>{{$value->nama_produk}}</td>
                                <td>Rp {{number_format($value->harga_produk)}}</td>
                                <td>{{$value->stok_produk}}</td>
                                <td>

                                    <a href="{{url("/admin/produk/detail/$value->id")}}" class="btn btn-primary btn-sm my-1"><i class="fa fa-eye"></i></a>

                                    <a href="{{url("/admin/produk/ubah/$value->id")}}" class="btn btn-warning btn-sm my-1"><i class="fa fa-pen"></i></a>

                                    <a href="" class="btn btn-danger btn-sm my-1 hapusProduk" produk-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- ./card-body -->
            </div>
        </div>
    </div>


    {{-- modal tambah --}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form action="{{url('/admin/produk')}}" method="post" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group">
                        <label for="nama_produk">Nama</label>
                        <input type="text" id="nama_produk" name="nama_produk" class="form-control  @error('nama_produk') is-invalid @enderror" value="{{old('nama_produk')}}">

                         @error('nama_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>




                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control  @error('kategori_id') is-invalid @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $value)
                                <option value="{{$value->id}}"{{(old('kategori_id') == $value->id) ? ' selected' : ''}}>{{$value->nama_kategori}}</option>
                            @endforeach
                        </select>

                         @error('kategori_id') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_produk">Harga</label>
                        <input type="number" id="harga_produk" name="harga_produk" class="form-control  @error('harga_produk') is-invalid @enderror" value="{{old('harga_produk')}}">

                         @error('harga_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="berat_produk">Berat ( Dalam Gram )</label>
                        <input type="number" id="berat_produk" name="berat_produk" class="form-control  @error('berat_produk') is-invalid @enderror" value="{{old('berat_produk')}}">

                         @error('berat_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="stok_produk">Stok</label>
                        <input type="number" id="stok_produk" name="stok_produk" class="form-control  @error('stok_produk') is-invalid @enderror" value="{{old('stok_produk')}}">

                         @error('stok_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto_produk">Foto</label>
                        <input type="file" id="foto_produk" name="foto_produk" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi</label>
                        <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="10" class="form-control  @error('deskripsi_produk') is-invalid @enderror">{{old('deskripsi_produk')}}</textarea>


                         @error('deskripsi_produk') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
         @if(Session::has('sukses'))
            swal("Sukses!", "{{Session::get('sukses')}}", "success");
        @endif

        $('.hapusProduk').click(function(){
            let produk_id = $(this).attr('produk-id');
            swal({
                title: "Yakin?",
                text: "Anda Akan Menghapus Data Ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/produk/delete/"+produk_id
            }
            });
        });

    </script>
@endsection
