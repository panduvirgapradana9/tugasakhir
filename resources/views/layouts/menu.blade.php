<nav class="navbar navbar-expand-md navbar-dark  mb-4">
  <div class="container">
    <a class="navbar-brand" href="/">Toko Berkah</a>
    <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('produk') }}">Produk</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('kategori') }}">Kategori</a>
        </li>
      </ul>
       <!-- SEARCH FORM -->
       <form class="form-inline ml-3" action="{{ URL::to('produk') }}">
        <div class="input-group input-group-sm">
          <input class="form-control" type="text" name="cari" value="{{Request::get('cari')}}" placeholder="Cari produk" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('cart') }}"><i class="fas fa-shopping-cart"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('login') }}">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>