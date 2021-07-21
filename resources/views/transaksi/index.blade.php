@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Transaksi
          </h3>
        </div>
        <div class="card-body">
          <!-- digunakan untuk menampilkan pesan error atau sukses -->
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
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  @if($itemuser->role == 'admin')
                  <th>Nama</th>
                  @endif
                  <th>Sub Total</th>
                  <th>Diskon</th>
                  <th>Ongkir</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th>Status Pengiriman</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder as $order)
                <tr>
                  <td>
                    {{ ++$no }}
                  </td>
                  <td>
                    {{ $order->cart->no_invoice }}
                  </td>
                  @if($itemuser->role == 'admin')
                  <td>
                  {{$order->nama_penerima}}
                  </td>  
                  @endif
                  <td>
                    {{ number_format($order->cart->subtotal, 2) }}
                  </td>
                  <td>
                    {{ number_format($order->cart->diskon, 2) }}
                  </td>
                  <td>
                    {{ number_format($order->cart->ongkir, 2) }}
                  </td>
                  <td>
                    {{ number_format($order->cart->total, 2) }}
                  </td>                  
                  <td>
                    @if ( $order->cart->status_pembayaran =='belum')
                      <span class="badge bg-secondary">{{ $order->cart->status_pembayaran }}</span>
                      <a href="#" data-toggle="modal" data-target="#modal-upload{{$order->cart->id}}">upload bukti tranfer</a><br>
                    @else
                      <span class="badge badge-success">{{ $order->cart->status_pembayaran }}</span>
                      <a href="#" data-toggle="modal" data-target="#modal-bukti{{$order->cart->id}}">Lihat Bukti Transfer</a><br>
                    @endif

                    @if ($order->cart->status_pengiriman=="dibatalkan")
                      Batas Waktu pembayaran telah berakir
                    @elseif ($order->cart->status_pengiriman=="sudah")
                      Pembayaran Sukses
                    @else
                      Batas waktu pembayaran {{ date_format($order->cart->created_at->addDays(1),'d-m-Y H:i')}} <br>                      
                    @endif
                    
                  </td>
                  <td>
                    @if( $order->cart->status_pengiriman  == "sudah")
                        <span class="badge badge-success">{{ $order->cart->status_pengiriman }}</span><br>
                        {{ $order->cart->ekspedisi }} - {{ $order->cart->no_resi }}
                    @elseif ($order->cart->status_pengiriman  == "dibatalkan")
                        <span class="badge bg-danger text-white">{{ $order->cart->status_pengiriman }}</span>
                    @else
                        <span class="badge bg-secondary text-white">{{ $order->cart->status_pengiriman }}</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('transaksi.show', $order->id) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                    @if($itemuser->role == 'admin')
                    <a href="{{ route('transaksi.edit', $order->id) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


@foreach($itemorder as $order)
<div class="modal fade" id="modal-bukti{{$order->cart->id}}" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Bukti Transfer</h4>
            </div>
            <div class="modal-body">
            <img src="{{ asset('images/buktitransfer/'.$order->cart->bukti_transfer) }}" class="d-block w-100" alt="...">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </div>       
@endforeach
         
@foreach($itemorder as $order)
<div class="modal fade" id="modal-upload{{$order->cart->id}}" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload Bukti Transfer</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('transaksi.update', $order->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('patch') }}

                <div class="card-body">
                  <input class="form-control" type="hidden" name="id" id="id" value="{{ $order->cart->id}}">
                   <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Upload Gambar</label>
                        <input type="file" class="form-control"  placeholder="" name="bukti" required="true" value="">
                      </div>
                    </div>
                </div>
                 </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
             <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          
            </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
@endforeach
  </div>
</div>
@endsection