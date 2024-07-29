@extends('master.template.base')
@section('content')

<div class="card  bg-primary mb-3 text-white">
	<div class="card-body text-center">
		<h3>DATA PENGHUNI ASRAMA <br> POLITEKNIK NEGERI KETAPANG</h3>
	</div>
</div>

<div class="row">

	<div class="col-md-6 mb-2 stretch-card transparent">
		<div class="card card-tale">
			<div class="card-body">
				<p class="mb-4">Total Peringatan</p>
				<p class="fs-30 mb-2">{{$totalPelanggaran}} Peringatan</p>
				<p></p>
			</div>
		</div>
	</div>

	<div class="col-md-6 mb-2 stretch-card transparent">
		<div class="card card-tale bg-danger">
			<div class="card-body">
				<p class="mb-4">Peringatan Bulan Ini</p>
				<p class="fs-30 mb-2">{{$totalPelanggaranBulan}} Peringatan</p>
				<p></p>
			</div>
		</div>
	</div>

</div>



<div class="card  border-0 mt-3">
	<div class="card-body">
		<!-- <a href="{{url('master/data-peringatan/create')}}" class="btn btn-primary float-right m-3 btn-sm"><i class="fa fa-plus"></i> Tambah Pelanggaran</a> -->

		<a href="{{url('master/kirim-peringatan/create')}}" class="btn btn-danger float-right m-3 btn-sm"><i class="fa fa-plus"></i> Kirim Peringatan
		</a>



		<table class="table">
			<thead>
				<tr class="bg-primary text-white text-center table table-hover table-bordered table-striped">
					<th>No</th>
					<th>Aksi</th>
					<th width="40%">Nama Penghuni Asrama</th>
					<th>Kat. Peringatan</th>
					<th>Prodi</th>
					<th>No Kamar</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_peringatan->sortByDesc('creayed_at') as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<div class="btn-group">
							<a href="{{url('master/kirim-peringatan',$item->peringatan_id)}}/delete" onclick=" return confirm('Yakin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</div>
					</td>
					<td><b>{{ucwords($item->mahasiswi->nama ?? 'Data penghuni telah dihapus')}}</b> <br>
						Peringatan : {{$item->peringatan_deskripsi}}</td>
					<td>
						{{ucwords($item->kategoriPeringatan->kategori_peringatan_nama ?? 'Data kategori telah dihapus')}}
					</td>
					<td>{{ucwords($item->mahasiswi->detail->user_jurusan ?? 'Data penghuni telah dihapus')}}</td>
					<td>NO : {{ucwords($item->mahasiswi->detail->user_no_kamar ?? 'Data penghuni telah dihapus')}}</td>

				</tr>
				@endforeach
			</tbody>


			
			
		</table>


	</div>
</div>


@endsection