@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Supplier Produk</h4>
          <div class="card-tools">
            <a href="{{ route('supplier.create') }}" class="btn btn-sm btn-primary">
              Baru
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('supplier.index') }}">
            <div class="row">
              <div class="col">
                <input type="text" value="{{Request::get('keyword')}}" name="keyword" id="keyword" class="form-control" placeholder="ketik keyword nama disini">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  Cari
                </button>
              </div>
            </div>
          </form>
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
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($suppliers as $supplier)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td>

                  <td>
                  {{ $supplier->nama }}
                  </td>
                  <td>
                  {{ $supplier->alamat }}
                  </td>
                  <td>
                  {{ $supplier->telp }}
                  </td>
                  <td>
                  {{ $supplier->email }}
                  </td>
                  <td>
                    <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('supplier.destroy', $supplier->id) }}" method="post" style="display:inline;">
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
            <!-- untuk menampilkan link page, tambahkan skrip di bawah ini -->
            {{ $suppliers->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection