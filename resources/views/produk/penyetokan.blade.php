@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk</h4>
          <div class="card-tools">
            <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary">
              Baru
            </a>
            <a href="{{ route('produk.cekstok') }}" class="btn btn-sm btn-danger">
              Cek Stok Produk
            </a>
            <a href="{{ route('produk.cekkadaluarsa') }}" class="btn btn-sm btn-danger">
              Cek Kadaluarsa Produk
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col">
                <input type="text" name="produk" id="keyword" class="form-control" placeholder="ketik keyword disini">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Produk</th>
                  <th>Stok Masuk</th>
                  <th>Stok Awal</th>
                  <th>Stok Akhir</th>
                  <th>Harga</th>
                  <th>Kadaluarsa</th>
                  <th>Tgl Masuk</th>
                </tr>
              </thead>
              <tbody>
                @foreach($item as $i)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td>
                  <td>
                   {{$i->nama_produk}}</td>
                  <td>
                  {{$i->masuk}}
                  </td>
                  <td>
                  {{$i->awal}}
                  </td>
                  <td>
                  {{$i->akhir}}
                  </td>
                  <td>
                  {{$i->harga_beli}}
                  </td>
                  @if ($i->kadaluarsa != null)
                  <td>
                  {{$i->kadaluarsa}}
                  </td>
                  @else
                  <td>
                  Produk tidak memiliki Kadaluarsa
                  </td>
                  @endif
                  <td>
                  {{$i->created_at}}
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
@endsection