@extends('layout.admin')
@section('title', 'Laporan Pembelian | Hood Coffe Shop')
@section('judul_content', 'Laporan Pembelian')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{url("/admin/laporan")}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="tglm">Tanggal Mulai</label>
                                    
                                    <input type="date" name="tglm" class="form-control @error('tglm') is-invalid @enderror" value="{{old('tglm')}}" id="tglm">

                                    @error('tglm') <div class="invalid-feedback"> {{$message}} </div> @enderror
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="tgls">Tanggal Selesai</label>
                                    
                                    <input type="date" name="tgls" class="form-control @error('tgls') is-invalid @enderror" value="{{old('tgls')}}" id="tgls">

                                    @error('tgls') <div class="invalid-feedback"> {{$message}} </div> @enderror
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-top:30px;">
                                <button type="submit" name="lihat" class="btn btn-primary">Lihat</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered table-hover table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                                @foreach($hasil as $key => $value)
                                <?php  
                                    $total += $value->total_pembelian;
                                ?>
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->pelanggan->nama_pelanggan}}</td>
                                    <td>{{$value->tanggal_pembelian}}</td>
                                    <td>{{$value->status_pembelian}}</td>
                                    <td>Rp {{number_format($value->total_pembelian)}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total Pembelian</th>
                                <td>Rp {{number_format($total)}}</td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
