  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script type="text/javascript">

  var dashboard = document.getElementById('dashboardPage');
  var siswa = document.getElementById('siswaPage');
  var guru = document.getElementById('guruPage');
  var kelas = document.getElementById('kelasPage');
  var mapel = document.getElementById('mapelPage');

  if (window.location.href.indexOf("index") > -1) {
      dashboard.classList.add("active");
      siswa.classList.remove("active");
      guru.classList.remove("active");
      kelas.classList.remove("active");
      mapel.classList.remove("active");
    }
    if (window.location.href.indexOf("data_siswa") > -1) {
      dashboard.classList.remove("active");
      siswa.classList.add("active");
      guru.classList.remove("active");
      kelas.classList.remove("active");
      mapel.classList.remove("active");
    }
    if (window.location.href.indexOf("data_guru") > -1) {
      dashboard.classList.remove("active");
      siswa.classList.remove("active");
      guru.classList.add("active");
      kelas.classList.remove("active");
      mapel.classList.remove("active");
    }
    if (window.location.href.indexOf("data_kelas") > -1) {
      dashboard.classList.remove("active");
      siswa.classList.remove("active");
      guru.classList.remove("active");
      kelas.classList.add("active");
      mapel.classList.remove("active");
    }
    if (window.location.href.indexOf("data_mapel") > -1) {
      dashboard.classList.remove("active");
      siswa.classList.remove("active");
      guru.classList.remove("active");
      kelas.classList.remove("active");
      mapel.classList.add("active");
    }

</script>

<!-- jQuery -->
<script src="/pelitajaya/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/pelitajaya/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/pelitajaya/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/pelitajaya/assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/pelitajaya/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/pelitajaya/assets/plugins/raphael/raphael.min.js"></script>
<script src="/pelitajaya/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/pelitajaya/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="/pelitajaya/assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="/pelitajaya/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/pelitajaya/assets/dist/js/pages/dashboard2.js"></script>
</body>
</html>