@extends('master.template.base')
@section('content')

<div class="card shadow bg-primary text-white">
	<div class="card-body text-center">
		<h3>DATA PENGHUNI ASRAMA<br> POLITEKNIK NEGERI KETAPANG</h3>
	</div>
</div>


<div class="card shadow mt-3">
	<div class="card-body">


		<!-- Button trigger modal -->
		<a href="{{url('master/master-data/data-mahasiswi/create')}}" class="btn btn-primary float-right mb-3">
			<i class="fa fa-user-plus"></i> Tambah Penghuni Baru
		</a>



		<div class="table-responsive">
			<table class="table table-bordered table-striped mt-3 table-hover text-center">
				<thead>
					<tr class="bg-primary text-white text-center">
						<th class="text-center">No</th>
						<th class="text-center">Aksi</th>
						<th>Nama Penghuni Asrama</th>
						<th>NIM</th>
						<th>E-Mail</th>
						<th>No Kamar</th>
						<th>Kode RFID</th>
						<th>Prodi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($list_mahasiswi->sortByDesc('created_at') as $item)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td class="text-center">
							<div class="btn-group">
								
								<a href="{{url('master/master-data/data-mahasiswi',$item->user_id)}}/detail" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i></a>

								<a href="{{url('master/master-data/data-mahasiswi',$item->user_id)}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

								<a href="{{url('master/master-data/data-mahasiswi',$item->user_id)}}/hapus" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</div>
						</td>

						<td>{{ucwords($item->nama)}}</td>
						<td>{{ucwords($item->email)}}</td>
						<td>{{ucwords($item->detail->nim ?? '')}}</td>
						<td>{{ucwords($item->detail->user_no_kamar ?? '')}}</td>
						<td>{{ucwords($item->rfid)}}</td>
						<td>{{ucwords($item->detail->user_jurusan ??'')}}</td>
					</tr>
					@endforeach
				</tbody>
				

			</table>
		</div>
	</div>
</div>


@endsection