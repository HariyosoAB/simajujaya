@extends('master.master')
@section('content')
<div class="row">
  <!-- left column -->

  <!--/.col (left) -->
  <!-- right column -->
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Membuat Delivery Order</h3>
      </div>
      <!-- <input type="hidden" name="" value="{{$counter=1}}"> -->
      <!-- /.box-header -->
      <!-- form start -->
      <script type="text/javascript">
          var counter =1;
      </script>

      <form class="form-horizontal"  action="{{url('/')}}/deliveryorder" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="box-body" style="padding: 20px">
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



<!-- /.row -->
@stop
