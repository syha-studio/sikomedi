<?php
include('functions.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1','No');
$sheet->setCellValue('B1','Nama');
$sheet->setCellValue('C1','Email');
$sheet->setCellValue('D1','No HP');
$sheet->setCellValue('E1','Total Contents');
$query = mysqli_query($conn,"SELECT COUNT(k.ID) AS 'CONTENTS', u.NAME name, u.EMAIL email, u.NOHP nohp FROM konten_history k
        JOIN users u ON (k.USER_ID=u.ID) GROUP BY u.NAME ORDER BY CONTENTS DESC LIMIT 10");
$i=2; $no = 1;
while($row = mysqli_fetch_array($query)){
    $sheet->setCellValue('A'.$i,$no++);
    $sheet->setCellValue('B'.$i,$row['nama']);
    $sheet->setCellValue('C'.$i,$row['email']);
    $sheet->setCellValue('D'.$i,$row['nohp']);
    $sheet->setCellValue('E'.$i,$row['CONTENTS']);
    $i++;}
$styleArray = [
    'borders' => [
        'allborder' => [
            'borderstyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);
$tanggal = date('D m y');
$writer = new Xlsx($spreadsheet); $writer->save('Top 10 Content Contributor '.$tanggal.'.xlsx');
header ("Location: Rchart.php");
?>