@extends('master.master')
@section('content')

<div class="box box-primary">
	<form class="form-horizontal" action="\quotation/create">
	<div class="box-header with-border">
		<h4>Form Quotation Barang</h4>
	</div>
	<div class="box-body">
		
		
		@foreach($client_id as $per)
			<input name="client_id[]" type="text" value="{{$per}}" hidden>
		@endforeach
		
		@foreach($perusahaan as $per)
			<input name="perusahaan[]" type="text" value="{{$per}}" hidden>
		@endforeach

		@foreach($alamat_perusahaan as $per)
			<input name="alamat_perusahaan[]" type="text" value="{{$per}}" hidden>
		@endforeach

		@foreach($nomor_telepon as $per)
			<input name="nomor_telepon[]" type="text" value="{{$per}}" hidden>
		@endforeach
		<div id="form-barang">
			<div class="form-group">
				<label class="control-label col-md-2">Barang :</label>
				<div class="col-md-4">
					<select name="barang[]" class="form-control" onchange="changeMaxStock(this, 'input-1')">
						<option style="display:none">--- Pilih barang ---</option>
						@foreach($barang as $per)
						<option value="{{$per->ID_Barang}}" counter="{{$per->Stok_Barang}}">{{$per->Nama_Barang}} [stok : {{$per->Stok_Barang}}]</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2">
					<input id="input-1" name="jumlah[]" type="number" class="form-control" max="100" value="0">
				</div>
			</div>
		</div>

		<div class="col-md-2">
		<button type="button" class="btn btn-primary btn-xs pull-right" onclick="addBarang(this)" value="1"><span class="glyphicon glyphicon-plus"></span> Add Barang</button>
		</div>
		
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-success pull-right">Submit</button>
	</div>
	</form>
</div>

@include('master.script')

<script type="text/javascript">
	function changeMaxStock(obj, id){
		var stok = $(obj).find('option:selected').text();
		stok = stok.split(":");
		stok = stok[1];
		stok = stok.split("]");
		stok = stok[0];
		stok = stok.split(" ");
		stok = stok[1];
		console.log("["+stok+"]");
		console.log("#"+id);
		console.log($("#"+id).attr("max"));

		$("#"+id).attr("max",stok);
	}

	function addBarang(obj){
		var nomorBarang = obj.getAttribute("value");
		
		nomorBarang = +nomorBarang;
		nomorBarang = nomorBarang + 1;
		console.log(nomorBarang);
		obj.setAttribute("value", nomorBarang);

		console.log("on add barang");
		$("#form-barang").append('<div class="form-group"><label class="control-label col-md-2">Pilih Barang :</label><div class="col-md-4"><select name="barang[]" class="form-control" onchange="changeMaxStock(this, '+'\'input-'+nomorBarang+'\')"><option style="display:none">--- Pilih barang ---</option>@foreach($barang as $per)<option value="{{$per->ID_Barang}}" counter="{{$per->Stok_Barang}}">{{$per->Nama_Barang}} [stok : {{$per->Stok_Barang}}]</option>@endforeach</select></div><div class="col-md-2"><input id="input-'+nomorBarang+'" name="jumlah[]" type="number" class="form-control" max="100" value="0"></div></div>');
	}
</script>
@stop