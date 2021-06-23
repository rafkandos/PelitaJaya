<?php 
  include '../template/header.php'; 
  include_once("../connection.php");
  
  session_start();
  if(!isset($_SESSION['status'])){
    //melakukan pengalihan
    header("location:/pelitajaya/login.php");
  } 
  
  $query = "SELECT * FROM kelas";
  $dt_kelas = mysqli_query($mysqli, $query);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Kelas</h1>
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
              <div class="card-header border-transparent row">
                <!-- <h3 class="card-title">Latest Orders</h3> -->
                <!-- <div class="input-group col">
                  <?php if ($search != ''): ?>
                    <input type="text" class="form-control" placeholder="Search" id="searchBox" value="<?= $search ?>" aria-describedby="basic-addon2">
                  <?php else: ?>
                    <input type="text" class="form-control" placeholder="Search" id="searchBox" value="" aria-describedby="basic-addon2">
                  <?php endif ?>
                  <div class="input-group-append">
                  <button type="button" onclick="searchbar()" class="btn btn-primary">Search</button>
                  </div>
                </div> -->

                <div class="card-tools col d-flex justify-content-end">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">
                    Tambah Kelas
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
                      <th>Tingkat</th>
                      <th>Jurusan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($dt_kelas as $s) { ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $s["tingkat"]; ?></td>
                          <td><?= $s["jurusan"] ?></td>
                          <td>
                            <a onclick="update(
                              `<?= $s['id_kelas']; ?>`,
                              `<?= $s['tingkat']; ?>`, 
                              `<?= $s['jurusan']; ?>`,
                              )" class="btn btn-primary btn-sm" role="button">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="delete_kelas.php?id=<?= $s["id_kelas"] ?>" class="btn btn-danger btn-sm" role="button">
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
      <form action="add_kelas.php" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="tingkatAdd">Tingkat</label>
            <select class="form-control" name="tingkatAdd" id="tingkatAdd">
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          <div class="form-group">
            <label for="jurusanAdd">Jurusan</label>
            <input class="form-control" type="text" name="jurusanAdd" id="jurusanAdd" placeholder="Masukkan Jurusan">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="Submit" class="btn btn-primary" value="Save"></button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Update -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="update_kelas.php" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="hidden" name="idKelas" id="idKelas">
          <div class="form-group">
            <label for="tingkatUpdate">Tingkat</label>
            <select class="form-control" name="tingkatUpdate" id="tingkatUpdate">
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          <div class="form-group">
            <label for="jurusanUpdate">Jurusan</label>
            <input class="form-control" type="text" name="jurusanUpdate" id="jurusanUpdate" placeholder="Masukkan Jurusan">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="Submit" class="btn btn-primary" value="Save"></button>
        </div>
      </form>
    </div>
  </div>

<script>
  function update(idKelas,tingkatUpdate,jurusanUpdate) {
    $('#updateModal').modal('show');
    $("#idKelas").val(idKelas);
    $("#tingkatUpdate").val(tingkatUpdate);
    $("#jurusanUpdate").val(jurusanUpdate);
  }
  
  function searchbar() {
    window.location.href = "/pelitajaya/kelas/data_kelas.php?search="+$("#searchBox").val();
  }
</script>

<?php include '../template/footer.php'; ?>