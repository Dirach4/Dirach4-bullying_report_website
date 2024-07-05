<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Kelana</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed {{ session('theme', 'light-mode') }}">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/kelanalogo.png" alt="kelanalogo" height="60" width="60">
  </div>

  <!-- Navbar -->
    @include('layouts.navigation')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            

          @include('laporan.card')
            <!-- /.card -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Lebih lengkap</h3>
              
              <div class="card-tools">
                <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            @csrf
              @method('PUT')
              
                  <div class="mailbox-read-info">
                    <h5>Informasi Pelapor</h5>
                    <h6>Nama           : {{ optional($reports->user)->name }}<br>
                      Sebagai          : {{ $reports->lpr_sebagai }}<br>
                      Jurusan          : {{ optional($reports->user)->jurusan }}<br>
                      Prodi            : {{ optional($reports->user)->prodi }}<br>
                      Kelas            : {{ optional($reports->user)->kelas }}<br>
                      Nomor Hp         : {{ optional($reports->user)->no_hp }}<br>
                      Di Laporkan tgl  : {{ $reports->created_at }}<br>
                      Identitas Pelaku : {{ $reports->informasi_pelaku }}<br>
                      Identitas Korban : {{ $reports->informasi_korban }}<br>
                      Area Kejadian    : {{ $reports->area_kejadian }}<br>
                      Bentuk Kekerasan : {{ $reports->bentuk_kekerasan }}<br>
                      Kronologi        : {{ $reports->kronologi }}<br>
                      Tanggal Kejadian : {{ $reports->tgl_kejadian }}<br>
                    </h6>
                  </div>
                  <!-- /.mailbox-read-message -->
                  <div class="card-footer bg-white">
                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                      <li>
                        <span class="mailbox-attachment-icon has-img">
                          <img src="{{ asset('storage/bukti/' . $reports->bukti) }}" alt="Attachment">
                        </span>
                        <div class="mailbox-attachment-info">
                          <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> $reports->bukti</a>
                          <span class="mailbox-attachment-size clearfix mt-1">
                            <span>2.67 MB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                          </span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                
            <!-- /.card-footer -->
            <div class="card-footer">
              <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../plugins/raphael/raphael.min.js"></script>
<script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
</body>
</html>
