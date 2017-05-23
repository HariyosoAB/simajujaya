@extends('master.master')
@section('content')

<div class="box box-primary">
	<div class="box-header with-border">
		<h4>Form Quotation Barang</h4>
	</div>
	<div class="box-body">
		{{$jumlah}}
		<br>
		@foreach($client_id as $per)
			{{$per}}
		@endforeach

	</div>
	<div class="box-footer">

	</div>
</div>

@include('master.script')
@stop