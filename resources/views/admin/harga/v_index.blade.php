@extends('layouts.backend')

@section('content')

<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Harga</h3>

                <div class="card-tools">
                  <a href="/harga/add" type="button" class="btn btn-tool " ><i class= "fa fa-plus"></i> Tambahkan </a>
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(Session('pesan'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> {{Session('pesan')}} </h5>
                  
                </div>

              @endif
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No </th>
                            <th>Harga </th>
                            <th width="50px" class="text-center">Icon </th>
                            <th width="100px" class="text-center">Action </th>

                        </tr>
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($harga as $data)
                                <tr>
                                   
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td> {{ $data->harga}}</td>
                                    <td> <img src=" {{asset('icon')}}/{{ $data->icon }} " width="100px"></td>
                                    <td class="text-center">
                                      <a href="/harga/edit/{{ $data->id_harga }}" type="button" class="btn btn-block btn-warning btn-sm" width="12px">Edit</a>
                                      <button data-toggle="modal" data-target="#delete{{ $data->id_harga }}" type="button" class="btn btn-block btn-danger btn-sm" width="12px">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                     </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <!-- /.modalDelete -->

          @foreach($harga as $data)

          <div class="modal fade" id="delete{{$data->id_harga}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{  $data->harga  }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin untuk menghapus data ini....??&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="/harga/delete/{{ $data->id_harga }} "type="button" class="btn btn-outline-light">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

          @endforeach

          <!-- page script -->
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