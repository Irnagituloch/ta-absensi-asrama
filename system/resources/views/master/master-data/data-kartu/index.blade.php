@extends('master.template.base')
@section('content')

<div class="card shadow bg-primary text-white">
	<div class="card-body text-center">
		<h3>DATA KARTU PENGHUNI ASRAMA <br> POLITEKNIK NEGERI KETAPANG</h3>
	</div>
</div>


<div class="card mt-3">
	<div class="card-body">
		<table class="table table-hover table-bordered table-striped text-center">
			<thead>
				<tr class="bg-primary text-white text-center">
					<th>No</th>
					<th>RFID</th>
					<th>Status Kartus</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_kartu as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$item->rfid}}</td>
					<td>
						@if($item->flag_erase == 1)
						<span><i class="fa fa-check" style="color:#0BB727"></i> Kartu Aktif</span>
						@else
						<span><i class="fa fa-times" style="color:#A80F0F"></i> Kartu Tidak Aktif</span>
						@endif
					</td>
					<td>
						<a href="{{url('master/master-data/data-mahasiswi',$item->user_id)}}/detail" class="btn btn-primary">Cek User</a>
						<!-- @if($item->flag_erase == 1)
						<a href="{{url('master/master-data/data-kartu',$item->rfid_card_id)}}/non-aktifkan" class="btn btn-danger">Non-Aktifkan</a>
						@else
						<a href="{{url('master/master-data/data-kartu',$item->rfid_card_id)}}/aktifkan" class="btn btn-success">Aktifkan</a>
						@endif -->


					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr class="bg-primary text-white text-center">
					<th>No</th>
					<th>RFID</th>
					<th>Status Kartus</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>



@endsection


