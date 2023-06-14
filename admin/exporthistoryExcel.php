<?php
include('functions.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1','No');
$sheet->setCellValue('B1','User');
$sheet->setCellValue('C1','Media');
$sheet->setCellValue('D1','Jenis');
$sheet->setCellValue('E1','Tanggal Posting');
$sheet->setCellValue('F1','Judul Postingan');
$sheet->setCellValue('G1','Status');
$query = mysqli_query($conn,"SELECT u.NAME user, m.NAMA media, j.NAMA jenis,  k.TANGGALPOSTING tanggal, k.JUDULPOSTING judul, s.NAMA as `status` FROM konten_history k
        JOIN users u ON (k.USER_ID = u.ID) JOIN media m ON (k.MEDIA_ID = m.ID) JOIN status_konten s ON (k.STATUS_ID = s.ID)
        JOIN jenis_konten j ON (m.JENIS_ID = j.ID) ORDER BY `status`, tanggal DESC");
$i=2; $no = 1;
while($row = mysqli_fetch_array($query)){
    $sheet->setCellValue('A'.$i,$no++);
    $sheet->setCellValue('B'.$i,$row['user']);
    $sheet->setCellValue('C'.$i,$row['media']);
    $sheet->setCellValue('D'.$i,$row['jenis']);
    $sheet->setCellValue('E'.$i,$row['tanggal']);
    $sheet->setCellValue('F'.$i,$row['judul']);
    $sheet->setCellValue('G'.$i,$row['status']);
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
$writer = new Xlsx($spreadsheet); $writer->save('Posts History '.$tanggal.'.xlsx');
header ("Location: Rtable.php");
?>