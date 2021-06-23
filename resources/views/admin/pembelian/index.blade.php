@extends('layout.admin')
@section('title', 'Pembelian | Hood Coffe Shop')
@section('judul_content', 'Daftar Pembelian')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pembelian as $key => $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->pelanggan->nama_pelanggan}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>Rp {{number_format($value->total_pembelian)}}</td>
                                <td>{{$value->status_pembelian}}</td>
                                <td>
                                    <a href="{{url("/admin/pembelian/detail/$value->id")}}" class="btn btn-info btn-sm my-1"><i class="fa fa-eye"></i></a>

                                    @if($value->status_pembelian !== "PENDING")
                                    <a href="{{url("/admin/pembelian/lihat pembayaran/$value->id")}}" class="btn btn-success btn-sm my-1 hapusProduk"><i class="fas fa-funnel-dollar"></i></a>
                                    @endif
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
