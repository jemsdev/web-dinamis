<?php
  require_once 'connection.php';

  $id = $_GET['id'] ?? null;

  if (isset($id)) {
    $query = $conn->query("DELETE FROM mahasiswa WHERE id = $id");
    if ($query) {
      echo "<script>alert('Data mahasiswa berhasil dihapus'); window.location.href='index.php'</script>";
    } else {
      echo "<script>alert('Data mahasiswa gagal dihapus'); window.location.href='index.php'</script>";
    }
  } else {
    header('Location: index.php');
  }
?>