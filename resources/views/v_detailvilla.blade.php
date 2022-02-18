@extends('layouts.frontend')

@section('content')


<div class="col-sm-6">
      <div id="map" style="width: 100%; height: 400px;"></div>
</div>

<div class="col-sm-6">
   <img src="{{ asset('foto') }}/{{ $villa->foto }}" width="100%" height="100%" >
</div>

<div class="col sm-12">
   <br>
   <br>
   <table class="table table-bordered">
      <tr>
         <td width ="120px">Nama Villa</td>
         <td width="50px">:</td>
         <td>{{ $villa->nama_villa}}</td>

      </tr>

      <tr>
         <td>Harga</td>
         <td>:</td>
         <td>{{ $villa->harga_villa}}</td>

      </tr>

      <tr>
         <td>Kecamatan</td>
         <td>:</td>
         <td>{{ $villa->kecamatan}}</td>

      </tr>


      <tr>
         <td>Alamat</td>
         <td>:</td>
         <td>{{ $villa->alamat}}</td>

      </tr>


      <tr>
         <td>Kolam</td>
         <td>:</td>
         <td>{{ $villa->kolam}}</td>

      </tr>

      <tr>
         <td>Telepon</td>
         <td>:</td>
         <td>{{ $villa->Telepon}}</td>

      </tr>

      <tr>
         <td>Deksripsi</td>
         <td>:</td>
         <td>{{ $villa->deskripsi}}</td>

      </tr>




   </table>

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
            center: [ {{ $villa->posisi }} ],
            zoom:14,
            layers: [peta3],
        });


        var baseMaps = {
            "Grayscale": peta1,
            "Satellite": peta2,
            "Streets": peta3,
            "Dark": peta4,

        };

        L.control.layers(baseMaps).addTo(map);

         
         var iconvilla = L.icon({
         iconUrl: '{{ asset('icon') }}/{{ $villa->icon }}',
          iconSize:     [60, 60], // size of the icon
     });
     
             L.marker([<?= $villa->posisi ?>], {icon: iconvilla})
             .addTo(map);

</script>
@endsection
