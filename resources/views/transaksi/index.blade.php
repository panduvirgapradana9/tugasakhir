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
                      <a href="/buktitranfer">upload bukti tranfer</a><br>
                    @else
                      <span class="badge badge-success">{{ $order->cart->status_pembayaran }}</span>
                      <a href="/buktitranfer">upload bukti tranfer</a><br>
                    @endif

                    @if ($order->cart->status_pengiriman=="dibatalkan")
                      Batas Waktu pembayaran telah berakir
                    @elseif ($order->cart->status_pengiriman=="sudah")
                      Pembayaran Sukses
                    @else
                      Batas waktu pembayaran {{ date_format($order->cart->created_at->addDays(3),'d-m-Y H:i')}} <br>                      
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
  </div>
</div>
@endsection