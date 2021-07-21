@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col col-12 mb-2">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              Alamat Pengiriman
            </div>
            <div class="col-auto">
              <a href="{{ URL::to('checkout') }}" class="btn btn-sm btn-danger">
                Tutup
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>Nama Penerima</th>
                  <th>Alamat</th>
                  <th>No tlp</th>
                  <th>Ongkir</th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemalamatpengiriman as $pengiriman)
                <tr>
                  <td>
                    {{ $pengiriman->nama_penerima }}
                  </td>
                  <td>
                    {{ $pengiriman->alamat }}<br />
                    {{ $pengiriman->kelurahan}}, {{ $pengiriman->kecamatan}}<br />
                    {{ $pengiriman->kota}}, {{ $pengiriman->provinsi}} - {{ $pengiriman->kodepos}}
                  </td>
                  <td>
                    {{ $pengiriman->no_tlp }}
                  </td>
                  <td>
                    {{ $pengiriman->ongkir }}
                  </td>
                  <td>
                    <form action="{{ route('alamatpengiriman.update',$pengiriman->id) }}" method="post">
                      @method('patch')
                      @csrf()
                      @if($pengiriman->status == 'utama')
                      <button type="submit" class="btn btn-primary btn-sm" disabled>Utama</button>
                      @else
                      <button type="submit" class="btn btn-primary btn-sm">Set Utama</button>
                      @endif
                    </form>
                    <form onsubmit="return confirm('Hapus Alamat?')" class="d-inline"
                      action="{{ route('alamatpengiriman.destroy', [$pengiriman->id]) }}" method="POST">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-8">
      <div class="card">
        <div class="card-header">
          Form Alamat Pengiriman
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
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
          <form action="{{ route('alamatpengiriman.store') }}" method="post">
            @csrf()
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="nama_penerima">Nama Penerima</label>
                  <input type="text" name="nama_penerima" class="form-control" value={{old('nama_penerima') }}>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" value={{old('alamat') }}>
                </div>
                <div class="form-group">
                  <label for="no_tlp">No Tlp</label>
                  <input type="number" name="no_tlp" class="form-control" value={{old('no_tlp') }}>
                </div>  
              </div>
              @php 
              $desa = DB::select("select * from desa");
              @endphp
              <div class="col">
                <div class="form-group">
                  <label for="kelurahan">Kelurahan</label>
                  <select class="form-control" name="kelurahan">
                  @foreach ($desa as $d)
                        <option value="{{$d->desa}}">{{$d->desa}}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection