@extends('layouts.frontend')
@section('content')
    <div id="map" style="width: 100%; height: 500px;"></div>
    
    <img src="/foto/legenda.jpg" width= "200" height="200" shadow=2>


    <br>
    <br>
    <br>
    
    <div class="col-sm-12">
        <br>
        <br>
        <div class="text-center">
            <h2><b>Data Kota {{ $title }}</b></h2>
        </div>
        <br>
        <br>
        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No </th>
                            <th>Nama Kota </th>
                            <th width="150px" class="text-center">Provinsi</th>
                            <th class="text-center">Coordinat </th>
                            

                        </tr>
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($villa as $data)
                                <tr>
                                   
                                    <td class="text-center" >{{ $no++ }}</td>
                                    <td class="text-center" > {{ $data->nama_villa}}</td>
                                    <td class="text-center" >{{ $data->harga}}</td>
                                    <td class="text-center" > {{ $data->posisi}} </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
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


            @foreach ($harga as $data)
        var harga{{ $data->id_harga }} = L.layerGroup();
    @endforeach

    var data{{ $kec->id_kecamatan }} = L.layerGroup();

    var map = L.map('map', {
    center: [-5.153337202238125, 119.439069900109],
    zoom: 12,
    layers: [peta3,data{{ $kec->id_kecamatan }},
        @foreach ($harga as $data)
            harga{{ $data->id_harga }},
        @endforeach
    ]
    });
    
    var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4,
    };

    var overlayer = {
        "{{ $kec->kecamatan }}" : data{{ $kec->id_kecamatan }},
        @foreach ($harga as $data)
            "{{ $data->harga }}" : harga{{ $data->id_harga }},
        @endforeach
    };


    L.control.layers(baseMaps, overlayer).addTo(map);

        var kec = L.geoJSON(<?= $kec->geojson ?>,{
            style : {
                color : 'brown',
                fillColor : '{{ $kec->warna }}',
                fillOpacity : 1.0,     
            },
        }).addTo(data{{ $kec->id_kecamatan }});

        map.fitBounds(kec.getBounds());

        @foreach ($villa as $data)
    var iconvilla = L.icon({
    iconUrl: '{{ asset('icon') }}/{{ $data->icon }}',
    iconSize:     [50, 70], // size of the icon
});

var informasi = '<table class="table table-bordered"><tr></tr><tbody><tr><td>Nama Kota</td><td>{{ $data->nama_villa }}</td></tr><tr><td>Provinsi</td><td>{{ $data->harga}}</td></tr></tbody></table>';

    L.marker([<?= $data->posisi ?>],{icon:iconvilla})
    .addTo(harga{{ $data->id_harga }})
    .bindPopup(informasi);
    @endforeach

</script>
<script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>

@endsection