@extends('master.template.base')
@section('content')

<div class="card  bg-primary mb-3 text-white">
	<div class="card-body text-center">
		<h3>PENGATURAN SISTEM APLIKASI <br> ABSENSI ASRAMA</h3>
	</div>
</div>

<div class="card">

	<div class="card-body">
		<center>
			<h3 class="text-primary">DATA ADMIN APLIKASI</h3>
		</center>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-plus"></i> Pengaturan waktu
		</button>
		<!-- Modal  seiting waktu-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Pengaturan Waktu</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('master/pengaturan/update')}}" method="post">
							@csrf
							<span>Jam Pergi</span>
							<input type="time" name="jam_masuk" class="form-control mb-3" value="{{$pengaturan->jam_masuk}}">

							<span>Jam Pulang</span>
							<input type="time" name="jam_pulang" class="form-control" value="{{$pengaturan->jam_pulang}}">

							<button class="btn btn-primary mt-3">Update Waktu</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modalBuatAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Pengaturan Waktu</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('master/pengaturan/create-akun')}}" method="post">
							@csrf
							<div class="form-group">
								<span>Nama Admin</span>
								<input type="text" name="nama" required class="form-control">
							</div>

							<div class="form-group">
								<span>Email</span>
								<input type="text" name="email" required class="form-control">
							</div>

							<div class="form-group">
								<span>Password Baru</span>
								<input type="text" name="password" required class="form-control">
							</div>

							<button class="btn btn-primary mt-3">Buat Akun</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<table class="table table-hover table-bordered table-stripes mt-3 text-center">
			<thead>
				<tr class="bg-primary text-white text-center">
					<th>No</th>
					<th>Nama Admin</th>
					<th>Email Admin</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($list_admin as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{ucwords($item->nama)}}</td>
					<td>{{ucwords($item->email)}}</td>
					<td>
						<a href="{{url('master/pengaturan',$item->user_id)}}/delete" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>


			
		</table>
	</div>
</div>


@endsection