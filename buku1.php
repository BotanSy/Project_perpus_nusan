<?php 
include_once("config/koneksi.php");
$result = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY id_buku DESC"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand -->
        <a class="navbar-brand ps-3" href="buku1.php">Perpustakaan Nasional</a>
        <!-- Sidebar Toggle -->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Apa yang kamu cari?" aria-label="Apa yang kamu cari?" aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- Navbar -->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                        <a class="nav-link" href="buku1.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu Tambah Data</div>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="dashboard/add.php">Tambah Data Buku</a>
                                        <a class="nav-link" href="dashboard/perpustakan_pinjaman.php">Tambah Peminjam</a>
                                        <a class="nav-link" href="dashboard/add_anggota.php">Tambah Data Anggota</a>
                                    </nav>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    
                                </div>
                               
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Menu Data</div>
                        <a class="nav-link" href="dashboard/buku.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Buku
                        </a>
                        <a class="nav-link" href="dashboard/perpustakan_pinjaman.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Peminjaman
                        </a>
                        <a class="nav-link" href="dashboard/pengembalian.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Pengembalian
                        </a>
                        <a class="nav-link" href="dashboard/anggota.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Anggota
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk Sebagai:</div>
                    Administrator
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Halaman Utama</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Administrator</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Koleksi Buku</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="dashboard/buku.php">Lihat Data</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Peminjaman</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="dashboard/perpustakan_pinjaman.php">Lihat Data</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Buku Dikembalikan</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="dashboard/pengembalian.php">Lihat Data</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Anggota</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="dashboard/anggota.php">Lihat Data</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Data Pengunjung
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Data Buku Dipinjam
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Perpustakaan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th><center>ID Buku</center></th>
                                        <th><center>Judul Buku</center></th>
                                        <th><center>Pengarang</center></th>
                                        <th><center>Penerbit</center></th>
                                        <th><center>Tahun Terbit</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><center>".$user_data['id_buku']."</center></td>";
        echo "<td><center>".$user_data['judul_buku']."</center></td>";
        echo "<td><center>".$user_data['pengarang']."</center></td>";
        echo "<td><center>".$user_data['penerbit']."</center></td>";
        echo "<td><center>".$user_data['tahun_terbit']."</center></td>";   
        echo "<td><center><a href='assets/edit.php?id_buku=$user_data[id_buku]'class='btn btn-warning'>EDIT</a> | <a href='assets/delete.php?id_buku=$user_data[id_buku]' class='btn btn-danger'>DELETE</a></center>";   
    }
    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><center>".$user_data['id_buku']."</center></td>";
        echo "<td><center>".$user_data['judul_buku']."</center></td>";
        echo "<td><center>".$user_data['pengarang']."</center></td>";
        echo "<td><center>".$user_data['penerbit']."</center></td>";
        echo "<td><center>".$user_data['tahun_terbit']."</center></td>";   
        echo "<td><center><a href='assets/edit.php?id_buku=$user_data[id_buku]'class='btn btn-warning'>EDIT</a> | <a href='assets/delete.php?id_buku=$user_data[id_buku]' class='btn btn-danger'>DELETE</a></center>";   
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                                
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; BtnCoprs 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>

