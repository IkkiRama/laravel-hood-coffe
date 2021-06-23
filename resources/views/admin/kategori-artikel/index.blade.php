@extends('layout.admin')
@section('title', 'Kategori Artikel | Hood Coffe Shop')
@section('judul_content', 'Daftar Kategori Artikel')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">Tambah Kategori</button>

                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#TambahKategoriDalamArtikel">Tambah Kategori Dalam Artikel</button>

                    <table class="table table-bordered table-hover table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah Artikel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($kategoriartikel as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>

                                <td><a href="{{url("admin/kategori-artikel/$value->id")}}">{{$value->nama}}</a></td>

                                <td><a href="{{url("admin/kategori-artikel/$value->id")}}">{{$value->artikel->count()}}</a></td>

                                <td>
                                    <a href="" class="btn btn-danger btn-sm my-1 hapusKategoriArtikel" kategoriartikel-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    {{-- modal tambah kategori--}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form action="{{url('/admin/kategori-artikel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">

                        @error('nama') <div class="invalid-feedback"> {{$message}} </div> @enderror
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

    {{-- modal tambah Tambah Kategori Dalam Artikel--}}
    <div class="modal fade" id="TambahKategoriDalamArtikel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form action="{{url('/admin/kategori-artikel/tambah')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="artikel_id">Artikel</label>
                        <select name="artikel_id" id="artikel_id" class="form-control  @error('artikel_id') is-invalid @enderror">
                            <option value="">Pilih Artikel</option>
                            @foreach($artikel as $value)
                                <option value="{{$value->id}}"{{(old('artikel_id') == $value->id) ? ' selected' : ''}}>{{$value->title}}</option>
                            @endforeach
                        </select>

                         @error('artikel_id') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="kategoriartikel_id">Kategori Artikel</label>
                        <select name="kategoriartikel_id" id="kategoriartikel_id" class="form-control  @error('kategoriartikel_id') is-invalid @enderror">
                            <option value="">Pilih Kategori Artikel</option>
                            @foreach($kategoriartikel as $value)
                                <option value="{{$value->id}}"{{(old('kategoriartikel_id') == $value->id) ? ' selected' : ''}}>{{$value->nama}}</option>
                            @endforeach
                        </select>

                         @error('kategoriartikel_id') <div class="invalid-feedback"> {{$message}} </div> @enderror
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

        @if(Session::has('gagal'))
            swal("Gagal!", "{{Session::get('gagal')}}", "error");
        @endif

        $('.hapusKategoriArtikel').click(function(){
            let kategori_artikel_id = $(this).attr('kategoriartikel-id');
            swal({
                title: "Yakin?",
                text: "Anda Akan Menghapus Data Ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/kategori-artikel/delete/"+kategori_artikel_id
            }
            });
        });

    </script>
@endsection
