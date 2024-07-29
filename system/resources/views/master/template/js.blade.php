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
  <script src="{{url('public')}}/assets/js/sweetalert.js"></script>
  <script src="{{url('public')}}/assets/js/Chart.roundedBarCharts.js"></script>

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