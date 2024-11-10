<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perusahaan | Job Seeker</title>
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/perusahaan">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fab fa-node-js"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Job Seeker</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/perusahaan" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="/perusahaanloker" style="background-color: transparent; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1cc88a';" onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Lowongan Kerja</span></a>
            </li>

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
                                    <i class="fas fa-user-circle"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Daftar Lowongan Pekerjaan</h1>
                    
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-success btn-sm" type="button" title="Tambah Lowongan" data-toggle="modal" data-target="#tambahDataModal">
                            <i class="fas fa-plus"></i> Tambah Lowongan
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table id="tabelLowongan" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th> ID </th>
                                    <th>Perusahaan</th>
                                    <th>Judul</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pekerjaan as $pekerjaan)
                                <tr>
                                    <td>{{ $pekerjaan->id_pekerjaan }}</td>
                                    <td>{{ $pekerjaan->Perusaahaan }}</td>
                                    <td>{{ $pekerjaan->judul }}</td>
                                    <td>{{ $pekerjaan->lokasi }}</td>
                                   
                                    <td>
                                        <span class="badge {{ $pekerjaan->status == 'buka' ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $pekerjaan->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-outline-primary btn-sm mr-1" type="button" title="Detail" data-toggle="modal" data-target="#detailLowonganModal-{{ $pekerjaan->id_pekerjaan}}">
                                               <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-outline-info btn-sm mr-1" type="button" title="Edit" data-toggle="modal" data-target="#editLowonganModal-{{ $pekerjaan->id_pekerjaan}}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{route('lowongan.delete',$pekerjaan->id_pekerjaan)}}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit" title="Hapus" onclick="return confirm('Yakin untuk menghapus pekerjaan?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                    
                </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="text-center my-auto">
                            <span>Hak Cipta &copy; 2024 PT Job Seeker.</span>
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
                        <h5 class="modal-title" id="exampleModalLabel">Siap untuk Keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
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

