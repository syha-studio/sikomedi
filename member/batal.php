<?php
session_start();
if (!isset($_SESSION["login"])){
  header ("Location: login.php");
  exit;
}
require 'functions.php';
$name = $_GET["name"];
$id = $_GET["ID"];

if ( batalsubmit($id)){
    echo "
      <script>
        alert('Permintaan berhasil dibatalkan!');
        document.location.href = 'submission.php?name=$name';
      </script>
    ";
  }else {
    echo "
      <script>
        alert('Permintaan berhasil dibatalkan!');
        document.location.href = 'submission.php?name=$name';
      </script>
    ";
  }
?>