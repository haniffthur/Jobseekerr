<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Job Seeker</title>
    <link rel="shortcut icon" href="img/node-js.svg">
    <!-- SB Admin 2 CSS -->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fab fa-node-js"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Job Seeker</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/admin" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="/user" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/karyawan" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pegawai</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/lowongan" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Pekerjaan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/datapencaker" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Data Pencaker</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laporan" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-file-pdf"></i>
                    <span>Laporan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/adminpesan" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Kotak Masuk</span></a>
            </li>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
                                <i class="fa-solid fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>
                    <div class="row">


        <div class="col-md-6 col-lg-3">

          <div class="card border-0 shadow">
            <div class="card-body">
              <div class="text-center">
                <i class="fas fa-briefcase fa-3x text-warning"></i>
                <h5 class="card-title mt-3">Lowongan</h5>
                <p class="card-text"><strong>{{ $jumlah_pekerjaan }}</strong> Lowongan Tersedia</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card border-0 shadow">
            <div class="card-body">
              <div class="text-center">
                <i class="fas fa-users fa-3x text-primary"></i>
                <h5 class="card-title mt-3">Pegawai</h5>
                <p class="card-text"><strong>{{ $jumlah_karyawan }}</strong> Pegawai Tersedia</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card border-0 shadow">
            <div class="card-body">
              <div class="text-center">
                <i class="fas fa-envelope fa-3x text-primary"></i>
                <h5 class="card-title mt-3">Kotak Pesan</h5>
                <p class="card-text"><strong>{{ $jumlah_pesan }}</strong> Pesan Tersedia</p>
              </div>
            </div>
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
                <div class="container" style="color: black;">
                    <span class="text-muted">Hak Cipta &copy; 2024 PT Bass Star.</span>
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
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route ('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="profileModalLabel">Profil Pengguna</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <form>
                        <div class="form-group">
                            <label for="username" class="text-secondary">Nama Pengguna</label>
                            <input type="text" class="form-control" id="username" value="{{ Auth::user()->username }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-secondary">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="role" class="text-secondary">Peran</label>
                            <input type="text" class="form-control" id="role" value="{{ Auth::user()->role }}" disabled>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>

</body>

</html>
