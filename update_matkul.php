<?php
  require_once 'connection.php';

  $id = $_GET['id'] ?? null;
  $kode_matkul = $_POST['kode_matkul'] ?? null;
  $nama_matkul = $_POST['nama_matkul'] ?? null;
  $nama_dosen = $_POST['nama_dosen'] ?? null;

  var_dump($kode_matkul);

  if (
    isset($id) &&
    isset($kode_matkul) &&
    isset($nama_matkul) &&
    isset($nama_dosen)
  ) {
    $query = $conn->query("
      UPDATE mata_kuliah
      SET
        kode_matkul = '$kode_matkul',
        nama_matkul = '$nama_matkul',
        nama_dosen = '$nama_dosen'
      WHERE
        id = '$id'
    ");
    if ($query) {
      echo "<script>alert('Data mahasiswa berhasil diubah'); window.location.href='matkul.php'</script>";
    } else {
      echo "<script>alert('Data mahasiswa gagal diubah'); window.location.href='matkul.php'</script>";
    }
  } else {
    header('Location: matkul.php');
  }
?>