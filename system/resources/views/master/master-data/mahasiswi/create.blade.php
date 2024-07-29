@extends('master.template.base')
@section('content')

<div class="card shadow bg-primary text-white">
	<div class="card-body text-center">
		<h3>BUAT DATA PENGHUNI ASRAMA <br> POLITEKNIK NEGERI KETAPANG</h3>
	</div>
</div>





<form action="{{url('master/master-data/data-mahasiswi/create')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row mt-5">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<h3>Biodata Penghuni Asrama</h3>
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<span>Nama Penghuni Asrama</span>
								<input type="text" name="nama" class="form-control" required placeholder="Masukan Nama Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Prodi Penghuni Asrama</span>
								@if($jurusanCount == 0)
								<br>
								<a href="{{url('master/master-data/data-jurusan#exampleModal')}}" class="btn btn-primary mt-2">Buat data Prodi</a>
								@else
								<select name="user_jurusan" id="" class="form-control">
									<option value="" hidden>--Pilih Prodi Penghuni Asrama--</option>
									@foreach($list_jurusan as $item)
									<option value="{{$item->jurusan_nama}}">{{ucwords($item->jurusan_nama)}}</option>
									@endforeach
								</select>
								@endif
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Nim Penghuni Asrama</span>
								<input type="number" minlength="13" name="nim" class="form-control" required placeholder="Nim Penghuni Asrama">
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<span>NIK Penghuni Asrama</span>
								<input type="nik" minlength="16" name="nik" class="form-control" required placeholder="Masukan NIK Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Nomor Kamar Penghuni Asrama</span>
								<input type="number" name="user_no_kamar" min="1" class="form-control" required placeholder="Nomor Kamar Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Alamat Asal Penghuni Asrama</span>
								<input type="text" name="user_alamat" class="form-control" required placeholder="Alamat Asal  Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>E-Mail Penghuni Asrama</span>
								<input type="email" name="email" class="form-control" required placeholder="Masukan Email Penghuni Asrama">
							</div>
						</div>



						<div class="col-md-6">
							<div class="form-group">
								<span>Nomor Telp. Penghuni Asrama</span>
								<input type="number" minlength="13" name="user_notlp" class="form-control" required placeholder="No Tlp. Penghuni Asrama">
							</div>
						</div>

						
						<div class="col-md-6">
							<div class="form-group">
								<span>Tanggal Bergabung</span>
								<input type="date" name="user_tgl_masuk" class="form-control" required placeholder="Masukan Email Mahasiswi">
							</div>
						</div>
						<div class="col-md-6"></div>
						<div class="col-md-12 mt-5">
							<h3>Biodata Orang Tua/Wali</h3>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<span>Nama Orang Tua/Wali</span>
								<input type="text" name="user_nama_orangtua" class="form-control" required placeholder="Nama Orang Tua/Wali">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Nomor Telp. Orang Tua/Wali</span>
								<input type="number" minlength="13" name="no_tlp_orangtua" class="form-control" required placeholder="No Tlp. Orang Tua/Wali">
							</div>
						</div>

						<div class="col-md-12">
							<button class="btn btn-primary float-right"> <i class="fa fa-user-plus"></i> Tambah Penghuni</button>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<div class="col-md-12">
						<div class="form-group">
							<span>Nomor RFID</span>
							<input type="text" name="rfid" id="uid" required class="form-control" placeholder="No RFID">
						</div>
						<p>Scan RFID ke Alat, Biarkan sistem membaca kode terlebih dahulu !!!</p>
					</div>
				</div>
			</div>
		</div>




	</div>
</form>

<script>
	function cekUid(){
		$.ajax({
			type : "GET",
			url : "{{url('master/master-data/data-mahasiswi/get-uid')}}",
			cache : false,
			success : function(response){
				console.log(response);
				$("#uid").val(response)
			}
		});
	}

	setInterval(cekUid, 5000);
</script>

@endsection