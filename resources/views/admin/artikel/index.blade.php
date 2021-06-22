@extends('layout.admin')
@section('title', 'Artikel | Hood Coffe Shop')
@section('judul_content', 'Daftar Artikel')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#staticBackdrop">Tambah Artikel</button>


                    <table class="table-bordered table table-hover table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Pembuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($artikel as $value)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset("admin/img_artikel/$value->foto")}}" width="100" height="100">
                                </td>
                                <td><a href="">{{$value->title}}</a></td>
                                <td><a href="">{{$value->user->name}}</a></td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm my-2"><i class="fa fa-pen"></i></a>

                                    
                                    <a href="" class="btn btn-danger btn-sm my-2 hapusArtikel" artikel-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
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
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form action="{{url('/admin/artikel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                        
                        @error('title') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug_title">Slug Judul</label>
                        <input type="text" id="slug_title" name="slug_title" class="form-control @error('slug_title') is-invalid @enderror" value="{{old('slug_title')}}">
                        
                        @error('slug_title') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                     <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{old('foto')}}">
                        
                        @error('foto') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug_content">Slug Content</label>
                        <textarea name="slug_content" id="slug_content" cols="20" rows="5" class="form-control @error('slug_content') is-invalid @enderror">{{old('slug_content')}}</textarea>
                        
                        @error('slug_content') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="40" rows="15" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>
                        
                        @error('content') <div class="invalid-feedback"> {{$message}} </div> @enderror
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

        $('.hapusArtikel').click(function(){
            let artikel_id = $(this).attr('artikel-id');
            swal({
                title: "Yakin?",
                text: "Anda Akan Menghapus Data Ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/artikel/delete/"+artikel_id
            }
            });
        });

    </script>
@endsection