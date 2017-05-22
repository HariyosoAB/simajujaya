@extends('master.master')
@section('content')
<div class="box box-info">
  <div class="box-header with-border">
  	<h4>Membuat Quotation</h4>
  </div>

  <div class="box-body">
  	<form class="form-horizontal">
  		<div class="form-group">
  			<label class="control-label col-md-2">Jumlah Quotation :</label>
  			<div class="col-md-2">
  				<input type="number" class="form-control">
  			</div>
  			<div class="col-md-4">
  				<button type="button" class="btn btn-default"> Generate</button>
  			</div>
  		</div>

  		<div class="form-group">
  			<label class="control-label col-md-2"></label>
  		</div>
  	</form>
  </div>

  <div class="box-footer">
  </div>

</div>

@stop
