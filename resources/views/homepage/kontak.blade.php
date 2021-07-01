@extends('layouts.template')
@section('content')
<div class="container">
  
  <div class="row justify-content-center">
      <div class="col-md-4 col-md-offset-4">
        {{-- untuk semantara ini hanya sebagai sample tugas akhir --}}
        {{-- informasi lebih lanjut kunjungi alamat berikut--}}
        {{-- https://www.petanikode.com/laravel-mailer/ --}}
        {{-- https://www.niagahoster.co.id/blog/cara-setting-smtp-gmail-gratis/ --}}

          <h4>Kontak Kami</h4>
          <p>Punya Pertanyaan atau ulasan kepada kami?</p>

          @if(Session::has('status'))
            <div class="alert alert-success">{{ Session::get('status') }}</div>
          @endif

          <form action="" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="name">Nama</label>
                  <input class="form-control" type="text" name="nama" placeholder="nama anda" />
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="email" placeholder="alamat email anda" />
              </div>
              <div class="form-group">
                  <label for="message">Pesan</label>
                  <textarea class="form-control" name="pesan" id="" placeholder="pesan yang ingin anda sampaikan"
                      cols="30" rows="10"></textarea>
              </div>
              <br><br>
              <button class="btn btn-success btn-block">Kirim</button>
          <form>
      </div>
  </div>
</div>
@endsection