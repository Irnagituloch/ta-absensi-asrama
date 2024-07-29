@extends('master.template.base')
@section('content')

<div class="card shadow bg-primary text-white">
	<div class="card-body text-center">
		<h3>DATA PRODI <br> POLITEKNIK NEGERI KETAPANG</h3>
	</div>
</div>


<div class="card shadow mt-3">
	<div class="card-body">


		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-plus"></i> Tambah Prodi
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Buat Data Prodi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('master/master-data/data-jurusan/create')}}" method="post">
							@csrf
							<div class="form-group">
								<span>Nama Prodi</span>
								<input type="text" name="jurusan_nama" placeholder="Masuka Nama Prodi" required class="form-control">
							</div>

							<button class="btn btn-primary text-white float-right">Buat Prodi</button>
						</form>
					</div>
				</div>
			</div>
		</div>



		<div class="table-responsive">
			<table class="table table-bordered table-striped mt-3 table-hover text-center">
				<thead>
					<tr class="bg-primary text-white text-center">
						<th class="text-center">No</th>
						<th class="text-center">Aksi</th>
						<th>Nama Prodi</th>
					</tr>
				</thead>

				<tbody>
					@foreach($list_jurusan as $item)
					<tr>
						<td class="text-center">{{$loop->iteration}}</td>
						<td class="text-center">
							<div class="btn-group">
								<a href="{{url('master/master-data/data-jurusan',$item->jurusan_id)}}/hapus" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							</div>
						</td>
						<td>{{ucwords($item->jurusan_nama)}}</td>
					</tr>
					@endforeach
				</tbody>
				
			</table>
		</div>
	</div>
</div>


@endsection