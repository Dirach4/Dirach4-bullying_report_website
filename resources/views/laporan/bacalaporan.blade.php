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
  <style>
    .print-only {
      display: none;
    }
    @media print {
      body * {
        visibility: hidden;
      }
      #print-section, #print-section * {
        visibility: visible;
      }
      #print-section {
        position: absolute;
        left: 0;
        top: 0;
      }
      #print-section .print-only {
        display: block;
      }
      #print-section img {
        display: block;
        max-width: 100%;
        height: auto;
      }
    }
    /* The Modal (background) */
    .modal {
      display: none; 
      position: fixed; 
      z-index: 1; 
      padding-top: 60px; 
      left: 0;
      top: 0;
      width: 100%;
      height: 100%; 
      overflow: auto; 
      background-color: rgb(0,0,0); 
      background-color: rgba(0,0,0,0.4); 
    }

    /* Modal Content (image) */
    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    /* Caption of Modal Image */
    .caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }

    /* Add Animation - Zoom in the Modal */
    .modal-content, .caption { 
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
      from {-webkit-transform: scale(0)} 
      to {-webkit-transform: scale(1)}
    }

    @keyframes zoom {
      from {transform: scale(0.1)} 
      to {transform: scale(1)}
    }

    /* The Close Button */
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
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
              
                  <div class="mailbox-read-info" id="print-section">
                    <h5>Informasi Pelapor</h5>
                    <h6>Nama           : {{ optional($report->user)->name }}<br>
                      Sebagai          : {{ $report->lpr_sebagai }}<br>
                      Jurusan          : {{ optional($report->user)->jurusan }}<br>
                      Prodi            : {{ optional($report->user)->prodi }}<br>
                      Kelas            : {{ optional($report->user)->kelas }}<br>
                      Nomor Hp         : {{ optional($report->user)->no_hp }}<br>
                      Di Laporkan tgl  : {{ $report->created_at }}<br>
                      Identitas Pelaku : {{ $report->informasi_pelaku }}<br>
                      Identitas Korban : {{ $report->informasi_korban }}<br>
                      Area Kejadian    : {{ $report->area_kejadian }}<br>
                      Bentuk Kekerasan : {{ $report->bentuk_kekerasan }}<br>
                      Kronologi        : {{ $report->kronologi }}<br>
                      Tanggal Kejadian : {{ $report->tgl_kejadian }}<br>
                      <br>
                      <img src="{{ asset('storage/bukti/' . $report->bukti) }}" alt="Bukti Gambar" class="print-only" style="width: 100%; max-width: 500px; height: auto;">
                    </h6>
                  </div>
                  <!-- /.mailbox-read-message -->
                  <div class="card-footer bg-white">
                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                      <li>
                        <span class="mailbox-attachment-icon has-img">
                          <img src="{{ asset('storage/bukti/' . $report->bukti) }}" alt="Attachment" id="bukti-gambar">
                        </span>
                        <div class="mailbox-attachment-info">
                          <a href="#" class="mailbox-attachment-name" id="bukti-link"><i class="fas fa-camera"></i> {{$report->bukti}}</a>
                          <span class="mailbox-attachment-size clearfix mt-1">
                          </span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                
            <!-- /.card-footer -->
            <div class="card-footer">
              <button type="button" class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
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
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption" class="caption"></div>
</div>
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
<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById("bukti-gambar");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  var link = document.getElementById("bukti-link");

  link.onclick = function(event){
    event.preventDefault();
    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() { 
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
</body>
</html>
