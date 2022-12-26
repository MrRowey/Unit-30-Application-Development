<?php
// start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NHS Management - Accounting</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Custom styles for this template-->
    <link href="/css/stylesheet.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">NHS Management</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-gauge-simple-high"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
            	Account
            </div>
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                	<i class="fa-solid fa-table"></i>
                    <span>Logout</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-card d-none d-lg-flex ">
                <img class="sidebar-card-illustration mb-2" src="/img/undraw_rocket.svg">
                <p class="text-center mb-2"><strong>NHS Web Dashboard</strong> v0.0.1</p>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-1 static-top shadow">
					<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
				</nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0"></h1>
					</div>
                    <h4>Successfull Calls</h4>
                    <div class="row">
                        <!-- Yearly -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Yearly</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">40,000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Monthy -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Monthly</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<!-- Weekly -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Weekly</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Daily -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Daily</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Team Call Success -->
                        <div class="col-xl-8 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Team postions-->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Team Call Succses Rate</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
									<table style="width: 100%;">
										<tr>
											<th>Team ID</th>
											<th>Yearly</th>
											<th>Monthly</th>
											<th>Weekly</th>
											<th>Daily</th>
										</tr>
										<tr>
											<!-- Teams -->
											<td>we</td>
											<td>we</td>
											<td>we</td>
											<td>we</td>
											<td>we</td>
										</tr>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; NHS Dashboard 2022</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>