<?php 
  include '../template/header.php'; 
  include_once("../connection.php");
  
  session_start();
  if(!isset($_SESSION['status'])){
    //melakukan pengalihan
    header("location:/pelitajaya/login.php");
  } 

  $query = "SELECT * FROM guru s JOIN mapel k ON s.id_mapel = k.id_mapel";
  
  $search = isset($_GET["search"]) ? $_GET["search"] : '';
  if ($search != '') {
    $query .= " WHERE nama_guru LIKE '%".$search."%'";
  }
  $dt_guru = mysqli_query($mysqli, $query);
  $dt_mapel = mysqli_query($mysqli, "SELECT * FROM mapel");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Guru</h1>
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
                    Tambah Guru
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
                      <th>Nama Guru</th>
                      <th>TTL</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Mapel</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($dt_guru as $s) { ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $s["nama_guru"]; ?></td>
                          <td><?= $s["tempat_lahir"] . ", " . date("d M Y", strtotime($s["tgl_lahir"])) ?></td>
                          <td><?= $s["jkel"] ?></td>
                          <td><?= $s["agama"] ?></td>
                          <td><?= $s["nama_mapel"] ?></td>
                          <td>
                            <a onclick="update(
                              `<?= $s['id_guru']; ?>`,
                              `<?= $s['nama_guru']; ?>`, 
                              `<?= $s['tempat_lahir']; ?>`,
                              `<?= $s['tgl_lahir']; ?>`,
                              `<?= $s['jkel']; ?>`,
                              `<?= $s['agama']; ?>`,
                              `<?= $s['id_mapel']; ?>`
                              )" class="btn btn-primary btn-sm" role="button">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="delete_guru.php?id=<?= $s["id_guru"] ?>" class="btn btn-danger btn-sm" role="button">
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
      <form action="add_guru.php" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="namaAdd">Nama guru</label>
            <input class="form-control" type="text" name="namaAdd" id="namaAdd" placeholder="Masukkan nama guru">
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
            <label for="mapelAdd">Mapel</label>
            <select class="form-control" name="mapelAdd" id="mapelAdd">
              <?php foreach ($dt_mapel as $k) { ?>
                <option value="<?= $k["id_mapel"]; ?>"><?= $k["nama_mapel"] ?></option>
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

  <!-- Modal Update -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="update_guru.php" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <input class="form-control" type="hidden" name="idGuru" id="idGuru" placeholder="Masukkan nama guru">
          <div class="form-group">
            <label for="namaUpdate">Nama guru</label>
            <input class="form-control" type="text" name="namaUpdate" id="namaUpdate" placeholder="Masukkan nama guru">
          </div>
          <div class="form-group">
            <label for="tempatUpdate">Tempat Lahir</label>
            <input class="form-control" type="text" name="tempatUpdate" id="tempatUpdate" placeholder="Masukkan tempat lahir">
          </div>
          <div class="form-group">
            <label for="dateUpdate">Tanggal Lahir</label>
            <input class="form-control" type="date" name="dateUpdate" id="dateUpdate" placeholder="Masukkan tanggal lahir">
          </div>
          <div class="form-group">
            <label for="jkelUpdate">Jenis Kelamin</label>
            <select class="form-control" name="jkelUpdate" id="jkelUpdate">
              <option value="L">Laki - laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="agamaUpdate">Agama</label>
            <input class="form-control" type="text" name="agamaUpdate" id="agamaUpdate" placeholder="Masukkan agama">
          </div>
          <div class="form-group">
            <label for="mapelUpdate">Mapel</label>
            <select class="form-control" name="mapelUpdate" id="mapelUpdate">
              <?php foreach ($dt_mapel as $k) { ?>
                <option value="<?= $k["id_mapel"]; ?>"><?= $k["nama_mapel"] ?></option>
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

<script>
  function update(idSiswa,namaUpdate,tempatUpdate,dateUpdate,jkelUpdate,agamaUpdate,mapelUpdate) {
    $('#updateModal').modal('show');
    $("#namaUpdate").val(namaUpdate);
    $("#tempatUpdate").val(tempatUpdate);
    $("#dateUpdate").val(dateUpdate);
    $("#jkelUpdate").val(jkelUpdate);
    $("#agamaUpdate").val(agamaUpdate);
    $("#mapelUpdate").val(mapelUpdate);
    $("#idGuru").val(idSiswa);
  }
  
  function searchbar() {
    window.location.href = "/pelitajaya/guru/data_guru.php?search="+$("#searchBox").val();
  }
</script>

<?php include '../template/footer.php'; ?>