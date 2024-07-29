@extends('master.template.base')
@section('content')

<div class="card shadow bg-primary">
	<div class="card-body  text-white">
		<center>
			<h3>DATA PELANGGARAN PENGHUNI ASRAMA</h3>
		</center>
	</div>
</div>
<!-- end header -->


<div class="row ">
	<!-- grid ke 1 -->
	<div class="col-md-12 mt-5">
		<div class="card shadow">
			<div class="card-body table-responsive ">
				<table class="table mt-3 table table-hover table-bordered table-striped">
					<tr class="bg-danger text-white text-center">
						<th>No</th>
						<th>Nama</th>
						<th>Jam Pulang</th>
						<th>Tanggal</th>
					</tr>

					@foreach($list_pelanggaran->sortByDesc('created_at') as $item)
					<tr>
						<th>{{$loop->iteration}}</th>
						<th>{{ucwords($item->user->nama ?? "Data siswa telah dihapus")}}</th>
						<th>{{$item->absensi_jam}}</th>
						<th>{{$item->created_at}}</th>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

@endsection