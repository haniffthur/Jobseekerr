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
                                <a class="dropdown-item" href="#profileModal" data-toggle="modal" data-target="#profileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route ('logout')}}" data-toggle="modal" data-target="#logoutModal">
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
                    <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
                    
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-success btn-sm" type="button" title="Tambah Pegawai" data-toggle="modal" data-target="#tambahPegawai">
                            <i class="fas fa-plus"></i> Tambah Pegawai
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis_Kelamin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_karyawan as $pegawai)
                                <tr>
                                    <td>{{ $pegawai->id_pegawai}}</td>
                                    <td>{{ $pegawai->nik}}</td>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td>{{ $pegawai->email}}</td>
                                    <td>{{ $pegawai->jenis_kelamin }}</td>
                                    <td>
                                        <span class="badge {{ $pegawai->status == 'Aktif' ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $pegawai->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-outline-primary btn-sm mr-1" type="button" title="Detail" data-toggle="modal" data-target="#detailPegawaiModal-{{ $pegawai->id_pegawai }}">
                                               <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-outline-info btn-sm mr-1" type="button" title="Edit" data-toggle="modal" data-target="#editPegawaiModal-{{ $pegawai->id_pegawai }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{route('karyawan.delete',$pegawai->id_pegawai)}}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit" title="Hapus" onclick=" return confirm('Apakah anda yakin untuk menghapus data ini?')">
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
                    <a class="btn btn-primary" href="{{route ('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Pegawai Modal -->
    @foreach ($data_karyawan as $pegawai)
    <div class="modal fade" id="detailPegawaiModal-{{ $pegawai->id_pegawai }}" tabindex="-1" role="dialog" aria-labelledby="detailPegawaiModalLabel-{{ $pegawai->id_pegawai }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="detailPegawaiModalLabel-{{ $pegawai->id_pegawai }}">Detail Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nik:</strong> {{ $pegawai->nik }}</li>
                        <li class="list-group-item"><strong>Nama:</strong> {{ $pegawai->nama }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $pegawai->email }}</li>
                        <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $pegawai->jenis_kelamin }}</li>
                        <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{ $pegawai->tanggal_lahir }}</li>
                        <li class="list-group-item"><strong>Agama:</strong> {{ $pegawai->agama }}</li>
                        <li class="list-group-item"><strong>Alamat:</strong> {{ $pegawai->alamat }}</li>
                        <li class="list-group-item"><strong>No HP:</strong> {{ $pegawai->no_telpon }}</li>
                    </ul>
                </div>
                <div class="modal-footer bg-white">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Tambah Pegawai Modal -->
    <div class="modal fade" id="tambahPegawai" tabindex="-1" role="dialog" aria-labelledby="tambahPegawaiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="tambahPegawaiLabel">Tambah Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <form action="{{ route('actionPegawai') }}" method="POST">
                    @csrf
                    <div class="modal-body bg-light">
                        <div class="form-group">
                            <label for="nik">Nik:</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama:</label>
                            <input type="text" class="form-control" id="agama" name="agama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telpon">No HP:</label>
                            <input type="text" class="form-control" id="no_telpon" name="no_telpon" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editPegawaiModal-{{ $pegawai->id_pegawai }}" tabindex="-1" role="dialog" aria-labelledby="editPegawaiModalLabel-{{ $pegawai->id_pegawai }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editPegawaiModalLabel-{{ $pegawai->id_pegawai }}">Edit Data Pegawai</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('karyawan.update', $pegawai->id_pegawai) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body bg-light">
                        <div class="form-group">
                            <label for="edit_nama">Nama:</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" value="{{ $pegawai->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email:</label>
                            <input type="email" class="form-control" id="edit_email" name="email" value="{{ $pegawai->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_tgl_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="edit_tgl_lahir" name="tgl_lahir" value="{{ $pegawai->tgl_lahir }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" id="edit_jenis_kelamin" name="jenis_kelamin" required>
                                <option value="pria" {{ $pegawai->jenis_kelamin == 'pria' ? 'selected' : '' }}>Pria</option>
                                <option value="wanita" {{ $pegawai->jenis_kelamin == 'wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_agama">Agama:</label>
                            <input type="text" class="form-control" id="edit_agama" name="agama" value="{{ $pegawai->agama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_alamat">Alamat:</label>
                            <input type="text" class="form-control" id="edit_alamat" name="alamat" value="{{ $pegawai->alamat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_no_telpon">No HP:</label>
                            <input type="text" class="form-control" id="edit_no_telpon" name="no_telpon" value="{{ $pegawai->no_telpon }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_status">Status:</label>
                            <select class="form-control" id="edit_status" name="status" required>
                                <option value="Aktif" {{ $pegawai->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Nonaktif" {{ $pegawai->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    


    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>

</body>

</html>
