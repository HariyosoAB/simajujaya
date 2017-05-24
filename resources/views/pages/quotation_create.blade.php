@extends('master.master')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		Create Quotation
	</div>
	<div class="box-body">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nomor Quotation</th>
					<th>Tanggal Dibuat</th>
					<th>Cetak Surat</th>
				</tr>
			</thead>
				@for($i = 0; $i<sizeof($quo_id); $i++)
				<tr>
					<td>{{$i+1}}</td>
					<td>{{$quo_nomor[$i]}}</td>
					<td>{{$quo_datetime[$i]}}</td>
					<td>
						<form action="print" target="_blank">
							<button type="submit" name="quo_id" class="btn btn-default btn-xs" value="{{$quo_id[$i]}}">Cetak</button>
						</form>
					</td>
				<tr>
				@endfor
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="box-footer">
	</div>
</div>
@include('master.script')
@stop