@extends('master.master')
@section('content')
<div class="row">
  <!-- left column -->

  <!--/.col (left) -->
  <!-- right column -->
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Membuat Payment Receipt</h3>
      </div>
      <!-- <input type="hidden" name="" value="{{$counter=1}}"> -->
      <!-- /.box-header -->
      <!-- form start -->
      <script type="text/javascript">
          var counter =1;
      </script>

      <form class="form-horizontal"  action="{{url('/')}}/paymentreceipt" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="box-body">
          <div class="form-group">
            <label for="nama_perusahaan" class="col-sm-4 control-label"  >Nama Perusahaan</label>

            <div class="col-sm-8">
              <select name="id_perusahaan"class="form-control" id="nama_perusahaan" onchange="openform(this.value)" required>
                <option value=""> </option>
                  @foreach($client as $cli)
                    <option value="{{$cli->client_id}}">{{$cli->client_nama}}</option>
                  @endforeach
                  <option value="other">other</option>
            </select>
            </div>
          </div>
          <div id="other" class="well">
            <div class="form-group">
              <label for="nama_perusahaan" class="col-sm-4 control-label" >Perusahaan</label>
              <div class="col-sm-8">
                <input id="supnama" type="text" class="form-control" name="nama_client" value="" >
              </div>
            </div>
            <div class="form-group">
              <label for="nama_perusahaan" class="col-sm-4 control-label">Alamat Perusahaan</label>
              <div class="col-sm-8">
                <input id="supalamat"type="text" class="form-control" name="alamat_client" value="" >
              </div>
            </div>
            <div class="form-group">
              <label for="nama_perusahaan" class="col-sm-4 control-label"  >Nomor Telepon</label>

              <div class="col-sm-8">
                <input id="suptelpon" type="text" class="form-control" name="nomor_client" value="">
              </div>
            </div>

          </div>
          <div class="barang">

          </div>
          <div class="col-sm-8">
            <div id="tambah"class="btn btn-sm btn-info pull-right" name="button" role="button"><i class="fa fa-plus-square"></i>  Tambah Barang</div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right" >Submit</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
    <!-- /.box -->
    <!-- general form elements disabled -->

    <!-- /.box -->
  <!--/.col (right) -->
</div>


@include('master.script')
<script type="text/javascript">

      window.onload = function(){
      $("#other").hide();
      $(".barang").append('<h3 style="border-bottom:1px;">Barang #'+counter+'</h3><div class="form-group"><label for="nama_barang" class="col-sm-4 control-label">Nama Barang</label><div class="col-sm-8"><select class="form-control" name="id_barang[]" required><option value=""> </option>@foreach($barang as $bar)<option value="{{$bar->ID_Barang}}">{{$bar->Nama_Barang}}</option>@endforeach</select></div></div><div class="form-group"><label for="jumlah_barang" class="col-sm-4 control-label">Jumlah Barang</label><div class="col-sm-8"><input  name="jumlah_barang[]" type="text" class="form-control" id="jumlah_barang" required></div></div>')
      };

    $('#tambah').click(function(){
      counter = counter+1;
      $(".barang").append('<h3 style="border-bottom:1px;">Barang #'+counter+'</h3><div class="form-group"><label for="nama_barang" class="col-sm-4 control-label">Nama Barang</label><div class="col-sm-8"><select class="form-control" name="id_barang[]" required><option value=""> </option>@foreach($barang as $bar)<option value="{{$bar->ID_Barang}}">{{$bar->Nama_Barang}}</option>@endforeach</select></div></div><div class="form-group"><label for="jumlah_barang" class="col-sm-4 control-label">Jumlah Barang</label><div class="col-sm-8"><input  name="jumlah_barang[]" type="text" class="form-control" id="jumlah_barang" required></div></div>')

    });

    function openform(val){
        if(val == "other"){
          $('#other').show();
          $('#supnama').prop('required', true);
          $('#supalamat').prop('required', true);
          $('#suptelpon').prop('required', true);

          console.log("dd");

        }
        else{
          $('#other').hide();
          $('#supnama').prop('required', false);

          $('#supalamat').prop('required', false);

          $('#suptelpon').prop('required', false);


        }
    }

</script>
<!-- /.row -->
@stop
