<style>
  li.active{
    background-color: #5E50F9;
    color: #ffffff;
  }
</style>

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="{{url('master/beranda')}}">
      <i class="icon-grid menu-icon"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
      <i class="fa fa-server menu-icon"></i>
      <span class="menu-title">Master Data</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{url('master/master-data/data-mahasiswi')}}">Data Anggota</a></li>
        <!-- <li class="nav-item"> <a class="nav-link" href="{{url('master/master-data/data-kartu')}}">Data Kartu</a></li> -->
        <!-- <li class="nav-item"> <a class="nav-link" href="{{url('master/master-data/cek-kartu')}}">Cek Kartu</a></li> -->
        <li class="nav-item"> <a class="nav-link" href="{{url('master/master-data/data-jurusan')}}">Data Prodi</a></li>
      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{url('master/kirim-peringatan')}}">
      <i class="fa fa-warning menu-icon"></i>
      <span class="menu-title">Kirim Peringatan</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{url('master/pelanggaran')}}">
      <i class="fa fa-warning menu-icon"></i>
      <span class="menu-title">Pelanggaran</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="{{url('master/pengaturan')}}">
      <i class="fa fa-cogs menu-icon"></i>
      <span class="menu-title">Pengaturan Sistem</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{url('master/profil-akun')}}">
      <i class="fa fa-user menu-icon"></i>
      <span class="menu-title">Profil Akun</span>
    </a>
  </li>


</ul>