@extends('layouts.template')
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col col-lg-3 col-md-3 mb-2">
            {{-- <div class="card">
                <div class="card-header"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <h3 class="card-title">
                        Accordian Menu Item #1
                    </h3>
                    <div class="card-tools">
                        <i class="fas fa-angle-left"></i>
                    </div>
                </div>
                <div class="collapse" id="collapseExample">
                <div class="card-body">
                    The body of the card
                </div>
                </div>
            </div> --}}

            <div class="card">
                <div class="card-header" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false"
                    aria-controls="collapse1">
                    <h3 class="card-title">
                        Kategori
                    </h3>
                    <div class="card-tools">
                        <i class="fas fa-angle-left"></i>
                    </div>
                </div>                
                <div class="collapse" id="collapse1">
                    <div class="card-body">
                        @foreach($listkategori as $kategori)
                            <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}">
                                {{ $kategori->nama_kategori }}
                            </a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-lg-9 col-md-9 mb-2">
            @if(isset($itemkategori))
                <h3>{{ $itemkategori->nama_kategori }}</h3>
            @elseif(Request::get('cari')<>'')
                <small>mendapatkan hasil <b>{{ $itemproduk->total() }}</b> pencarian untuk
                    <b>"{{ Request::get('cari') }}"</b>
                </small>
            @endif

            
            <div class="col-md-6">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('filter') == 'Terbaru' ? 'active' : ''}}"
                            href="{{route('homepage.produk', ['filter' => 'Terbaru','cari'=>$keyword])}}">Terbaru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('filter') == 'Harga Tertinggi' ? 'active' : '' }}"
                            href="{{route('homepage.produk', ['filter' => 'Harga Tertinggi','cari'=>$keyword])}}">Harga Tertinggi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('filter') == 'Harga Terendah' ? 'active' : '' }}"
                            href="{{route('homepage.produk', ['filter' => 'Harga Terendah', 'cari'=>$keyword])}}">Harga Terendah</a>
                    </li>
                </ul>
            </div>
            
            <div class="row mt-4">
                @foreach($itemproduk as $produk)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ URL::to('produk/'.$produk->id.'/'.$produk->slug_produk) }}">
                            @if($produk->foto != null)
                            <img src="{{ asset('storage/'.$produk->foto) }}" alt="{{ $produk->nama_produk }}"
                                class="card-img-top">
                            @else
                            <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}"
                                class="card-img-top">
                            @endif
                        </a>
                        <div class="card-body">
                            <a href="{{ URL::to('produk/'.$produk->id.'/'.$produk->slug_produk) }}"
                                class="text-decoration-none">
                                <p class="card-text">
                                    {{ $produk->nama_produk }}
                                </p>
                            </a>
                            <div class="row mt-4">
                                <div class="col">
                                    <button class="btn btn-light">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                                <div class="col-auto">
                                    @if($produk->promo != null)
                                    <div>
                                        <del class="small">Rp. {{ number_format($produk->harga, 2) }}</del>
                                    </div>
                                    <div>
                                        <dl>
                                          <dt style="color: red">
                                            Rp. {{ number_format($produk->promo->harga_akhir, 2) }}
                                          </dt>
                                        </dl>
                                      </div>
                                    @else
                                    <div>
                                            <small><br></small>
                                    </div>
                                    <div>
                                        <dl>
                                          <dt>
                                            Rp. {{ number_format($produk->harga, 2) }}
                                          </dt>
                                        </dl>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col">
                    {{ $itemproduk->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-scripts')
    <script>
        $('.card-header').click(function() {
            $(this).find('i').toggleClass('fas fa-angle-left fas fa-angle-down');
        });
    </script>
@endsection