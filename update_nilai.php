<?php 
  if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('nilai.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["nilai"];
    $jsonfile = $jsonfile[$id];

  }

  if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('nilai.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["nilai"];
    $jsonfile = $jsonfile[$id];

    $post["id_nilai"] = isset($_POST["id_nilai"]) ? $_POST["id_nilai"] : "";
    $post["nim"] = isset($_POST["nim"]) ? $_POST["nim"] : "";
    $post["nm_mhs"] = isset($_POST["nm_mhs"]) ? $_POST["nm_mhs"] : "";
    $post["nm_matkul"] = isset($_POST["nm_matkul"]) ? $_POST["nm_matkul"] : "";
    $post["nilai_absensi"] = isset($_POST["nilai_absensi"]) ? $_POST["nilai_absensi"] : "";
    $post["nilai_tugas"] = isset($_POST["nilai_tugas"]) ? $_POST["nilai_tugas"] : "";
    $post["nilai_uts"] = isset($_POST["nilai_uts"]) ? $_POST["nilai_uts"] : "";
    $post["nilai_uas"] = isset($_POST["nilai_uas"]) ? $_POST["nilai_uas"] : "";

    if ($jsonfile) {
      unset($all["nilai"][$id]);
      $all["nilai"][$id] = $post;
      $all["nilai"] = array_values($all["nilai"]);
      file_put_contents("nilai.json", json_encode($all));
    }
    header("Location: nilai.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="JSON-PHP-CRUD-BOOTSTRAP">
  <meta name="author" content="Fahmi Sulaiman">
  <title>Latihan Web Service 7 : CRUD PHP data JSON Tanpa Databsae</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/latwebservice3.css">
  <style type="text/css">
    .navbar-default {
      background-color: #3b5998;
      font-size: 18px;
      color: #ffffff;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h4>STMIK IKMI CIREBON</h4>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar"></div>
    </div>
  </nav>
<!-- tutup navbar -->
  <div class="container">
    <div class="row">
      <div class="row">
        <h3>Ubah Data Nilai Mahasiswa</h3>
      </div>

      <?php 
        if (isset($_GET["id"])) :
      ?>

      <form action="update_nilai.php" method="POST">
          <div class="col-md-6">
            <input type="hidden" value="<?= $id ?>" name="id">
            <div class="form-group">
              <label for="id_nilai">ID Nilai</label>
              <input type="text" name="id_nilai" id="id_nilai" class="form-control"
              value="<?= $jsonfile["id_nilai"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_nim">Nomor Induk Mahasiswa</label>
              <input type="text" name="nim" id="input_nim" class="form-control"
              value="<?= $jsonfile["nim"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="nama_mhs">Nama Mahasiswa</label>
              <input type="text" name="nm_mhs" id="nama_mhs" class="form-control"
              value="<?= $jsonfile["nm_mhs"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="nama_mk">Nama Mata Kuliah</label>
              <input class="form-control" name="nm_matkul" id="nama_mk" 
                value="<?= $jsonfile["nm_matkul"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="nilai_absen">Nilai Absensi</label>
              <input class="form-control" name="nilai_absensi" id="nilai_absen" 
                value="<?= $jsonfile["nilai_absensi"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="nilai_tgs">Nilai Tugas</label>
              <input class="form-control" name="nilai_tugas" id="nilai_tgs" 
                value="<?= $jsonfile["nilai_tugas"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_nilai_uts">Nilai UTS</label>
              <input type="text" name="nilai_uts" id="input_nilai_uts" class="form-control"
              value="<?= $jsonfile["nilai_uts"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_nilai_uas">Nilai UAS</label>
              <input type="text" name="nilai_uas" id="input_nilai_uas" class="form-control"
              value="<?= $jsonfile["nilai_uas"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-action">
              <button class="btn btn-primary" type="submit">UBAH DATA</button>
              <a href="nilai.php" class="btn btn btn-default">KEMBALI</a>
            </div>
          </div>
      </form>
        <?php endif; ?>
    </div>
  </div>
</body>
</html>