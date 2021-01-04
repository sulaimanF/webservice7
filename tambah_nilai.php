<?php 
  if (!empty($_POST)) {
    // post value
    $id_nilai  = $_POST['id_nilai'];
    $nim  = $_POST['nim'];
    $nm_mhs  = $_POST['nm_mhs'];
    $nm_matkul  = $_POST['nm_matkul'];
    $nilai_absensi  = $_POST['nilai_absensi'];
    $nilai_tugas = $_POST['nilai_tugas'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];

    // membaca semua data yang ada di file mahasiswa.json
    // dalam bentuk string
    $file = file_get_contents('nilai.json');
    // menerjemahkan string json dengan kata lain,
    // mengubah string json menjadi variabel PHP
    $data = json_decode($file, true);
    // digunakan untuk membuat file target menjadi kosong saat mengapus kontennya
    // membetalkan inisialisasi variabel PHP, sehingga membuat kosong
    unset($_POST["add"]);
    // mengembalikan fungsi array yang berisi semua nilai-nilai array
    $data["nilai"] = array_values($data["nilai"]);
    // menambah 1 atau beberapa elemen pada array
    array_push($data["nilai"], $_POST);
    // fungsi json_encode untuk mengubah format data array menjadi json
    file_put_contents('nilai.json', json_encode($data));
    header("location: nilai.php");

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
      <div class="col-sm-5 col-sm-offset-3">
        <h3>Tambah Data Nilai Mahasiswa</h3>
        <form method="POST" action="">
          <div class="form-group">
            <label for="id_nilai">ID Nilai</label>
            <input type="text" name="id_nilai" id="id_nilai" class="form-control" required="required" placeholder="ID Nilai">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_nim">Nomor Induk Mahasiswa</label>
            <input type="text" name="nim" id="input_nim" class="form-control" required="required" placeholder="NIM">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="nama_mhs">Nama Mahasiswa</label>
            <input type="text" name="nm_mhs" id="nama_mhs" class="form-control" required="required" placeholder="Nama Lengkap">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="nama_mk">Nama Mata Kuliah</label>
            <input type="text" name="nm_matkul" id="nama_mk" class="form-control" required="required" placeholder="Nama Mata kuliah">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="nilai_absen">Nilai Absensi</label>
            <input type="text" name="nilai_absensi" id="nilai_absen" class="form-control" required="required" placeholder="Nilai Absensi">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="nilai_tgs">Nilai Tugas</label>
            <input type="text" name="nilai_tugas" id="nilai_tgs" class="form-control" required="required" placeholder="Nilai Tugas">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_nilai_uts">Nilai UTS</label>
            <input type="text" name="nilai_uts" id="input_nilai_uts" class="form-control" required="required" placeholder="Nilai UTS">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_nilai_uas">Nilai UAS</label>
            <input type="text" name="nilai_uas" id="input_nilai_uas" class="form-control" required="required" placeholder="Nilai UAS">
            <span class="help-block"></span>
          </div>
          <div class="form-action">
            <button class="btn btn-success" type="submit">TAMBAH</button>
            <a href="nilai.php" class="btn btn btn-default">BACK</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>