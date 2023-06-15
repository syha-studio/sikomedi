
<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Establish database connection
$host = 'localhost';
$db = 'sikomedi';
$user = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Retrieve data from the database
$query = $conn->query("SELECT COUNT(k.ID) AS 'CONTENTS', u.NAME name, u.EMAIL email, u.NOHP nohp FROM konten_history k
                JOIN users u ON (k.USER_ID=u.ID) GROUP BY u.NAME ORDER BY CONTENTS DESC LIMIT 10");

// Create a new Excel file
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set up headers
$sheet->setCellValue('A1','No');
$sheet->setCellValue('B1','Nama');
$sheet->setCellValue('C1','Email');
$sheet->setCellValue('D1','No HP');
$sheet->setCellValue('E1','Total Contents');

// Populate data
$row = 2; $no = 1;
while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
    $sheet->setCellValue('A'.$row,$no++);
    $sheet->setCellValue('B'.$row,$data["nama"]);
    $sheet->setCellValue('C'.$row,$data["email"]);
    $sheet->setCellValue('D'.$row,$data["nohp"]);
    $sheet->setCellValue('E'.$row,$data["CONTENTS'"]);
    $row++;
}

// Save the Excel file
$writer = new Xlsx($spreadsheet);
$filename = 'Top_10_Content_Contributor.xlsx';
$writer->save($filename);

// Provide the file for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
readfile($filename);

// Clean up - delete the file
unlink($filename);
header ("Location: Rchart.php");
?>