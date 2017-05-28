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

      <form class="form-horizontal"  action="{{url('/')}}/proofitemreceipt" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="box-body" style="padding: 20px">
          <div class="form-group">
              <label>Jenis Surat</label>
              <select class="form-control" name="tipe" onchange="tipesurat(this.value)" required>
                  <option value="" selected></option>
                  <option value="1">barang keluar</option>
                  <option value="2">barang masuk</option>
              </select>
          </div>
          <div class="form-group" id="po">
              <label>Purchase Order: </label>
              <select class="form-control" name="po" id="pow">
                  <option value="" selected></option>
                  @foreach($po as $poa)
                  <option value="{{$poa->ID_Purchase_Order}}">{{$poa->Nomor_Purchase_Order}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group" id="pr">
              <label>Payment Receipt: </label>
              <select class="form-control" name="pr" id="prw">
                  <option value="" selected></option>
                  @foreach($pr as $pra)
                  <option value="{{$pra->pr_id}}">{{$pra->pr_nomor}}</option>
                  @endforeach
              </select>
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
      $("#po").hide();
      $("#pr").hide();
    }
  function tipesurat(val){
    if(val == '1'){
      $('#prw').prop('required', true);
      $('#pow').prop('required', false);
      $("#pr").show();
      $("#po").hide();


    }
    else {
      $('#pow').prop('required', true);
      $('#prw').prop('required', false);
      $("#po").show();
      $("#pr").hide();
    }
  }
</script>
<!-- /.row -->
@stop
