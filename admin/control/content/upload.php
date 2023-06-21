<?php
session_start();
if (!isset($_SESSION["admin"])){
  header ("Location: ../../login.php");
  exit;
}
require '../../functions.php';

$id = $_GET["ID"];

if (uploadcontent($id)){
    echo "
      <script>
        alert('Permintaan berhasil diupload!');
        document.location.href = 'Ccontent.php';
      </script>
    ";
}else {
    echo "
        <script>
        alert('Permintaan gagal diupload!');
        document.location.href = 'Ccontent.php';
        </script>
    ";
}
