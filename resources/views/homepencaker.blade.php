<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda | Job Seeker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="shortcut icon" href="img/node-js.svg">
    <style>
        body {
            background-image: url('template/gedung.jpg');
            background-size: cover;
            background-position: center;
            color: #333;
        }
        .navbar-custom {
            position: inherit;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }
        .list-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        
            
        }
        .list-item {
            flex: 0 0 30%;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease-in-out;
        }
        .list-item:hover {
            transform: translateY(-5px);
            background-color: #f0f0f0;
        }
        footer {
            text-align: center;
            position: inherit;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" style="color: #ffff; font-weight: bold; font-size: 20px;" href="/pencaker">
            <i class="fab fa-node-js" style="color: #ffffff; font-size: 24px;"></i>
                Job Seeker
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hubungi">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #ffffff;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>        
                    <li class="navbar-text">
                        <a class="navbar-link" style="font-style: italic; color: #004445; font-weight: bold; font-size: 18px;">Welcome, {{ Auth::user()->username }}</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="jumbotron mt-5 bg-transparent text-center">
            <h1 class="display-4" style="color: #004445;">Cari Pekerjaan</h1>
            <p class="lead">Menghubungkan Pencari Kerja dengan Peluang Tak Terbatas.</p>
            <hr class="my-4">
            <form action="{{ route('jobs.search') }}" method="POST" class="form-inline justify-content-center">
                @csrf
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Masukan Kata Kunci" name="keyword">
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Masukan Lokasi" name="location">
                <button class="btn mb-2" type="submit" style="background-color: #004445; color: white;">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
        </div>

        <div class="list-container">
            @foreach ($data_pekerjaan as $pekerjaan)
            <div class="list-item">
                <h5 class="text-primary">{{$pekerjaan->Perusaahaan}}</h5>
                <p><strong>Pekerjaan:</strong> {{$pekerjaan->judul}}</p>
                <p><strong>Status:</strong> {{$pekerjaan->status}}</p>
                <p><strong>Tanggal Posting:</strong> {{$pekerjaan->tgl_posting}}</p>
                <button class="btn btn-success btn-sm" style="background-color: #004445; color: white;" type="button" title="Detail Pekerjaan" data-toggle="modal" data-target="#detailPekerjaanModal-{{$pekerjaan->id_pekerjaan}}">
                        Detail Pekerjaan
                        </button>
                <button class="btn btn-success btn-sm" style="background-color: #004445; color: white;" type="button" title="Apply Pekerjaan" data-toggle="modal" data-target="#applyModal-{{$pekerjaan->id_pekerjaan}}">
                        Apply Pekerjaan
                </button>
            </div>
            @endforeach
        </div>
        
        <!-- Modal Detail Pekerjaan -->
        @foreach ($data_pekerjaan as $pekerjaan)
        <div class="modal fade" id="detailPekerjaanModal-{{$pekerjaan->id_pekerjaan}}" tabindex="-1" role="dialog" aria-labelledby="detailPekerjaanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="detailPekerjaanModal-{{$pekerjaan->id_pekerjaan}}">Detail Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-light">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Perusahaan:</strong>
                                <span id="detail_perusahaan">{{ $pekerjaan->Perusaahaan }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Lowongan:</strong>
                                <span id="detail_judul">{{ $pekerjaan->judul }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Deskripsi:</strong>
                                <span id="detail_deskripsi">{{ $pekerjaan->deskripsi }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Persyaratan:</strong>
                                <span id="detail_persyaratan">{{ $pekerjaan->persyaratan }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Lokasi:</strong>
                                <span id="detail_lokasi">{{ $pekerjaan->lokasi }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Gaji:</strong>
                                <span id="detail_kategori">Rp.{{ $pekerjaan->gaji }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Modal Apply -->
        @foreach ($data_pekerjaan as $pekerjaan)
        <div class="modal fade" id="applyModal-{{$pekerjaan->id_pekerjaan}}" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header" style="background-color: #004445; color: white;">
                        <h5 class="modal-title" id="applyModalLabel">Apply Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-light">
                        <form action="/apply/{{$pekerjaan->id_pekerjaan}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->username }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="cv">Upload CV:</label>
                                <input type="file" class="form-control-file" id="cv" name="cv" required>
                            </div>
                            <button type="submit" class="btn btn-success" style="background-color: #004445; color: white;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <footer class="footer" style="color: #ffffff; font-size: 15px;">
            <span><em>Hak Cipta &copy; 2024 PT Bass Star.</em></span>
        </footer>        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
