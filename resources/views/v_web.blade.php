@extends('layouts.frontend')
@section('content')
    <div id="map" style="width: 100%; height: 500px;"></div>

    <style>
        .Legend
        {
            background: white;
            padding: 10px;
        }
    </style>
         
         <img src="/foto/legenda.jpg" width= "200" height="200">
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


        var kecamatan = L.layerGroup();

        @foreach ($kecamatan as $data)
            var data{{ $data->id_kecamatan }} = L.layerGroup();
        @endforeach
            var villa = L.layerGroup()

        var map = L.map('map', {
            center: [-7.442471626380291, 110.67401712675478],
            zoom:4,
            layers: [peta4,
        @foreach($kecamatan as $data)
            data{{ $data->id_kecamatan }},
        @endforeach
        villa, ]
        });

        var baseMaps = {
            "Grayscale": peta1,
            "Satellite": peta2,
            "Streets": peta3,
            "Dark": peta4,

        };

        var overlayer = {
            @foreach ($kecamatan as $data)
            "{{ $data->kecamatan }}" : data{{ $data-> id_kecamatan }},
            @endforeach
        "Villa" : villa,
        };
        
        L.control.layers(baseMaps, overlayer).addTo(map);

    @foreach($kecamatan as $data)
        L.geoJSON(<?= $data->geojson ?>,{
            style : 
            {
                color : 'black',
                fillColor : '{{ $data->warna }}',
                fillOpacity : 0.7,
            }
        }).addTo(data{{$data-> id_kecamatan}});
    @endforeach

    
    
    @foreach ($villa as $data)
         
    var iconvilla = L.icon({
    iconUrl: '{{ asset('icon') }}/{{ $data->icon }}',
     iconSize:     [30, 30], // size of the icon
});
        var informasi = '<table class="table table-bordered"><tr></tr><tbody><tr><td>Nama Kota</td><td>{{ $data->nama_villa }}</td></tr><tr><td>Provinsi</td><td>{{ $data->harga }}</td></tr></tbody></table>';
        L.marker([<?= $data->posisi ?>], {icon: iconvilla}).addTo(villa).
        bindPopup(informasi);
    
         @endforeach

    
    </script>
@endsection