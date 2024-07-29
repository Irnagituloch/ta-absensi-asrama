@extends('master.template.base')
@section('content')


<!-- kode is here -->


<div class="card shadow bg-primary text-white">
	<div class="card-body text-center">
		<center>
			<h3>PROFIL AKUN</h3>
		</center>
	</div>
</div>   		


<div class="row mt-5">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <center>
          <img src="{{asset('system/public/')}}/{{Auth::user()->foto}}" width="70%" alt="">
        </center>
      </div>
    </div>
  </div>

  <div class="col-md-8 ">
    <div class="card">
      <div class="card-body">
        <table class="table  table-borderless">
          <tr>
            <th>Nama</th>
            <td>: {{ucwords(Auth::user()->nama)}}</td>
          </tr>

          <tr>
            <th>Email</th>
            <td>: {{ucwords(Auth::user()->email)}}</td>
          </tr>

          <tr>
            <td colspan="2">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Ganti Password
              </button>
            </td>
          </tr>
        </table>



        <!-- Modal -->
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
      </div>
    </div>
  </div>
</div>



@endsection