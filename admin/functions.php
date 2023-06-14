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

// Content, Member, Latespost
    function uploadcontent($data){
        global $conn;
        $query = "UPDATE konten_history SET
                    STATUS_ID = 2 WHERE ID = $data";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function rejectcontent($data){
        global $conn;
        $query = "UPDATE konten_history SET
                    STATUS_ID = 3 WHERE ID = $data";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function updatemember($data){
        global $conn;
        $id = htmlspecialchars($data["id"]);
        $status = htmlspecialchars($data["status"]);
        $email = $data["email"];
        $query = "UPDATE users SET
                    STATUS_ID = $status WHERE ID = $id";
        mysqli_query($conn,$query);
        // Kirim Email
        // ini_set( 'display_errors', 1 );   
        // error_reporting( E_ALL );    
        // $from = "21082010042@student.upnjatim.ac.id";    
        // $to = $email;    
        // $subject = "Verifikasi Akun SIKOMEDI";    
        // $message = "Status Akun SIKOMEDI Anda : ".$status;   
        // $headers = "From:" . $from;    
        // mail($to,$subject,$message, $headers); 
        // return mysqli_affected_rows($conn);
    }
    function updatelatestpost($data){
        global $conn;
        $id = htmlspecialchars($data["id"]);
        $url = htmlspecialchars($data["url"]);
        $judul = htmlspecialchars($data["judul"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);
        $caption = htmlspecialchars($data["caption"]);
        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
        } else {
            $gambar = uploadgambar();
        }
        $query = "UPDATE instagram SET
                    `URL` = '$url',
                    JUDULPOSTINGAN ='$judul',
                    SOURCE = '$gambar',
                    CAPTION = '$caption' WHERE ID = $id";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function uploadgambar() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        if ($error === 4 ){
            echo "<script>
                    alert('Pilih gambar terlebih dahulu!')
                  </script>";
            return false;
        }
        $ekstensigambarvalid = ['jpg','jpeg','png'];
        $ekstensigambar = explode ('.', $namaFile);
        $ekstensigambar = strtolower(end($ekstensigambar));
        if (!in_array ($ekstensigambar, $ekstensigambarvalid)) {
            echo "<script>
                    alert('Upload file dengan ekstensi jpg/jpeg/png!')
                  </script>";
            return false;
        }
        if ($ukuranFile > 10000000) {
            echo "<script>
                    alert('Ukuran terlalu besar!')
                  </script>";
            return false;
        }
        $namaFileBaru = uniqid();
        $namaFileBaru.= '.';
        $namaFileBaru.= $ekstensigambar;
        move_uploaded_file($tmpName,'../../../assets/img/'. $namaFileBaru);
        return $namaFileBaru;
    }
?>