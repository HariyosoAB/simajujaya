<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT Maju Jaya | Purchase Order</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url('/')}}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/dist/css/AdminLTE.min.css">
  </head>
  <body onload="window.print();">
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

  </body>
</html>
