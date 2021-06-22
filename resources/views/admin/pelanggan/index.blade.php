@extends('layout.admin')
@section('title', 'Pelanggan | Hood Coffe Shop')
@section('judul_content', 'Daftar Pelanggan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">Tambah Pelanggan</button>

                    <table class="table table-bordered table-hover table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pelanggan as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset("admin/img_pelanggan/$value->foto_pelanggan")}}" width="100" height="100">
                                </td>
                                <td><a href="">{{$value->nama_pelanggan}}</a></td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm my-1 hapusProduk" pelanggan-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form action="{{url('/admin/pelanggan/tambah')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama</label>
                        <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" value="{{old('nama_pelanggan')}}">

                        @error('nama_pelanggan') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">

                        @error('email') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>


                    <div class="form-group">
                        <label for="jenis_kelamin_id">Jenis Kelamin</label>
                        <select name="jenis_kelamin_id" id="jenis_kelamin_id" class="form-control  @error('jenis_kelamin_id') is-invalid @enderror">
                            <option value="">Pilih Jenis Kelamin</option>
                            @foreach($jenis_kelamin as $value)
                                <option value="{{$value->id}}"{{(old('jenis_kelamin_id') == $value->id) ? ' selected' : ''}}>{{$value->nama}}</option>
                            @endforeach
                        </select>

                         @error('jenis_kelamin_id') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>


                    <div class="form-group">
                        <label for="agama_id">Agama</label>
                        <select name="agama_id" id="agama_id" class="form-control  @error('agama_id') is-invalid @enderror">
                            <option value="">Pilih Agama</option>
                            @foreach($agama as $value)
                                <option value="{{$value->id}}"{{(old('agama_id') == $value->id) ? ' selected' : ''}}>{{$value->nama}}</option>
                            @endforeach
                        </select>

                         @error('agama_id') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>


                    <div class="form-group">
                        <label for="foto_pelanggan">Foto</label>
                        <input type="file" id="foto_pelanggan" name="foto_pelanggan" class="form-control @error('foto_pelanggan') is-invalid @enderror" value="{{old('foto_pelanggan')}}">

                        @error('foto_pelanggan') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_pelanggan">Alamat</label>
                        <textarea name="alamat_pelanggan" id="alamat_pelanggan" cols="30" rows="10" class="form-control @error('alamat_pelanggan') is-invalid @enderror">{{old('alamat_pelanggan')}}</textarea>

                        @error('alamat_pelanggan') <div class="invalid-feedback"> {{$message}} </div> @enderror
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
            let pelanggan_id = $(this).attr('pelanggan-id');
            swal({
                title: "Yakin?",
                text: "Anda Akan Menghapus Data Ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/pelanggan/delete/"+pelanggan_id
            }
            });
        });

    </script>
@endsection
