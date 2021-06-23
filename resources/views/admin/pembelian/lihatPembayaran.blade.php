@extends('layout.admin')
@section('title', 'Lihat Pembayaran | Hood Coffe Shop')
@section('judul_content', 'Lihat Pembayaran')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">
                            <img src="{{asset("/admin/img_bukti/$pembayaran->foto_bukti")}}" alt="foto bukti" class="img-fluid img-thumbnail img-responsive">
                        </div>
                        <div class="col-md-6">

                            <table class="table table-hover table-striped mt-3">
                                <tr>
                                    <th>Nama Penyetor</th>
                                    <td>: {{$pembayaran->nama_penyetor}}</td>
                                </tr>

                                <tr>
                                    <th>Nama Bank</th>
                                    <td>: {{$pembayaran->bank}}</td>
                                </tr>

                                <tr>
                                    <th>Jumlah</th>
                                    <td>: Rp {{number_format($pembayaran->jumlah)}}</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
