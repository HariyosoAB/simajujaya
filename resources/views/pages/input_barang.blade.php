@extends('master.master')
@section('content')
<div class="row">
    <!-- left column -->


<!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/')}}/inputbarang"method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_barang" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang" class="col-sm-2 control-label">Harga</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga_barang" required="true" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stok_barang" class="col-sm-2 control-label">Stok Barang</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="stok_barang" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_barang" class="col-sm-2 control-label">Deskripsi</label>

                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="deskripsi_barang" required="true"></textarea>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default" id="btSubmit">Kembali</button>
                    <button type="submit" class="btn btn-info pull-right" id="btKembali">Submit</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
        <!-- general form elements disabled -->

        <!-- /.box -->
    </div>
    <!--/.col (right) -->
</div>
@stop