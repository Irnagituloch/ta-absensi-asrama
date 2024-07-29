@extends('mahasiswi.template.base')
@section('content')

<!-- kode is here -->


<div class="card mt-3 text-white bg-primary">
	<div class="card-body">
		<center>
			<h3>Profil Akun Anda</h3>
		</center>
	</div>
</div>   		


<!-- header -->

<div class="row ">
	<!-- grid ke 1 -->
	<div class="col-md-4 mt-5">
		<div class="card">
			<div class="card-body table-responsive ">


				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Update Akun</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('master/profil-akun',Auth::user()->user_id)}}/update" method="POST" enctype="multipart/form-data">
									@csrf
									@method("PUT")
									<div class="form-group">
										<span>Nama </span>
										<input type="text" class="form-control" name="nama" value="{{Auth::user()->nama}}" required>
									</div>

									<div class="form-group">
										<span>Email </span>
										<input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" required>
									</div>


									<div class="form-group">
										<span>Password Baru</span>
										<input type="password" required name="password_baru" class="form-control" placeholder="Password Baru">
									</div>

									<div class="form-group">
										<span>Konfirmasi Password Baru</span>
										<input type="password" required class="form-control" name="konfirmasi_password_baru" placeholder="Konfirmasi Password Baru">
									</div>

									<div class="form-group">
										<span>Foto</span>
										<input type="file" accept="image/*" name="foto" required class="form-control" placeholder="Konfirmasi Password Baru">
									</div>

									<button class="btn btn-primary mt-3 float-right">SIMPAN</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<center>
					<img src="{{asset('system/public/')}}/{{Auth::user()->foto}}" width="70%" alt="">
				</center>


			</div>
		</div>
	</div>

	<!-- grid ke 2 -->
	<div class="col-md-8 mt-5">
		<div class="card">
			<div class="card-body table-responsive ">
				<div class="card-body table-responsive ">
					<button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">
						Ganti Password
					</button>

					<table class="table table-borderless mt-5 table-sm" >  
						<tr>
							<th colspan="2" class="text-primary">Profil Penghuni Asrama</th>
						</tr>
						<tr>
							<th>Nama Penghuni Asrama</th>
							<td>: {{ucwords( Auth::user()->nama)}}</td>
						</tr>

						<tr>
							<th>NIM Penghuni Asrama</th>
							<td>: {{ucwords( Auth::user()->detail->nim)}}</td>
						</tr>

						<tr>
							<th>NIK Penghuni Asrama</th>
							<td>: {{ucwords( Auth::user()->detail->nik)}}</td>
						</tr>
						<tr> 
							<th>No RFID</th>
							<td>: {{ucwords( Auth::user()->rfid)}}</td>
						</tr>
						<tr> 
							<th>E-Mail</th>
							<td>: {{ucwords( Auth::user()->email)}}</td>
						</tr>
						<tr>
							<th>Tanggal Bergabung</th>
							<td>: {{ucwords( Auth::user()->detail->user_tgl_masuk)}}</td>
						</tr>
						<tr>
							<th>Prodi Penghuni Asrama</th>
							<td>: {{ucwords( Auth::user()->detail->user_jurusan)}}</td>
						</tr>

						<tr>
							<th colspan="2" class="text-primary"><br> <br> Profil Orangtua/Wali Penghuni Asrama</th>
						</tr>
						<tr>
							<th>Nama Orang Tua/Wali</th>
							<td>: {{ucwords( Auth::user()->detail->user_nama_orangtua)}}</td>
						</tr>
						<tr> 
							<th>No Tlp.Orang Tua</th>
							<td>: {{ucwords( Auth::user()->detail->user_notlp_orangtua)}}</td>
						</tr>
						<tr> 
							<th>No Tlp.Penghuni Asrama</th>
							<td>: {{ucwords( Auth::user()->detail->user_notlp)}}</td>
						</tr>
						<tr>
							<th>No Kamar</th>
							<td>: {{ucwords( Auth::user()->detail->user_no_kamar)}}</td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td>: {{ucwords( Auth::user()->detail->user_alamat)}}</td>
						</tr>
					</table>	
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end code is here -->
@endsection