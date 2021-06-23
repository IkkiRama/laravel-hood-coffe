@extends('layout.admin')
@section('title', "Artikel Di Kategori $kategoriartikel->nama | Hood Coffe Shop")
@section('judul_content', "Daftar Artikel Di Kategori $kategoriartikel->nama")
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped my-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($kategoriartikel->artikel as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>

                                <td>
                                    <img src="{{asset("admin/img_artikel/$value->foto")}}" width="100" height="100">
                                </td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->user->name}}</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm my-1 hapusArtikelDariKategori" kategoriartikel-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.hapusArtikelDariKategori').click(function(){
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
                window.location = "/admin/kategori-artikel/deleteArtikel/"+kategori_artikel_id
            }
            });
        });
    </script>
@endsection
