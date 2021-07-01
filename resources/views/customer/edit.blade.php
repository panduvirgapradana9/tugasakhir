@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Form Edit Customer
          </h3>
          <div class="card-tools">
            <a href="{{ route('customer.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
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

          <form action="{{ route('customer.update', $customer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="PUT" name="_method">

            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" value="{{$customer->name}}">
            </div>
            <div class="form-group">
              <label for="role">Role</label><br>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" {{($customer->role=="admin" ? 'checked' : "")}} name="role" class="custom-control-input {{$errors->first('role') ? "is-invalid" : "" }}" id="ADMIN" value="admin">
                <label class="custom-control-label" for="ADMIN">Administrator</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" {{($customer->role=="staff" ? 'checked' : "")}} name="role" class="custom-control-input {{$errors->first('role') ? "is-invalid" : "" }}" id="staff" value="staff">
                <label class="custom-control-label" for="staff">Staff</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" {{($customer->role=="member" ? 'checked' : "")}} name="role" class="custom-control-input {{$errors->first('role') ? "is-invalid" : "" }}" id="member" value="member">
                <label class="custom-control-label" for="member">Customer</label>
              </div>
            </div>
            
            <div class="form-group">
              <label for="phone">Nomor Telepon</label>
              <input type="text" name="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}" value="{{old('phone') ? old('phone') : $customer->phone}}">
              <div class="invalid-feedback">
                  {{$errors->first('phone')}}
              </div>
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <textarea name="address" id="address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">{{old('address') ? old('address') : $customer->alamat}}</textarea>
              <div class="invalid-feedback">
                  {{$errors->first('address')}}
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input value="{{ $customer->email }}" disabled class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" placeholder="user@mail.com" type="text"
            name="email" id="email" />
            </div>
            <div class="form-group mr-2">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Non Aktif</option>
              </select>
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection