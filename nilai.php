<?php 
    // membaca semua data yang ada di file people.json
    // dalam bentuk string
    $getfile = file_get_contents('nilai.json');
    // menerjemahkan stirng json dengan kata lain,
    // mengubah string json menjadi varibel PHP
    $jsonfile = json_decode($getfile);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Fahmi Sulaiman">
  <title>Latihan Web Service 7 : CRUD PHP data JSON Tanpa Databsae</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/latwebservice3.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="tampil.php" class="navbar-brand">STMIK IKMI CIREBON</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li class="clr1 active"><a href="tampil.php">HOME</a></li>
          <li class="clr2"><a href="tampil_mhs.php">MAHASISWA</a></li>
          <li class="clr3"><a href="tampil_dsn.php">DOSEN</a></li>
          <li class="clr3"><a href="tampil_mk.php">MATA KULIAH</a></li>
          <li class="clr3"><a href="nilai.php">NILAI MAHASISWA</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br>
  <div class="container">
    <div class="jumbotron">
      <h3>Latihan Web Service - Pertemuan 7</h3>
      <p>Create, Read, Update, and Delete Data From JSON</p>
    </div>
  </div>
  <div class="container">
    <div class="btn-toolbar">
      <a href="tambah_nilai.php" class="btn btn-primary"><i class="icon-plus"></i>Tambah Data</a>
      <div class="btn-group">
      
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <table class="table table-striped table-bordered table-hover">
          <tr>
            <th>No.</th>
            <th>ID Nilai</th>
            <th>Nomor Induk Mahasiswa</th>
            <th>Nama mahasiswa</th>
            <th>Nama Mata Kuliah</th>
            <th>Nilai Absensi</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>NIlai Akhir</th>
            <th>Action</th>
          </tr>
          <?php 
            $no = 0;
            foreach ($jsonfile->nilai as $index => $obj) : $no++;
              $nilai_akhir=((($obj->nilai_absensi)*0.1)+
                            (($obj->nilai_tugas)*0.15)+
                            (($obj->nilai_uts)*0.25)+
                            (($obj->nilai_uas)*0.5
                          ));
          ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $obj->id_nilai; ?></td>
            <td><?= $obj->nim; ?></td>
            <td><?= $obj->nm_mhs; ?></td>
            <td><?= $obj->nm_matkul; ?></td>
            <td><?= $obj->nilai_absensi; ?></td>
            <td><?= $obj->nilai_tugas; ?></td>
            <td><?= $obj->nilai_uts; ?></td>
            <td><?= $obj->nilai_uas; ?></td>
            <td><?= $nilai_akhir; ?></td>
            <td>
              <a class="btn btn-xs btn-primary" href="update_nilai.php?id=<?= $index; ?>">Edit</a>
              <a class="btn btn-xs btn-danger" href="delete_nilai.php?id=<?= $index; ?>">Delete</a>
            </td>
          </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>