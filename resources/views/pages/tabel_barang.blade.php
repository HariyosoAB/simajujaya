@extends('master.master')

@section('content')

<div id="myModal" class="modal fade" role="dialog"></div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Tabel Barang</h3>
			</div><!-- /.box-header -->
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
								<a onclick="showEdit({{ $n->ID_Jabatan }})" class="btn btn-warning" id="edit" data-toggle="modal" data-target="#myModal">Edit</a>
								<a onclick="deletedata({{ $n->ID_Jabatan }})" class="btn btn-danger" id="delete">Delete</a>
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