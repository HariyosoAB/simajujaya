@extends('master.master')
@section('content')
<div class="box box-info">
  <form class="form-horizontal" action="quotation/barang">
  <div class="box-header with-border">
  	<h4>Membuat Quotation</h4>
  </div>

  <div class="box-body">
  	
  		<div class="form-group">
  			<label class="control-label col-md-3">Jumlah Quotation :</label>
  			<div class="col-md-2">
  				<input id="input_jumlah" name="input_jumlah" type="number" class="form-control">
  			</div>
  			<div class="col-md-4">
  				<button id="btn_generate" type="button" class="btn btn-default"> Generate</button>
  			</div>
  		</div>

  		<div id="perusahaan">
	  		<!-- <div class="form-group">
	  			<label class="control-label col-md-3">Nama Perusahaan 1 :</label>
	  			<div class="col-md-4">
	  				<select class="form-control" name="client_id[]" onchange="otherFunction(this)" counter="1">
	  					@foreach($perusahaan as $per)
	  						<option value="{{$per->client_id}}">{{$per->client_nama}}</option>
	  					@endforeach
	  					<option value="other">Other</option>
	  				</select>
	  			</div>
	  		</div>
  			
  			<div id="other-1" class="well" hidden>
  				<div class="form-group">
  					<label class="control-label col-md-3">Perusahaan :</label>
  					<div class="col-md-4">
  						<input name="perusahaan[]" type="text" class="form-control">
  					</div>

  				</div>
  				<div class="form-group">
  					<label class="control-label col-md-3">Alamat Perusahaan :</label>
  					<div class="col-md-4">
  						<input name="alamat_perusahaan[]" type="text" class="form-control">
  					</div>

  				</div>
  				<div class="form-group">
  					<label class="control-label col-md-3">Nomor Telepon :</label>
  					<div class="col-md-4">
  						<input name="nomor_telepon[]" type="text" class="form-control">
  					</div>

  				</div>
  			</div> -->
  		</div>
  	
  </div>

  <div class="box-footer">
  	<button type="submit" class="btn btn-success pull-right">Next</button>
  </div>
  </form>
</div>

@include('master.script')
<script type="text/javascript">
	function otherFunction(obj){
		var number = obj.getAttribute("counter");
		console.log(obj.value);
		if(obj.value == "other"){
			$("#other-"+number).show();	
		}
		else{
			$("#other-"+number).hide();	
		}
	}

	$(document).ready(function(){
		

		$("#btn_generate").click(function(){
			var n = $("#input_jumlah").val();
			console.log("onclick btn_generate");
			console.log(n);

			$("#perusahaan").empty();

			for(i = 0; i<n; i++){
				// $("#perusahaan").append('<div class="form-group"><label class="control-label col-md-3">Nama Perusahaan '+(i+1)+' :</label><div class="col-md-4"><select class="form-control" name="client_id">@foreach($perusahaan as $per)<option value="{{$per->client_id}}">{{$per->client_nama}}</option>@endforeach<option value="other">Other</option></select></div></div>');
				$("#perusahaan").append('<div class="form-group"><label class="control-label col-md-3">Nama Perusahaan '+(i+1)+' :</label><div class="col-md-4"><select class="form-control" name="client_id[]" onchange="otherFunction(this)" counter="'+(i+1)+'">@foreach($perusahaan as $per)<option value="{{$per->client_id}}">{{$per->client_nama}}</option>@endforeach<option value="other">Other</option></select></div></div><div id="other-'+(i+1)+'" class="well" hidden><div class="form-group"><label class="control-label col-md-3">Perusahaan :</label><div class="col-md-4"><input name="perusahaan[]" type="text" class="form-control"></div></div><div class="form-group"><label class="control-label col-md-3">Alamat Perusahaan :</label><div class="col-md-4"><input name="alamat_perusahaan[]" type="text" class="form-control"></div></div><div class="form-group"><label class="control-label col-md-3">Nomor Telepon :</label><div class="col-md-4"><input name="nomor_telepon[]" type="text" class="form-control"></div></div></div>');
			}
		});

		

	});
</script>

@stop
