<?php 
  include 'template/header.php'; 
  include_once("connection.php");
   
  $dt_siswa = mysqli_query($mysqli, "SELECT * FROM siswa s JOIN kelas k ON s.id_kelas = k.id");
  $rows = mysqli_num_rows($dt_siswa);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Siswa</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <!-- <h3 class="card-title">Latest Orders</h3> -->

                <div class="card-tools">
                  <button type="button" class="btn btn-info">
                    Tambah Siswa
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama Siswa</th>
                      <th>TTL</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Kelas</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($dt_siswa as $s) { ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $s["nama_siswa"]; ?></td>
                          <td><?= $s["tempat_lahir"] . ", " . date("d M Y", strtotime($s["tgl_lahir"])) ?></td>
                          <td><?= $s["jkel"] ?></td>
                          <td><?= $s["agama"] ?></td>
                          <td><?= $s["tingkat"] . " " . $s["jurusan"] ?></td>
                          <td>
                            <a href="#" class="btn btn-primary btn-sm" role="button">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" role="button">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'template/footer.php'; ?>