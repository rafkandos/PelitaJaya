<?php 
  include '../template/header.php'; 
  include_once("../connection.php");
  
  session_start();
  if(!isset($_SESSION['status'])){
    //melakukan pengalihan
    header("location:/pelitajaya/login.php");
  } 
  
  $query = "SELECT * FROM mapel";
  
  $search = isset($_GET["search"]) ? $_GET["search"] : '';
  if ($search != '') {
    $query .= " WHERE nama_mapel LIKE '%".$search."%'";
  }
  $dt_mapel = mysqli_query($mysqli, $query);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Mapel</h1>
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
                <div class="input-group col">
                  <?php if ($search != ''): ?>
                    <input type="text" class="form-control" placeholder="Search" id="searchBox" value="<?= $search ?>" aria-describedby="basic-addon2">
                  <?php else: ?>
                    <input type="text" class="form-control" placeholder="Search" id="searchBox" value="" aria-describedby="basic-addon2">
                  <?php endif ?>
                  <div class="input-group-append">
                  <button type="button" onclick="searchbar()" class="btn btn-primary">Search</button>
                  </div>
                </div>

                <div class="card-tools col d-flex justify-content-end">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">
                    Tambah Mapel
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
                      <th>Nama Mapel</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($dt_mapel as $s) { ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $s["nama_mapel"]; ?></td>
                          <td>
                            <a onclick="update(
                              `<?= $s['id_mapel']; ?>`,
                              `<?= $s['nama_mapel']; ?>`, 
                              )" class="btn btn-primary btn-sm" role="button">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="delete_mapel.php?id=<?= $s["id_mapel"] ?>" class="btn btn-danger btn-sm" role="button">
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
      <form action="add_mapel.php" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="namaAdd">Nama Mapel</label>
            <input class="form-control" type="text" name="namaAdd" id="namaAdd" placeholder="Masukkan nama mapel">
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
      <form action="update_mapel.php" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <input class="form-control" type="hidden" name="idMapel" id="idMapel">
          <div class="form-group">
            <label for="namaUpdate">Nama Mapel</label>
            <input class="form-control" type="text" name="namaUpdate" id="namaUpdate" placeholder="Masukkan nama mapel">
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
  function update(idMapel,namaUpdate) {
    $('#updateModal').modal('show');
    $("#namaUpdate").val(namaUpdate);
    $("#idMapel").val(idMapel);
  }
  
  function searchbar() {
    window.location.href = "/pelitajaya/mapel/data_mapel.php?search="+$("#searchBox").val();
  }
</script>

<?php include '../template/footer.php'; ?>