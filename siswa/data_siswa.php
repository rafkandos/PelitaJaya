<?php 
  include '../template/header.php'; 
  include_once("../connection.php");
   
  $dt_siswa = mysqli_query($mysqli, "SELECT * FROM siswa s JOIN kelas k ON s.id_kelas = k.id_kelas");
  $dt_kelas = mysqli_query($mysqli, "SELECT * FROM kelas");
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
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">
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
                            <a href="delete_siswa.php?id=<?= $s["id_siswa"] ?>" class="btn btn-danger btn-sm" role="button">
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

  <!-- Modal Add -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="add_siswa.php" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="namaAdd">Nama Siswa</label>
            <input class="form-control" type="text" name="namaAdd" id="namaAdd" placeholder="Masukkan nama siswa">
          </div>
          <div class="form-group">
            <label for="tempatAdd">Tempat Lahir</label>
            <input class="form-control" type="text" name="tempatAdd" id="tempatAdd" placeholder="Masukkan tempat lahir">
          </div>
          <div class="form-group">
            <label for="dateAdd">Tanggal Lahir</label>
            <input class="form-control" type="date" name="dateAdd" id="dateAdd" placeholder="Masukkan tanggal lahir">
          </div>
          <div class="form-group">
            <label for="jkelAdd">Jenis Kelamin</label>
            <select class="form-control" name="jkelAdd" id="jkelAdd">
              <option value="L">Laki - laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="agamaAdd">Agama</label>
            <input class="form-control" type="text" name="agamaAdd" id="agamaAdd" placeholder="Masukkan agama">
          </div>
          <div class="form-group">
            <label for="kelasAdd">Kelas</label>
            <select class="form-control" name="kelasAdd" id="kelasAdd">
              <?php foreach ($dt_kelas as $k) { ?>
                <option value="<?= $k["id_kelas"]; ?>"><?= $k["tingkat"] . " " . $k["jurusan"] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="Submit" class="btn btn-primary" value="Save"></button>
        </div>
      </form>
    </div>
  </div>

<?php include '../template/footer.php'; ?>