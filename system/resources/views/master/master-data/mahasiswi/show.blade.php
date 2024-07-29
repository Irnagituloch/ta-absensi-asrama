@extends('master.template.base')
@section('content')

<div class="card shadow bg-primary text-white">
	<div class="card-body text-center">
		<h3>BUAT DATA PENGHUNI ASRAMA <br> POLITEKNIK NEGERI KETAPANG</h3>
	</div>
</div>




<div class="row">
	<div class="col-md-6">
		<div class="card mt-3">
			<div class="card-body">
				<table class="table table-borderless">
					<tr>
						<td colspan="2"><b>DATA PENGHUNI ASRAMA :</b></td>
					</tr>
					<tr>
						<td>Nama Penghuni Asrama</td>
						<td>: {{ucwords($detail->nama)}}</td>
					</tr>
					<tr>
						<td>Email Penghuni Asrama</td>
						<td>: {{ucwords($detail->email)}}</td>
					</tr>
					<tr>
						<td>NIK Penghuni Asrama</td>
						<td>: {{ucwords($detail->detail->nik)}}</td>
					</tr>
					<tr>
						<td>RFID</td>
						<td>: {{ucwords($detail->rfid)}}</td>
					</tr>
					<tr>
						<td>Prodi</td>
						<td>: {{ucwords($detail->detail->user_jurusan)}}</td>
					</tr>
					<tr>
						<td>No Tlp. Penghuni Asrama</td>
						<td>: {{ucwords($detail->detail->user_notlp)}}</td>
					</tr>

					<tr>
						<td>Alamat</td>
						<td>: {{ucwords($detail->detail->user_alamat)}}</td>
					</tr>
					<tr>
						<td colspan="2" class="mt-3"><b>DATA ORANG TUA/WALI:</b></td>
					</tr>

					<tr>
						<td>Nama Orang Tua</td>
						<td>: {{ucwords($detail->detail->user_nama_orangtua)}}</td>
					</tr>
					<tr>
						<td>No Tlp. Orang Tua/Wali</td>
						<td>: {{ucwords($detail->detail->user_notlp_orangtua)}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-6 mt-3">

		<div class="row">
			


			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<b>Data Pelanggaran Jam Pulang Penghuni Asrama</b>
						<table class="table mt-3 table-hover table-striped table-borderless">
							<tr class="bg-danger text-white">
								<th>No</th>
								<th>Jam Pulang</th>
								<th>Tanggal</th>
							</tr>

							@foreach($list_pelanggaran as $item)
							<tr>
								<th>{{$loop->iteration}}</th>
								<th>{{$item->absensi_jam}}</th>
								<th>{{$item->created_at}}</th>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>




@endsection