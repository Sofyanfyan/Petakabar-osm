@extends('layouts.backend')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <form action="/kecamatan/insert" method="post">
            @csrf
        <div class="card-body">   
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Kecamatan</label>
                          <input name="kecamatan" class="form-control" placeholder="Kecamatan">
                          <div class="text-danger">
                              @error('kecamatan')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                <div class="form-group">
                    <label>Warna</label>
                <div class="input-group my-colorpicker2">
                    <input name="warna" class="form-control" placeholder="Warna Data">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square"></i></span> </div>
                   </div>
                </div>
                <div class="text-danger">
                              @error('warna')
                                {{$message}}
                              @enderror
                          </div>
                      </div>
                      <div class="col-sm-12">
                      
                      <div class="form-group">
                          <label>geojson</label>
                          <textarea name="geojson" rows="7" class="form-control" placeholder="geojson"></textarea>
                          <div class="text-danger">
                              @error('geojson')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Simpan</button>
            <button type="submit" class="btn btn-warning float-right">Cancel</button>
        </div>
        </form>
    </div>
</div>

<script src="{{ asset('AdminLTE') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
        //color picker with addon
    $('.my-colorpicker2').colorpicker()
    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
</script>

@endsection

<!-- bootstrap color picker -->
