@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Wishlist</h3>
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
                  <th>Picture</th>
                  <th>Nama Produk</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemwishlist as $wish)
                <tr>
                  <td>
                        @if($wish->produk->foto != null)
                        <img src="{{ asset('storage/'. $wish->produk->foto) }}" alt="{{ $wish->produk->nama_produk }}"  width="120px">
                        @else
                        <img src="{{ asset('images/bag.jpg') }}" alt="{{ $wish->produk->nama_produk }}"  width="120px">
                        @endif
                  </td>
                  <td>
                    <h4>{{ $wish->produk->nama_produk }}</h4>
                    @if($wish->produk->promo != null)
                      <div>
                        <del class="small">Rp. {{ number_format($wish->produk->promo->harga_awal, 2) }}</del>
                      </div>
                      <dl>
                        <dt style="color: red">
                          Rp. {{ number_format($wish->produk->promo->harga_akhir, 2) }}
                        </dt>
                      </dl>
                    @else
                    <div>
                      <dl>
                        <dt>
                          Rp. {{ number_format($wish->produk->harga, 2) }}
                        </dt>
                      </dl>
                  </div>
                    @endif

                  </td>
                  <td>
                    <form action="{{ route('cartdetail.store') }}" method="POST" style="display:inline;">
                      @csrf
                      <input type="hidden" name="produk_id" value={{$wish->produk->id}}>
                      <button type="submit" class="btn btn-sm btn-success mb-2">
                        Beli
                      </button>
                    </form>
                    <form action="{{ route('wishlist.destroy', $wish->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $itemwishlist->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection