@extends('layout.admin')
@section('title', 'Detail Pembelian | Hood Coffe Shop')
@section('judul_content', 'Detail Pembelian')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <h3>Pelanggan</h3>
                            <strong>{{$pembelian->pelanggan->nama_pelanggan}}</strong><br><br>

                            <p>
                                Email : {{$pembelian->pelanggan->email}} <br>
                                Telepon : {{$pembelian->pelanggan->telepon}}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h3>Pembelian</h3>
                            <strong>{{$pembelian->created_at}}</strong><br><br>

                            <p>
                                Rp {{number_format($pembelian->total_pembelian)}}  <br>
                                {{$pembelian->status_pembelian}}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h3>Pengiriman</h3>
                            <strong>{{$pembelian->alamat_pengiriman}}</strong><br><br>

                            <p>
                                RP {{number_format($pembelian->tarif)}} <br>
                                {{$pembelian->nama_kota}}
                            </p>
                        </div>

                        @if ($pembelian->resi_pengiriman !== "PENDING")
                            <div class="col-md-12">
                                <h3>Resi : {{$pembelian->resi_pengiriman}}</h3>
                            </div>
                        @endif
                    </div>

                    <table class="table table-bordered table-hover table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $subtotal = 0; ?>
                        @foreach($pembelianProduk as $key => $value)
                        <?php $subtotal += $value->jumlah * $value->harga ?>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->nama}}</td>
                                <td>Rp {{number_format($value->harga)}}</td>
                                <td>{{$value->jumlah}}</td>
                                <td>Rp {{number_format($value->jumlah * $value->harga)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total Pembelian</th>
                                <td>Rp {{number_format($pembelian->total_pembelian)}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
