@extends('master.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Purchase Order
    <small>{{$info[0]->Nomor_Purchase_Order}}</small>
  </h1>
</section>


@if($success)
    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        {{$success}}
      </div>
    </div>
@endif


<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> SI Maju Jaya
        <small class="pull-right">Date: {{$info[0]->po_datetime}}</small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      From
      <address>
        <strong>PT Maju Jaya</strong><br>
        Jl. Teknik Kimia, Keputih, Sukolilo, Kota SBY, Jawa Timur 60117<br>
        Phone: (031) 5939214
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      To
      <address>
        <strong>{{$info[0]->supplier_nama}}</strong><br>
        {{$info[0]->supplier_alamat}}<br>
        Phone: {{$info[0]->supplier_telepon}}<br>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Purchase Order:</b><br>
      <br>
      <b>Number:</b> {{$info[0]->Nomor_Purchase_Order}}<br>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Nama Barang</th>
          <th>Qty</th>
          <th>Harga Satuan</th>
          <th>Subtotal</th>
        </tr>
        </thead>
        <input type="hidden" name="" value="{{$hargatotal= 0}}">
        <tbody>
          @foreach($barang as $bar)
          <tr>
            <td>{{$bar->Nama_Barang}}</td>
            <td>{{$bar->Quantity}}</td>
            <td>Rp{{$bar->Harga_Satuan}}</td>
            <td>Rp{{$bar->Quantity * $bar->Harga_Satuan}}</td>
            <input type="hidden" name="" value="{{$hargatotal=$hargatotal + $bar->Quantity * $bar->Harga_Satuan}}">
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">

    </div>
    <!-- /.col -->
    <div class="col-xs-6">

      <div class="table-responsive">
        <table class="table">
            <th>Total:</th>
            <td>Rp{{$hargatotal}}</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <div class="row">
      <div class="box-footer with-header">
          <div class="pull-right" style="margin-right:5em;margin-bottom:5em;">
            Date:
          </div>
          <div class="pull-right" style="margin-right:10em;margin-bottom:5em;">
            Authenticated By:
          </div>
      </div>
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="{{url('/')}}/printpo/{{$info[0]->ID_Purchase_Order}}" target="_blank" class="btn btn-info pull-right"><i class="fa fa-print"></i> Print</a>
    </div>
  </div>
</section>
<!-- /.content -->

@include('master.script')
@stop
