<?php
require_once 'configHandler.php';
$t = time();








$countiesSQL = 'SELECT * FROM counties';
$countiesResult = mysqli_query($conn, $countiesSQL);


















?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NHS Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/stylesheet.css" rel="stylesheet">
</head>
<body id="page-top" onload="timer()">
    <div id="time"></div>
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">NHS Handler</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="/handler/dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="/handler/callReport.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Call Report</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="/logout.php">
                	<i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid" style="margin-top: 1%;">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <form action="">
                                <h3 style="font-weight: 600;">Caller Details</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputForname"> Forname: </label>
                                        <input type="text" class="form-control" id="inputForname" placeholder="Enter Forname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputSurname"> Surname: </label>
                                        <input type="text" class="form-control" id="inputSurname" placeholder="Enter Surname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress"> Address: </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Enter Address">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="inputCounties"> Counties:</label>
                                        <select class="form-control" id="inputCounties">
                                        <option value="" disabled selected> Select Pacient County</option>
                                        <?php while($row = mysqli_fetch_array($countiesResult)){
                                            echo '<option value="' . $row["ID"] . '">' . $row["Name"] . '</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPostcode"> PostCode: </label>
                                        <input type="text" class="form-control" id="inputPostcode" placeholder="S67 3HP">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="inputNumber"> Contact Number: </label>
                                        <input type="number" class="form-control" id="inputNumber" placeholder="Enter Contact Number">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputHandler"> Handler ID: </label>
                                        <input type="number" class="form-control" id="inputHandler">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputWhat1">What 3 Words (Word 1):</label>
                                        <input type="text" class="form-control" id="inputHandler">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputWhat2"> What 3 Words (Word 2):</label>
                                        <input type="text" class="form-control" id="inputHandler">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputWhat3"> What 3 Words (Word 3):</label>
                                        <input type="text" class="form-control" id="inputHandler">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputNotes"> Notes: </label>
                                    <textarea class="form-control" id="inputNotes" rows="5"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="sendAmbulance"> Send Ambulance: </label>
                                        <select class="form-control" id="sendAmbulance">
                                            <option value="" disabled selected>Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="elevateCall"> Elevate Call: </label>
                                        <select class="form-control" id="sendAmbulance">
                                            <option value="" disabled selected>Select Option</option>
                                            <option value="Not Required">Not Required</option>
                                            <option value="Supivisor"> Supivisor</option>
                                            <option value="Nurse"> Nurse</option>
                                            <option value="Doctor"> Doctor</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nusanceCall"> Nusiance Call: </label>
                                        <select class="form-control" id="sendAmbulance">
                                            <option value="" disabled selected>Select Option</option>
                                            <option value="Yes"> Yes</option>
                                            <option value="No"> No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-control">

                                </div>
                            </form>
                        </div>             
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>