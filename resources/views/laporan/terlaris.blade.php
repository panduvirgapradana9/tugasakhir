@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Produk Terlaris</h3>
          <div class="card-tools">
            <a href="{{ URL('admin/laporan') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          <h3 class="text-center">Periode {{ $bulan != ""? "Bulan ".$bulan: "" }} {{ $tahun }}</h3>
          <div class="row">
            {{-- <div class="col col-lg-4 col-md-4">
              <h4 class="text-center">Ringkasan Transaksi</h4>
              <!-- cetak totalnya -->
              
              {{$total = 0;
              foreach ($itemtransaksi as $k) {
                $total += $k->cart->total;
              }}}
              
              <!-- end cetak totalnya -->
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Total Penjualan</td>
                    <td>Rp. {{ number_format($total, 2) }}</td>
                  </tr>
                  <tr>
                    <td>Total Transaksi</td>
                    <td>{{ count($itemtransaksi) }} Transaksi</td>
                  </tr>
                </tbody>
              </table>
            </div> --}}
            <div class="col ">
              <div class="table-responsive">
                <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>Nama Produk</th>
                      <th>Terjual</th>
                      <th>Satuan</th>
                      <th>Sales Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($produk as $item)
                    <tr>
                      <td>
                          {{$item->produk->nama_produk}}
                      </td>
                      <td>
                          {{$item->sumproduk}}
                      </td>
                      <td>
                          {{$item->produk->satuan}}
                      </td>
                      <td>
                        Rp. {{ number_format($item->sumtotal, 2) }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection