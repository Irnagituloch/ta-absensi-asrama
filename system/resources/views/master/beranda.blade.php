@extends('master.template.base')
@section('content')

<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row">
			<div class="col-12 col-xl-8 mb-4 mb-xl-0">
				<h3 class="font-weight-bold">Selamat Datang {{ucwords(Auth::user()->nama)}}</h3>
				<h6 class="font-weight-normal mb-0 mt-3">Anda memiliki {{$totalPelanggaran}} Penghuni Asrama melakukan pelanggaran bulan ini</h6>
			</div>
			<div class="col-12 col-xl-4">
				<div class="justify-content-end d-flex">
					<div class="dropdown flex-md-grow-1 flex-xl-grow-0">
						<button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<i class="mdi mdi-calendar"></i> Hari ini {{date('D d-m-Y')}}
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- view gambar -->
<!-- <div class="row"> -->
<!-- 	<div class="col-md-6 grid-margin stretch-card">
		<div class="card tale-bg">
			<div class="card-people mt-auto">
				<img src="{{url('public')}}/assets/images/dashboard/people.svg" alt="people">
				<div class="weather-info">
					<div class="d-flex">
						<div>
							<h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
						</div>
						<div class="ml-2">
							<h4 class="location font-weight-normal">Bangalore</h4>
							<h6 class="font-weight-normal">India</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="row">

		<div class="col-md-3 mb-4 stretch-card transparent">
			<div class="card shadow">
				<div class="card-body">
					<img src="{{url('public')}}/assets/images/logo-text.png" class="mt-3" alt="logo" width="100%" />
				</div>
			</div>
		</div>

		<div class="col-md-3 mb-4 stretch-card transparent">
			<div class="card bg-danger text-white shadow">
				<div class="card-body">
					<p class="mb-4">Pelanggaran Bulan Ini</p>
					<p class="fs-30 mb-2">{{$totalPelanggaran}} Pelanggaran</p>
					<p> 0 Penghuni Asrama</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 mb-4 stretch-card transparent">
			<div class="card card-dark-blue shadow">
				<div class="card-body">
					<p class="mb-4">Total Penghuni Asrama</p>
					<p class=" mb-2" style="font-size: 16pt">{{$totalMahasiswi}} Penghuni Asrama</p>
					<p>{{$totalJurusan}} Prodi</p>
				</div>
			</div>
		</div>

		<div class="col-md-3 mb-4 stretch-card transparent">
			<div class="card bg-success text-white shadow">
				<div class="card-body">
					<p class="mb-4">Penghuni Asrama/Prodi</p>
					<p class="fs-30 mb-2">{{$totalJurusan}} Prodi</p>
					<p>Politap</p>
				</div>
			</div>
		</div>

	</div>


	<div class="row mt-4">
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card shadow">
				<div class="card-body ">
					<p class="card-title">Grafik Pelanggaran Penghuni Asrama</p>
					<div class="d-flex flex-wrap mb-5">

					</div>
					<canvas id="chartPelanggaran"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card shadow">
				<div class="card-body ">
					<div class="d-flex justify-content-between">
						<p class="card-title">Grafik Prodi Mendominasi</p>
					</div>
					<div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
					<canvas id="chartMahasiswi"></canvas>
				</div>
			</div>
		</div>


	</div>


	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		var ctx = document.getElementById('chartMahasiswi').getContext('2d');
		var data = {
			labels: [
				@foreach ($list_jurusan->sortByDesc('total_mahasiswi') as $item)
				"{{ ucwords(Str::limit($item->jurusan_nama,20)) }}",
				@endforeach
				],
			datasets: [{
				label: 'Total Banyak Penghuni Asrama/Prodi',
        backgroundColor: '#290C96', // Warna area dalam bar
        borderColor: 'rgba(75, 192, 192, 1)',     // Warna garis tepi bar
        borderWidth: 1,                            // Lebar garis tepi bar
        data: [
        	@foreach ($list_jurusan->sortByDesc('total_mahasiswi') as $item)
        	"{{ucwords($item->total_mahasiswi) }}",
        	@endforeach
        ]                    // Data nilai bar
    }]
		};

// Konfigurasi opsi chart
		var options = {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		};

// Membuat objek bar chart
		var myBarChart = new Chart(ctx, {
    type: 'bar',      // Tipe chart adalah bar
    data: data,       // Menggunakan data yang telah didefinisikan
    options: options  // Menggunakan opsi yang telah didefinisikan
});




// CHART PELANGGARAN
		var ctx = document.getElementById('chartPelanggaran').getContext('2d');
		var data = {
			labels: [
				@foreach ($list_mahasiswi->sortByDesc('total_mahasiswi') as $item)
				"{{ ucwords(Str::limit($item->nama,20)) }}",
				@endforeach
				],
			datasets: [{
				label: 'Total Banyak Pelanggaran Penghuni Asrama',
        backgroundColor: '#C40303', // Warna area dalam bar
        borderColor: '#C40303',     // Warna garis tepi bar
        borderWidth: 1,                            // Lebar garis tepi bar
        data: [
        	@foreach ($list_mahasiswi->sortByDesc('total_mahasiswi') as $item)
        	"{{ucwords($item->total_mahasiswi) }}",
        	@endforeach
        ]                    // Data nilai bar
    }]
		};

// Konfigurasi opsi chart
		var options = {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		};

// Membuat objek bar chart
		var myBarChart = new Chart(ctx, {
    type: 'bar',      // Tipe chart adalah bar
    data: data,       // Menggunakan data yang telah didefinisikan
    options: options  // Menggunakan opsi yang telah didefinisikan
});


</script>
@endsection