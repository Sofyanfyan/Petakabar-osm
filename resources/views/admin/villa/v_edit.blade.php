@extends('layouts.backend')

@section('content')

<div class="col-md-12">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Villa</h3>
        </div>
        <form action="/villa/update/{{ $villa->id_villa}}" method="post">
            @csrf
        <div class="card-body">   
                <div class="row">

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Nama Villa</label>
                          <input name="nama_villa" value="{{ $villa->nama_villa}}" class="form-control" placeholder="Nama Villa">
                          <div class="text-danger">
                              @error('nama_villa')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Kategori Harga</label>
                          <select name="id_harga" class="form-control" >
                              <option value="{{ $villa->id_harga}}">{{ $villa->harga}}</option>
                              @foreach($harga as $data)
                                    <option value="{{ $data->id_harga }}">{{ $data->harga }}</option>

                              @endforeach
                          <div class="text-danger">
                              @error('id_harga')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Harga Villa</label>
                          <input name="harga_villa" value="{{ $villa->harga_villa}}" class="form-control" placeholder="Harga">
                          <div class="text-danger">
                              @error('harga_villa')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Keterangan</label>
                          <select name="untuk"  class="form-control" >
                              <option value="{{ $villa->untuk}}">{{ $villa->untuk}}</option>
                              <option value="Harga Untuk 1 kamar">Harga untuk 1 kamar</option>
                              <option value="Harga Untuk 1 villa">Harga untuk 1 villa</option>
                          </select>
                          <div class="text-danger">
                              @error('untuk')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Kecamatan</label>
                          <select name="id_kecamatan" class="form-control" >
                              <option value="{{ $villa->id_kecamatan }}">{{ $villa->kecamatan }}</option>
                              @foreach($kecamatan as $data)
                                    <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>

                              @endforeach
                          </select>
                          <div class="text-danger">
                              @error('id_kecamatan')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Kolam</label>
                          <select name="kolam" class="form-control" >
                              <option value="{{ $villa->kolam }} ">{{ $villa->kolam }}</option>
                              <option value="Ada"> Ada </option>
                              <option value="Tidak Ada"> Tidak Ada </option>
                          </select>
                          <div class="text-danger">
                              @error('kolam')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Alamat Villa</label>
                          <input name="alamat" value="{{ $villa->alamat}}" class="form-control" placeholder="Alamat Villa">
                          <div class="text-danger">
                              @error('alamat')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Posisi Villa</label>
                          <input name="posisi" value="{{ $villa->posisi }}" id="posisi" class="form-control" placeholder="Posisi Villa">
                          <div class="text-danger">
                              @error('posisi')
                                {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                <div class="form-group">
                    <label>Foto Villa</label>
                    <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png">
                <div class="text-danger">
                              @error('foto')
                                {{$message}}
                              @enderror
                                 </div>
                            </div>
                        </div>


                <div class="col-sm-4">
                <!-- text input -->
                <div class="form-group">
                  <label>Nomer Telepon</label>
                   <input name="Telepon" value="{{ $villa->Telepon }}" id="posisi" class="form-control" placeholder="Nomer Telepon">
                   <div class="text-danger">
                       @error('Telepon')
                        {{$message}}
                      @enderror
                   </div>
               </div>
               </div>

                        <div class="col-sm-12">
                                                
                        <label>Map</label>
                        <div id="map" style="width: 100%; height: 300px;"></div>

                        </div>

                    </div>
                </div>


                <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Deskripsi Villa</label>
                          <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" rows="5"> {{ $villa->deskripsi }} </textarea>
                          <div class="text-danger">
                              @error('deskripsi')
                                {{$message}}
                              @enderror
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

<script>

var peta1 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var peta4 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });


            var map = L.map('map', {
            center: [{{ $villa->posisi }}],
            zoom:14,
            layers: [peta1],
        });


        var baseMaps = {
            "Grayscale": peta1,
            "Satellite": peta2,
            "Streets": peta3,
            "Dark": peta4,

        };

        L.control.layers(baseMaps).addTo(map);
        
        //mengambil titik koordinat

        var curLocation = [{{ $villa->posisi }}];
        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation,{
            draggable: 'true',

        });

        map.addLayer(marker)

        //ambil koordinat marker di drag AND drop

        marker.on('dragend', function(event){
        {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable : 'true',
            }).bindPopup(position).update();
            $("#posisi").val(position.lat + "," + position.lng).keyup();
        }
    });

    
    //ambil koordinat map diklik
    var posisi = document.querySelector("[name=posisi]");
    map.on("click",function(event){
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;

        if(!marker)
        {
            marker = L.marker(event.latlng).addTo(map);
        }else {
            marker.setLatLng(event.latlng);
        }
        posisi.value = lat + "," + lng;
    });

</script>

@endsection

<!-- bootstrap color picker -->
