@extends('layouts.backend')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
        </div>
        <form action="/harga/update/{{    $harga->id_harga    }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="card-body">   
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Harga</label>
                          <input name="harga" value=" {{    $harga->harga    }} " class="form-control" placeholder="Harga">
                          <div class="text-danger">
                              @error('Harga')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Icon</label>
                    <input type="file" name="icon" class="form-control" accept="image/png">
                    <div class="text-danger">
                              @error('warna')
                                {{$message}}
                              @enderror
                          </div>
                      </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label>Icon sebelumnya : </label>
                    <img src="{{ asset('icon')}}/{{ $harga->icon }}" width="300px">
                      </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Simpan</button>
            <a href="/harga" class="btn btn-warning float-right">Cancel</a>
        </div>
        </form>
    </div>
</div>

@endsection

<!-- bootstrap color picker -->
