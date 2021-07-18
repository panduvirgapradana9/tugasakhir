@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pengadaan Produk</h4>
                </div>

                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Kadaluarsa</th>
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
                                            >
                                        {{ $produk->satuan }}
                                    </td>
                                    <td><input type="number" name="harga" class="btn btn-outline-primary btn-sm"
                                            >
                                    </td>                             
                                    <td><input type="date" name="kadaluarsa" class="btn btn-outline-primary btn-sm">
                                    <br><p>Kosongi bila produk tidak memiliki kadaluarsa</p>
                                    </td>
       
                                    <td>

                                        
                                        <button type="submit" class="btn btn-sm btn-primary mb-2">
                                            SIMPAN
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
