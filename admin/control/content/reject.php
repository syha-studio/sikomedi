<?php
session_start();
if (!isset($_SESSION["admin"])){
  header ("Location: ../../login.php");
  exit;
}
require '../../functions.php';

$id = $_GET["ID"];

if (rejectcontent($id)){
    echo "
      <script>
        alert('Permintaan berhasil ditolak!');
        document.location.href = 'Ccontent.php';
      </script>
    ";
  }else {
    echo "
      <script>
        alert('Permintaan gagal ditolak!');
        document.location.href = 'Ccontent.php';
      </script>
    ";
  }
?>