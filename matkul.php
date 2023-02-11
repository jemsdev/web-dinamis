<?php require_once 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
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
    
    <h1>Daftar Mata Kuliah</h1>

    <?php
      $id = $_GET['id'] ?? null;

      $kode_matkul = '';
      $nama_matkul = '';
      $nama_dosen = '';

      if (isset($id)) {
        $query = $conn->query("SELECT * FROM mata_kuliah WHERE id = '$id'");
        foreach ($query as $data) {
          $kode_matkul = $data['kode_matkul'];
          $nama_matkul = $data['nama_matkul'];
          $nama_dosen = $data['nama_dosen'];
        }
      }
    ?>

    <form method="post" action="<?= isset($id) ? "update_matkul.php?id=$id" : 'create_matkul.php' ?>">
      <input type="text" name="kode_matkul" placeholder="Masukkan kode matkul" value="<?= $kode_matkul ?>">
      <input type="text" name="nama_matkul" placeholder="Masukkan nama mata kuliah" value="<?= $nama_matkul ?>">
      <input type="text" name="nama_dosen" placeholder="Masukkan nama dosen" value="<?= $nama_dosen ?>">
      <?php if (isset($id)): ?>
        <div class="button-group">
          <button type="submit">Ubah Mata Kuliah</button>
          <a href="matkul.php">Cancel</a>
        </div>
      <?php else: ?>
        <div class="button-group">
          <button type="submit">Tambah Mata Kuliah</button>
        </div>
      <?php endif; ?>
    </form>

    <section>
      <table border="1">
        <tr>
          <th>No</th>
          <th>Kode Matkul</th>
          <th>Nama Mata Kuliah</th>
          <th>Nama Dosen</th>
          <th>Action</th>
        </tr>
        <?php
          $q = $conn->query("SELECT * FROM mata_kuliah");
          $i = 1;
          while ($data = $q->fetch_assoc()):
        ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $data['kode_matkul'] ?></td>
          <td><?= $data['nama_matkul'] ?></td>
          <td><?= $data['nama_dosen'] ?></td>
          <td>
            <a href="matkul.php?id=<?= $data['id'] ?>">Ubah</a>
            <a href="delete_matkul.php?id=<?= $data['id'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile;?>
      </table>
    </section>
  </body>
</html>