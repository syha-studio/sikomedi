<?php
//koneksi ke database ============================================================================
$conn = mysqli_connect("localhost","root","","sikomedi");
//umum ===========================================================================================
function query ($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}
// Register
function register ($data) {
    global $conn;
    $name = strtolower (stripslashes($data["name"]));
    $email = strtolower (stripslashes($data["email"]));
    $sandi = mysqli_real_escape_string($conn,$data["sandi"]);
    $sandi2 = mysqli_real_escape_string($conn,$data["sandi2"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $status = htmlspecialchars($data["status"]);
    $jenis = htmlspecialchars($data["jenis"]);

    $result = mysqli_query($conn,"SELECT NAME FROM users WHERE NAME ='$name'");
    if (mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username sudah dipakai');
        </script>";
        return false;
    }

    if ($sandi !== $sandi2){
        echo "<script>
            alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;
    }
    $sandi = password_hash($sandi, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES (null,'$name','$sandi','$email','$nohp',$jenis,$status)";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
//submission =========================================================================================
function tambahkonten ($data) {
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $status = htmlspecialchars($data["status"]);
    $media = htmlspecialchars($data["media"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $judul = htmlspecialchars($data["judul"]);
    $link = htmlspecialchars($data["link"]);
    $caption = htmlspecialchars($data["caption"]);
    
    $query = "INSERT INTO konten_history VALUES ('','$id','$media','$tanggal','$judul','$link','$caption','$status')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function batalsubmit ($id){
    global $conn;
    $query = "DELETE FROM konten_history WHERE ID = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>