<?php
include('functions.php');
require_once("vendor/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($conn,"SELECT COUNT(k.ID) AS 'CONTENTS', u.NAME name, u.EMAIL email, u.NOHP nohp FROM konten_history k
        JOIN users u ON (k.USER_ID=u.ID) GROUP BY u.NAME ORDER BY CONTENTS DESC LIMIT 10");
$html = '<center><h3>Top 10 Contents Contributor</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>No HP</th>
<th>Total Contents</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query))
{
    $html .="<tr>
    <td>".$no."</td>
    <td>".$row['name']."</td>
    <td>".$row['email']."</td>
    <td>".$row['nohp']."</td>
    <td>".$row['CONTENTS']."</td>
    </tr>';
    ";
    $no++;
}
$html .= "</html>";
$dompdf ->loadHtml($html);

$dompdf ->setPaper('A4','potrait');

$dompdf ->render();

$dompdf ->stream('Top_10_Contributor.pdf');

header ("Location: Rchart.php");
?>