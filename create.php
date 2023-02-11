<?php
  require_once 'connection.php';

  $nim = $_POST['nim'] ?? null;
  $namaMahasiswa = $_POST['nama_mahasiswa'] ?? null;
  $semester = $_POST['semester'] ?? null;
  $programStudi = $_POST['program_studi'] ?? null;

  if (
    isset($nim) &&
    isset($namaMahasiswa) &&
    isset($semester) &&
    isset($programStudi)
  ) {
    $query = $conn->query("INSERT INTO mahasiswa VALUES (null, '$nim', '$namaMahasiswa', $semester, '$programStudi')");
    if ($query) {
      echo "<script>alert('Data mahasiswa berhasil ditambahkan'); window.location.href='index.php'</script>";
    } else {
      echo "<script>alert('Data mahasiswa gagal ditambahkan'); window.location.href='index.php'</script>";
    }
  } else {
    header('Location: index.php');
  }
?>