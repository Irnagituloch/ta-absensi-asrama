@extends('mahasiswi.template.base')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row">

	<div class="col-md-4 mb-4 stretch-card transparent">
		<div class="card shadow">
			<div class="card-body">
				<img src="{{url('public')}}/assets/images/logo-text.png" class="mt-3" alt="logo" width="100%" />
			</div>
		</div>
	</div>

	<div class="col-md-4 mb-4 stretch-card transparent">
		<div class="card bg-danger text-white shadow">
			<div class="card-body">
				<p class="mb-4">Pelanggaran Bulan Ini</p>
				<p class="fs-30 mb-2">{{$totalPelanggaran}} Pelanggaran</p><br>
			</div>
		</div>
	</div>
	<div class="col-md-4 mb-4 stretch-card transparent">
		<div class="card card-dark-blue shadow">
			<div class="card-body">
				<p class="mb-4">Total Peringatan</p>
				<p class="fs-30 mb-2">{{$totalPeringatan}}</p><br>
			</div>
		</div>
	</div>

</div>




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
	var ctx = document.getElementById('barChart2').getContext('2d');
	var myBarChart = new Chart(ctx, {
		type: 'bar',
		data: data,
		options: options
	});
</script>
@endsection