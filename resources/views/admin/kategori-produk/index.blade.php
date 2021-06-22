@extends('layout.admin')
@section('title', 'Kategori Produk | Hood Coffe Shop')
@section('judul_content', 'Daftar Kategori Produk')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">Tambah Kategori</button>
                    
                    <table class="table table-bordered table-hover table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($kategori as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->nama_kategori}}</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm my-1 hapusProduk" kategori-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    {{-- modal tambah --}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form action="{{url('/admin/kategori-produk')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_kategori">Nama</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{old('nama_kategori')}}">
                        
                        @error('nama_kategori') <div class="invalid-feedback"> {{$message}} </div> @enderror
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
            let kategori_id = $(this).attr('kategori-id');
            swal({
                title: "Yakin?",
                text: "Anda Akan Menghapus Data Ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/kategori-produk/delete/"+kategori_id
            }
            });
        });

    </script>
@endsection