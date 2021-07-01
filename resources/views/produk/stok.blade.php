@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Stok</h4>
                </div>

                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($itemproduk as $produk)
                            <tr>
                                <td>
                                    <b>{{ $produk->nama_produk }}</b>
                                </td>
                                <form action="{{ route('produk.updatestok', $produk->id) }}"
                                    enctype="multipart/form-data" method="post" style="display:inline;">
                                    @csrf
                                    <td>
                                        <input type="number" name="qty" class="btn btn-outline-primary btn-sm"
                                            value="{{ number_format($produk->qty, 0) }}">
                                        {{ $produk->satuan }}
                                    </td>
                                    <td>
                                        {{ number_format($produk->harga, 2) }}
                                    </td>
                                    <td>

                                        
                                        <button type="submit" class="btn btn-sm btn-danger mb-2">
                                            Update
                                        </button>

                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    @endsection
