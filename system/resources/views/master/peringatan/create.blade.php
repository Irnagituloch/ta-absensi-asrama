@extends('master.template.base')
@section('content')

<div class="card  bg-primary mb-3 text-white">
	<div class="card-body text-center">
		<h3>BUAT DATA PERINGATAN</h3>
	</div>
</div>


<div class="card mt-5">
	<div class="card-body">
		<div class="row">
			
			<div class="col-md-12 mb-3">
				<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
				Buat Kategori Peringatan</a>

				<div class="collapse mt-3" id="collapseExample">
					<div class="card card-body">
						<form action="{{url('master/kirim-peringatan/create-kategori')}}" method="post">
							@csrf
							<input type="text" class="form-control" placeholder="Nama Kategori Peringatan" name="kategori_peringatan_nama" required>
							<br>
							<button class="btn btn-primary float-right">Buat Kategori</button>
						</form>

						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Peringatan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($list_kategori as $item)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{ucwords($item->kategori_peringatan_nama)}}</td>
									<td><a href="{{url('master/kirim-peringatan',$item->kategori_peringatan_id)}}/delete-kategori" class="btn btn-danger" onclick="return confirm('Yakin menghapus kategori ini?')"><i class="fa fa-trash"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>

		<center>
			<h3>Form Buat Peringatan</h3>
		</center>
		<form action="{{url('master/kirim-peringatan/create')}}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-6 mt-4">
					<span>Nama Penghuni Asrama</span>
					<select name="peringatan_user_id" id="" required class="form-control">
						<option value="" hidden>--Pilih Penghuni Asrama--</option>
						@foreach($list_mahasiswi as $item)
						<option value="{{$item->user_id}}">{{ucwords($item->nama)}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6 mt-4">
					<span>Kategori Peringatan</span>
					<select name="peringatan_kategori_id" required id="" class="form-control">
						<option value="" hidden>--Pilih Kategori--</option>
						@foreach($list_kategori as $item)
						<option value="{{$item->kategori_peringatan_id}}">{{ucwords($item->kategori_peringatan_nama)}}</option>
						@endforeach
					</select>
				</div>

				<div class="col-md-12 mt-4">
					<div class="form-group">
						<span>Deksripsi Peringatan</span>
						<textarea name="peringatan_deskripsi" required id="" cols="30" rows="3" class="form-control"></textarea>
					</div>
				</div>

				<div class="col-md-12">
					<button class="btn btn-primary float-right" type="submit">SIMPAN</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection