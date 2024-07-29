<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Selamat Datang</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{url('public')}}/assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('public')}}/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('public')}}/assets/images/logo-kecil.png" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="{{url('public')}}/assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <center>
                <img src="{{url('public')}}/assets/images/logo-text.png" style="width:250px !important" alt="logo">
                </center>
              </div>
              <h4>Selamat Datang di Manajemen Absensi Asrama POLITAP</h4>
              <h6 class="font-weight-light mt-3 mb-3">Masuk untuk melihat informasi-mu .</h6>
              <form class="pt-3" action="{{url('login')}}" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


   <script src="{{url('public')}}/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('public')}}/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="{{url('public')}}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{url('public')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{url('public')}}/assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('public')}}/assets/js/off-canvas.js"></script>
  <script src="{{url('public')}}/assets/js/hoverable-collapse.js"></script>
  <script src="{{url('public')}}/assets/js/template.js"></script>
  <script src="{{url('public')}}/assets/js/settings.js"></script>
  <script src="{{url('public')}}/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('public')}}/assets/js/dashboard.js"></script>
  <script src="{{url('public')}}/assets/js/Chart.roundedBarCharts.js"></script>
<script src="{{url('public')}}/assets/js/sweetalert.js"></script>
    <!-- Notifikasi -->
    @foreach(['success', 'warning', 'error', 'info'] as $status)
        @if (session($status))
        <script>
              Swal.fire({
                icon: "{{ $status }}",
                title: "{{ Str::upper($status) }}",
                text: "{{ session($status) }}!",
                showConfirmButton: false,
                timer: 15000
              })
        </script>
        @endif
    @endforeach
</body>
</html>