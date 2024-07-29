@extends('master.template.base')
@section('content')

<div class="card shadow bg-primary text-white">
	<div class="card-body text-center">
		<h3>BUAT DATA PENGHUNI ASRAMA <br> POLITEKNIK NEGERI KETAPANG</h3>
	</div>
</div>



<form action="{{url('master/master-data/data-mahasiswi',$detail->user_id)}}/update" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	<div class="row mt-5">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<h3>Biodata Penghuni Asrama</h3>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<span>Nama Penghuni Asrama</span>
								<input type="text" name="nama" class="form-control" value="{{ucwords($detail->nama)}}" required placeholder="Masukan Nama Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Prodi Penghuni Asrama</span>
								<select name="user_jurusan" id="" class="form-control">
									<option value="{{ucwords($detail->detail->user_jurusan)}}" hidden>{{ucwords($detail->detail->user_jurusan)}}</option>
									@foreach($list_jurusan as $item)
									<option value="{{$item->jurusan_nama}}">{{ucwords($item->jurusan_nama)}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Nomor Kamar Penghuni Asrama</span>
								<input type="number" value="{{$detail->detail->user_no_kamar}}" name="user_no_kamar" min="1" class="form-control" required placeholder="Nomor Kamar Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Alamat Asal Penghuni Asrama</span>
								<input type="text" value="{{$detail->detail->user_alamat}}" name="user_alamat" class="form-control" required placeholder="Alamat Asal  Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>E-Mail Penghuni Asrama</span>
								<input type="email" value="{{$detail->email}}" name="email" class="form-control" required placeholder="Masukan Email Penghuni Asrama">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<span>NIK Penghuni Asrama</span>
								<input type="number" minlength="16" value="{{$detail->detail->nik}}" name="nik" class="form-control" required placeholder="Masukan NIK Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>NIM Penghuni Asrama</span>
								<input type="number" minlength="16" value="{{$detail->detail->nim}}" name="nim" class="form-control" required placeholder="Masukan NIK Penghuni Asrama">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<span>Nomor Telp. Penghuni Asrama</span>
								<input type="number" minlength="13" value="{{$detail->detail->user_notlp}}" name="user_notlp" class="form-control" required placeholder="No Tlp. Penghuni Asrama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Tanggal Bergabung</span>
								<input type="date" value="{{$detail->detail->user_tgl_masuk}}" name="user_tgl_masuk" class="form-control" required placeholder="Masukan Email Penghuni Asrama">
							</div>
						</div>
						<div class="col-md-6"></div>
						<div class="col-md-12 mt-5">
							<h3>Biodata Orang Tua/Wali</h3>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<span>Nama Orang Tua/Wali</span>
								<input type="text" minlength="13" name="user_nama_orangtua" value="{{ucwords($detail->detail->user_nama_orangtua)}}" class="form-control" required placeholder="Nama Orang Tua/Wali">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<span>Nomor Telp. Orang Tua/Wali</span>
								<input type="number" name="no_tlp_orangtua" value="{{ucwords($detail->detail->user_notlp_orangtua)}}" class="form-control" required placeholder="No Tlp. Orang Tua/Wali">
							</div>
						</div>

						

						<div class="col-md-12">
							<button class="btn btn-primary float-right"> <i class="fa fa-user-plus"></i> Tambah Mahasiswi</button>
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
							<input type="text" name="rfid" value="{{ucwords($detail->rfid)}}" id="uid" required  class="form-control" placeholder="Masukan Email Mahasiswi">
						</div>

						<p>Scan RFID ke Alat Jika ingin mengganti, Biarkan sistem membaca kode terlebih dahulu !!!</p>
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