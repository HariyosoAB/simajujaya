@extends('master.master')

@section('content')


<div id="myModal" class="modal fade" role="dialog"></div>

<div class="row">
	@if(session('success'))
		<div class="pad margin no-print">
			<div class="callout callout-info" style="margin-bottom: 0!important;">
				<h4><i class="fa fa-info"></i> Note:</h4>
				{{session('success')}}
			</div>
		</div>
	@endif

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Tabel Barang</h3>
			</div><!-- /.box-header -->
			<a href="{{url('/')}}/addbarangform"  class="btn btn-warning" id="edit" >Tambah Barang</a>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped dt-responsive nowrap">
					<thead>
						<tr>
							 <th>ID Barang</th>
							 <th>Nama Barang</th>
							 <th>Harga Barang</th>
							 <th>Stok Barang</th>
                      <th>Deskripsi Barang</th>
						</tr>
					</thead>
					<tbody>
						@foreach($barang as $n)
						<tr>
							 <td>{{ $n->ID_Barang }}</td>
							 <td>{{ $n->Nama_Barang }}</td>
						 	 <td>{{ $n->Harga_Barang }}</td>
                      <td>{{ $n->Stok_Barang }}</td>
                      <td>{{ $n->Deskripsi_Barang }}</td>
							<td>
								<a href="{{url('/')}}/updatebarangform/{{$n->ID_Barang}}"  class="btn btn-warning" id="edit" >Edit</a>
								<a href="{{url('/')}}/deletebarang/{{$n->ID_Barang}}" class="btn btn-danger" id="delete">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div>

@include('master.script')
@stop