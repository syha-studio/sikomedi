<?php
include('functions.php');
require_once("vendor/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($conn,"SELECT u.NAME user, m.NAMA media, j.NAMA jenis,  k.TANGGALPOSTING tanggal, k.JUDULPOSTING judul, s.NAMA as `status` FROM konten_history k
        JOIN users u ON (k.USER_ID = u.ID) JOIN media m ON (k.MEDIA_ID = m.ID) JOIN status_konten s ON (k.STATUS_ID = s.ID)
        JOIN jenis_konten j ON (m.JENIS_ID = j.ID) ORDER BY `status`, tanggal DESC");
$html = '<center><h3>Posts History</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No.</th>
<th>User</th>
<th>Media</th>
<th>Jenis</th>
<th>Tanggal Posting</th>
<th>Judul Postingan</th>
<th>Status</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query))
{
    $html .="<tr>
    <td>".$no."</td>
    <td>".$row['user']."</td>
    <td>".$row['media']."</td>
    <td>".$row['jenis']."</td>
    <td>".$row['tanggal']."</td>
    <td>".$row['judul']."</td>
    <td>".$row['status']."</td>
    </tr>';
    ";
    $no++;
}
$html .= "</html>";
$dompdf ->loadHtml($html);

$dompdf ->setPaper('A4','potrait');

$dompdf ->render();

$dompdf ->stream('Konten_History.pdf');

header ("Location: Rtable.php");
