<?php
  require_once 'connection.php';

  $kode_matkul = $_POST['kode_matkul'] ?? null;
  $nama_matkul = $_POST['nama_matkul'] ?? null;
  $nama_dosen = $_POST['nama_dosen'] ?? null;

  if (
    isset($kode_matkul) &&
    isset($nama_matkul) &&
    isset($nama_dosen)
  ) {
    $query = $conn->query("INSERT INTO mata_kuliah VALUES (null, '$kode_matkul', '$nama_matkul', '$nama_dosen')");
    if ($query) {
      echo "<script>alert('Data mata kuliah berhasil ditambahkan'); window.location.href='matkul.php'</script>";
    } else {
      echo "<script>alert('Data mata kuliah gagal ditambahkan'); window.location.href='matkul.php'</script>";
    }
  } else {
    header('Location: matkul.php');
  }
?>