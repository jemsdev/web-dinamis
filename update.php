<?php
  require_once 'connection.php';

  $id = $_GET['id'] ?? null;
  $nim = $_POST['nim'] ?? null;
  $namaMahasiswa = $_POST['nama_mahasiswa'] ?? null;
  $semester = $_POST['semester'] ?? null;
  $programStudi = $_POST['program_studi'] ?? null;

  if (
    isset($id) &&
    isset($nim) &&
    isset($namaMahasiswa) &&
    isset($semester) &&
    isset($programStudi)
  ) {
    $query = $conn->query("
      UPDATE mahasiswa
      SET
        nim = '$nim',
        nama = '$namaMahasiswa',
        semester = $semester,
        program_studi = '$programStudi'
      WHERE
        id = $id
    ");
    if ($query) {
      echo "<script>alert('Data mahasiswa berhasil diubah'); window.location.href='index.php'</script>";
    } else {
      echo "<script>alert('Data mahasiswa gagal diubah'); window.location.href='index.php'</script>";
    }
  } else {
    header('Location: index.php');
  }
?>