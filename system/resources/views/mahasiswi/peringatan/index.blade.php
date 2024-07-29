@extends('mahasiswi.template.base')
@section('content')

<!-- kode is here -->

<div class="card mt-3 text-white bg-primary">
	<div class="card-body ">
		<center>
			<h3>DATA PERINGATAN PENGHUNI ASRAMA</h3>
		</center>
	</div>
</div>

<div class="card  border-0 mt-3">
	<div class="card-body">
		<!-- <a href="{{url('master/data-peringatan/create')}}" class="btn btn-primary float-right m-3 btn-sm"><i class="fa fa-plus"></i> Tambah Pelanggaran</a> -->

	<!-- 	<a href="{{url('master/kirim-peringatan/create')}}" class="btn btn-danger float-right m-3 btn-sm"><i class="fa fa-plus"></i> Kirim Peringatan
		</a> -->



		<table class="table table-hover table-bordered table-striped">
			<thead>
				<tr class="bg-primary text-white">
					<th>No</th>
					<th>Nama Penghuni Asrama</th>
					<th>Kat. Peringatan</th>
					<th>No Kamar</th>
					<th>Jurusan</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_peringatan as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td><b class="mb-3">{{ucwords($item->mahasiswi->nama)}}</b> <br>
						<p class="mt-3">Deskripsi: {{$item->peringatan_deskripsi}}</p>
					</td>
					<td>{{ucwords($item->kategoriPeringatan->kategori_peringatan_nama)}}</td>
					<td>{{ucwords($item->mahasiswi->detail->user_jurusan)}}</td>
					<td>NO : {{ucwords($item->mahasiswi->detail->user_no_kamar)}}</td>

				</tr>
				@endforeach
			</tbody>


			
			
		</table>


	</div>
</div>

<!-- end code is here -->
@endsection