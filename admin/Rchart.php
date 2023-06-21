<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
require 'tampilan.php';
// Query
$postqueue = query("SELECT count(ID) a FROM konten_history WHERE STATUS_ID = 1");
$postuploaded = query("SELECT count(ID) a FROM konten_history WHERE STATUS_ID = 2");
$postrejected = query("SELECT count(ID) a FROM konten_history WHERE STATUS_ID = 3");
$top10 = query("SELECT COUNT(k.ID) AS 'CONTENTS', u.NAME, u.EMAIL, u.NOHP FROM konten_history k
                        JOIN users u ON (k.USER_ID=u.ID) GROUP BY u.NAME ORDER BY CONTENTS DESC LIMIT 10");
// Chart Request
$datacat1 = mysqli_query($conn, "SELECT DISTINCT NAMA FROM media");
$datasub1 = mysqli_query($conn, "SELECT DISTINCT m.ID JENIS_ID, j.NAMA JENIS FROM media m JOIN jenis_konten j ON (m.JENIS_ID=j.ID)");
while ($row = mysqli_fetch_array($datacat1)) {
    $category1[] = $row['NAMA'];
    $cat1 = count($category1);
    $query = mysqli_query($conn, "SELECT COUNT(s.ID) AS 'Total Request' FROM konten_history s
                                        JOIN media p ON (s.MEDIA_ID =p.ID)
                                        where p.NAMA ='" . $row['NAMA'] . "'");
    $row = $query->fetch_array();
    $dataSpC[] = $row['Total Request'];
}
while ($row = mysqli_fetch_array($datasub1)) {
    $subcategory1[] = $row['JENIS'];
    $sub1 = count($subcategory1);
    $query = mysqli_query($conn, "SELECT COUNT(s.ID) AS 'Total Request', m.NAMA MEDIA FROM konten_history s
                                        JOIN media m ON (s.MEDIA_ID = m.ID)
                                        WHERE m.ID='" . $row['JENIS_ID'] . "'");
    $row = $query->fetch_array();
    $dataOpS[] = $row['Total Request'];
    $datadcat1[] = $row['MEDIA'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Report Chart - SIKOMEDI</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a41efb1c83.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="drilldown.css">
    <!-- Script -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?= sidetop() ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Summary</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Total Post Uploaded -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Post Uploaded</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($postuploaded[0]["a"], 0, ' , ', ' ') ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-images text-gray-300" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Post Rejected -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Post Rejected</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($postrejected[0]["a"], 0, ' , ', ' ') ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-images text-gray-300" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Post Queue -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Post Queue</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($postqueue[0]["a"], 0, ' , ', ' ') ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-images text-gray-300" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Content Row -->
            <div class="row ">
                <!-- Donut Chart DrillDown -->
                <div class="col-xl-6 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Upload Requests Data</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="d-flex justify-content-center">
                            <figure class="highcharts-figure">
                                <div id="SpC"></div>
                                <p class="highcharts-description">
                                    by Media => by Content Types.
                                </p>
                            </figure>
                        </div>
                    </div>
                </div>
                <!-- Top 10 -->
                <div class="col-xl-6 col-lg-5" style="max-height:40rem">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 justify-content-center">
                            <div class="align-middle">
                                <h6 class="m-0 font-weight-bold text-primary">Top 10 Content Contributors</h6>
                            </div>
                            <div class="align-middle text-end">
                                <a href="exporttop10Pdf.php"><button type="button" class="btn btn-secondary btn-sm">Print PDF</button></a>
                                <a href="exporttop10Excel.php"><button type="button" class="btn btn-secondary btn-sm">Print Excel</button></a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center p-2 pb-2">
                            <table class="table align-middle">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Total Contents</th>
                                </tr>
                                <?php $i = 1;
                                foreach ($top10 as $row) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row["NAME"] ?></td>
                                        <td><?= $row["EMAIL"] ?></td>
                                        <td><?= $row["NOHP"] ?></td>
                                        <td><?= number_format($row["CONTENTS"], 0, ',', ' ') ?></td>
                                    </tr>
                                <?php $i++;
                                endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; SIKOMEDI 2023</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-dark" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Script Default -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Script Chart Request-->
    <script type="text/javascript">
        // Create the chart
        Highcharts.chart('SpC', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Data by Medias'
            },
            subtitle: {
                text: 'Click the slices to view Data by Contents Types.'
            },

            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: '%'
                }
            },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y:,.0f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f}</b> of total<br/>'
            },

            series: [{
                name: "Media",
                colorByPoint: true,
                data: [
                    <?php for ($i = 0; $i < $cat1; $i++) {
                        echo "{ name: \"$category1[$i]\",
                            y: ";
                        if ($dataSpC[$i] == null) {
                            echo "0,
                                drilldown: null
                            }";
                        } else {
                            echo " $dataSpC[$i],
                                drilldown: \"$category1[$i]\"
                            }";
                        }
                        if ($i != ($cat1 - 1)) {
                            echo ",";
                        }
                    }
                    ?>
                ]
            }],
            drilldown: {
                series: [
                    <?php for ($i = 0; $i < $cat1; $i++) {
                        echo "{ name: \"$category1[$i]\",
                        id: \"$category1[$i]\",
                            data: [
                                ";
                        for ($j = 0; $j < $sub1; $j++) {
                            if ($datadcat1[$j] == $category1[$i]) {
                                echo "[
                                            \"$subcategory1[$j]\",";
                                if ($dataOpS[$j] == null) {
                                    echo 0;
                                } else {
                                    echo $dataOpS[$j];
                                }
                                echo "
                                        ]";
                                if ($j != ($sub1 - 1)) {
                                    echo ",";
                                }
                            }
                        }
                        echo "]}";
                        if ($i != ($cat1 - 1)) {
                            echo ",";
                        }
                    }
                    ?>
                ]
            }
        });
    </script>
    <!-- Script Chart Trend-->
    <script type="text/javascript">
        // Create the chart
        Highcharts.chart('OpC', {
            chart: {
                type: 'area'
            },
            title: {
                text: 'Trend by Years'
            },
            subtitle: {
                text: 'Click the point to view Trend by Months.'
            },

            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: '%'
                }
            },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y:,.0f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f}</b> of total<br/>'
            },

            series: [{
                name: "Year",
                colorByPoint: true,
                data: [
                    <?php for ($i = 0; $i < $cat2; $i++) {
                        echo "{ name: \"$category2[$i]\",
                            y: ";
                        if ($dataOpC[$i] == null) {
                            echo "0,
                                drilldown: null
                            }";
                        } else {
                            echo " $dataOpC[$i],
                                drilldown: \"$category2[$i]\"
                            }";
                        }
                        if ($i != ($cat2 - 1)) {
                            echo ",";
                        }
                    }
                    ?>
                ]
            }],
            drilldown: {
                series: [
                    <?php for ($i = 0; $i < $cat2; $i++) {
                        echo "{ name: \"$category2[$i]\",
                        id: \"$category2[$i]\",
                            data: [
                                ";
                        for ($j = 0; $j < $sub2; $j++) {
                            if ($datadcat2[$j] == $category2[$i]) {
                                echo "[
                                            \"" . substr($subcategory2[$j], 4) . "\",";
                                if ($dataOpS[$j] == null) {
                                    echo 0;
                                } else {
                                    echo $dataOpS[$j];
                                }
                                echo "
                                        ]";
                                if ($j != ($sub2 - 1)) {
                                    echo ",";
                                }
                            }
                        }
                        echo "]}";
                        if ($i != ($cat2 - 1)) {
                            echo ",";
                        }
                    }
                    ?>
                ]
            }
        });
    </script>

</body>

</html>