@extends('master.template.base')
@section('content')

<div class="card shadow bg-primary text-white">
	<div class="card-body text-center">
		<h3>BUAT DATA MAHASISWI <br> POLITEKNIK NEGERI KETAPANG</h3>
	</div>
</div>



<form action="{{url('master/master-data/data-mahasiswi/search-uid')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="col-md-12">
						<div class="form-group">
							<span>Nomor RFID</span>
							<input type="text" name="rfid" id="uid" required readonly class="form-control" placeholder="Masukan Email Mahasiswi">
						</div>

						<p>Scan RFID ke Alat, Biarkan sistem membaca kode terlebih dahulu !!!</p>
					</div>

					 <div class="col-md-12 mt-3">
                        <h4>Data Mahasiswi</h4>
                        <div id="mahasiswi-data"></div>
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

			 displayMahasiswiData(response);
		}
	});
}

   function displayMahasiswiData(data) {
        var html = "<p>Nama: " + data.name + "</p>" +
                   "<p>NIM: " + data.nim + "</p>" +
                   "<p>Prodi: " + data.prodi + "</p>";

        // Update the content of the mahasiswi-data div
        $("#mahasiswi-data").html(html);
    }

setInterval(cekUid, 5000);
</script>

@endsection