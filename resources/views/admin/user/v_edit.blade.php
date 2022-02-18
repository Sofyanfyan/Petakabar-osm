@extends('layouts.backend')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form action="/user/update/ {{$user->id}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="card-body">   
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Nama</label>
                          <input name="name" class="form-control" value="{{$user->name}}" placeholder="Nama User">
                          <div class="text-danger">
                              @error('name')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>E-Mail</label>
                          <input name="email" class="form-control" value="{{$user->email}}" placeholder="E-Mail User" readonly>
                          <div class="text-danger">
                              @error('email')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Password</label>
                          <input name="password" class="form-control"  value="{{$user->password}}"  placeholder="Password User" readonly>
                          <div class="text-danger">
                              @error('password')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6">
                <div class="form-group">
                    <label>Foto User</label>
                    <input type="file" name="foto" class="form-control" accept="image/png,image/jpg,image/jpeg">
                <div class="text-danger">
                              @error('foto')
                                {{$message}}
                              @enderror
                          </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Simpan</button>
            <a href="/user" submit" class="btn btn-warning float-right">Cancel</a>
        </div>
        </form>
    </div>
</div>

@endsection

<!-- bootstrap color picker -->
