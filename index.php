<?php require_once 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <div class="topnav">
      <a href="index.php">Mahasiswa</a>
      <a href="matkul.php">Mata Kuliah</a>
    </div>
    <h1>Daftar Mahasiswa</h1>

    <?php
      $id = $_GET['id'] ?? null;

      $nim = '';
      $namaMahasiswa = '';
      $semester = '';
      $programStudi = '';

      if (isset($id)) {
        $query = $conn->query("SELECT * FROM mahasiswa WHERE id = '$id'");
        foreach ($query as $data) {
          $nim = $data['nim'];
          $namaMahasiswa = $data['nama'];
          $semester = $data['semester'];
          $programStudi = $data['program_studi'];
        }
      }
    ?>

    <form method="post" action="<?= isset($id) ? "update.php?id=$id" : 'create.php' ?>">
      <input type="text" name="nim" placeholder="Masukkan nim" value="<?= $nim ?>">
      <input type="text" name="nama_mahasiswa" placeholder="Masukkan nama mahasiswa" value="<?= $namaMahasiswa ?>">
      <input type="number" name="semester" placeholder="Masukkan semester" value="<?= $semester ?>">
      <input type="text" name="program_studi" placeholder="Masukkan program studi" value="<?= $programStudi ?>">
      <?php if (isset($id)): ?>
        <div class="button-group">
          <button type="submit">Ubah Mahasiswa</button>
          <a href="index.php">Cancel</a>
        </div>
      <?php else: ?>
        <div class="button-group">
          <button type="submit">Tambah Mahasiswa</button>
        </div>
      <?php endif; ?>
    </form>

    <section>
      <table border="1">
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Semester</th>
          <th>Program Studi</th>
          <th>Action</th>
        </tr>
        <?php
          $q = $conn->query("SELECT * FROM mahasiswa");
          $i = 1;
          while ($data = $q->fetch_assoc()):
        ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $data['nim'] ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['semester'] ?></td>
          <td><?= $data['program_studi'] ?></td>
          <td>
            <a href="index.php?id=<?= $data['id'] ?>">Ubah</a>
            <a href="delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile;?>
      </table>
    </section>
  </body>
</html>