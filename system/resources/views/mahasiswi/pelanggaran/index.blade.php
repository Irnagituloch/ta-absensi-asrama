@extends('mahasiswi.template.base')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- kode is here -->

<!-- header  -->
<div class="card mt-3 text-white bg-primary">
	<div class="card-body">
		<center>
			<h3>DATA PELANGGARAN PENGHUNI ASRAMA</h3>
		</center>
	</div>
</div>
<!-- end header -->


<div class="row ">
	<!-- grid ke 1 -->
	<div class="col-md-12 mt-4">
		<div class="card shadow">
			<div class="card-body table-responsive ">
				<table class="table mt-3 table table-hover table-bordered table-striped">
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

<!-- body -->


<!-- end body -->

<script>
        // Data untuk diagram batang
	var data = {
		labels: ["Data 1", "Data 2", "Data 3", "Data 4", "Data 5"],
		datasets: [{
			label: "Contoh Diagram Batang",
			backgroundColor: '#c70039',
			borderColor: '#7F0A0A',
			borderWidth: 1,
			data: [12, 19, 3, 5, 2],
		}]
	};

        // Pengaturan untuk diagram batang
	var options = {
		scales: {
			y: {
				beginAtZero: true
			}
		}
	};

        // Membuat objek diagram batang
	var ctx = document.getElementById('barChart').getContext('2d');
	var myBarChart = new Chart(ctx, {
		type: 'bar',
		data: data,
		options: options
	});
</script>

<!-- end code is here -->
@endsection