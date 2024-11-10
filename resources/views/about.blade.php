<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Job Seeker</title>
    <link rel="shortcut icon" href="img/node-js.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
            <i class="fab fa-node-js" style="color: #ffffff; font-size: 24px;"></i>
            <a class="navbar-brand" href="#">Job Seeker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @if(Auth::check())
                    <li class="nav-item">
                      <a class="nav-link" href="/pencaker">Beranda</a>
                   </li>
                   @else
                   <li class="nav-item">
                      <a class="nav-link" href="/">Beranda</a>
                  </li>
                  @endif
                    <li class="nav-item active">
                        <a class="nav-link" href="#">About Us<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hubungi">Contact Us</a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route ('logout')}}" style="color: whhite;">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="jumbotron mt-3" style="background-color: transparent; color: white;">
            <h1 class="display-4" style="color: #004445;">Tentang Kami</h1>
            <p class="lead">Menghubungkan Pencari Kerja dengan Peluang Tak Terbatas.</p>
            <hr class="my-4">
            <p class="card-text">Job Seeker adalah platform yang dirancang untuk membantu pencari kerja menemukan peluang kerja dengan cepat dan efisien. Kami bertujuan untuk menghubungkan pencari kerja dengan pemberi kerja di berbagai industri dan memberikan pengalaman pencarian kerja yang lancar.</p>
            <p class="card-text">Job Seeker juga berkomitmen untuk menyediakan fitur-fitur yang memudahkan pencari kerja dalam menemukan pekerjaan yang sesuai dengan keahlian dan minat mereka. Melalui fitur pencarian yang canggih dan filter yang dapat disesuaikan, pengguna dapat dengan mudah menemukan lowongan pekerjaan yang sesuai dengan kriteria yang mereka inginkan.</p>
            <p class="card-text">Dengan komitmen kami untuk memberikan pengalaman pencarian kerja yang terbaik, Job Seeker siap menjadi mitra terpercaya bagi setiap pencari kerja dalam mencapai tujuan karir mereka.</p>
            <p class="card-text">Untuk pertanyaan atau masukan apa pun, jangan ragu untuk menghubungi kami di info@jobseekerapp.id</p>
        </div>
        

        <footer class="footer mt-5">
            <div class="container"style="color: black;">
                <span class="text-muted">Hak Cipta &copy; 2024 PT Bass Star.</span>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>