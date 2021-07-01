@extends('layouts.template')
@section('content')
<div class="container">
  <!-- carousel -->
  <div class="row">
    <div class="col">
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach($itemslide as $index => $slide )
          @if($index == 0)
          <div class="carousel-item active">
              <img src="{{ asset('storage/'.$slide->foto) }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $slide->caption_title }}</h5>
                <p>{{ $slide->caption_content }}</p>
              </div>
          </div>
          @else
          <div class="carousel-item">
              <img src="{{ asset('storage/'.$slide->foto) }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $slide->caption_title }}</h5>
                <p>{{ $slide->caption_content }}</p>
              </div>
          </div>
          @endif
          @endforeach          
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <!-- end carousel -->

<!-- produk Promo-->
<div class="row mt-4">
  <div class="col col-md-12 col-sm-12 mb-4">
    <h2 class="text-center">Promo</h2>
  </div>
  @foreach($itempromo as $promo)
  <!-- produk pertama -->
  <div class="col-md-4">
    <div class="card mb-4 shadow-sm">
      <a href="{{ URL::to('produk/'.$promo->produk->id.'/'.$promo->produk->slug_produk) }}">
        @if($promo->produk->foto != null)
        <img src="{{ asset('storage/'. $promo->produk->foto) }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
        @else
        <img src="{{ asset('images/bag.jpg') }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
        @endif
      </a>
      <div class="card-body">
        <a href="{{ URL::to('produk/'.$promo->produk->id.'/'.$promo->produk->slug_produk) }}" class="text-decoration-none">
          <p class="card-text">
            {{ $promo->produk->nama_produk }}
          </p>
        </a>
        <div class="row mt-4">
          <div class="col">
            <button class="btn btn-light">
              <i class="far fa-heart"></i>
            </button>
          </div>
          <div class="col-auto">
            <div>
              <small><del>Rp. {{ number_format($promo->harga_awal, 2) }}</del></small>
            </div>
            <div>
              <dl>
                <dt style="color: red">
                  Rp. {{ number_format($promo->harga_akhir, 2) }}
                </dt>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
<!-- end produk promo -->

  <!-- kategori produk -->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center">Kategori Produk</h2>
    </div>
    @foreach($itemkategori as $kategori)
    <!-- kategori pertama -->
    <div class="col-md-12 col-lg-6 col-xl-4">
      <div class="card mb-2 shadow-sm">
        <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}">
          @if($kategori->foto != null)
          <img src="{{ asset('storage/'. $kategori->foto) }}" alt="{{ $kategori->nama_kategori }}" class="mx-auto d-block" width="120px">
          @else
          <img src="{{ asset('images/bag.jpg') }}" alt="{{ $kategori->nama_kategori }}" class="card-img-top " width="120px">
          @endif
        </a>
        <div class="card-body">
          <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}" class="text-black text-center">
            <p><b>{{ $kategori->nama_kategori }}</b></p>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  <!-- end kategori produk -->
  
  <!-- produk Terbaru-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center">Terbaru</h2>
    </div>
    @foreach($itemproduk as $produk)
    <!-- produk pertama -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <a href="{{ URL::to('produk/'.$produk->id.'/'.$produk->slug_produk) }}">
          @if($produk->foto != null)
          <img src="{{ asset('storage/'. $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
          @else
          <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
          @endif
        </a>
        <div class="card-body">
          <a href="{{ URL::to('produk/'.$produk->id.'/'.$produk->slug_produk) }}" class="text-decoration-none">
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
              <p>
                Rp. {{ number_format($produk->harga, 2) }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  <!-- end produk terbaru -->
  <!-- tentang toko -->
  <hr>
  <div class="row mt-4">
    <div class="col" align="justify">
      <h5 class="text-center">Toko Berkah Perlengkapan dan Bahan Roti</h5>
      <p>
        Toko Berkah adalah salah satu toko penjualan perlengkapan dan bahan roti yang masih menggunakan cara manual yaitu dengan mengecek satu per satu ketersediaan barang kemudian mencatat data barang tersebut pada buku, sehingga dalam pengolahan data diperlukan waktu yang cukup lama dan barang yang ada ditoko ketika pada saat penempatan atau peletakannya sering mengalami keadaan tertindih atau tertutup oleh barang lainnya, hal tersebut selain menimbulkan penumpukan barang juga menyebabkan kerugian, yang dikarenakan barang yang tertutup melebihi batas tanggal kadaluarsa, sehingga barang tersebut tidak dapat dijual kembali. Untuk menangani hal tersebut dibuatlah sistem aplikasi penyimpanan atau ketersedian barang berbasis web. Dibuatnya aplikasi tersebut dengan harapan cara kerja sistem yang sebelumnya, dapat diubah menjadi cara kerja yang lebih efisien, tepat, berdaya guna serta terjamin mutu dan kualitas produk maupun prosedur kerjanya, serta dapat mempercepat dalam proses mengelola data barang yang ada.
      </p>
      <p class="text-center">
        <a href="{{ URL::to('about') }}" class="btn btn-outline-secondary">
          Baca Selengkapnya
        </a>      
      </p>  
    </div>
  </div>
  <!-- end tentang toko -->
</div>
@endsection