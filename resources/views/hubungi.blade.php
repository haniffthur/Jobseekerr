<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami | Job Seeker</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contact Us<span class="sr-only">(current)</span></a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route ('logout') }}" style="color: #004445;">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="jumbotron mt-3" style="background-color: transparent; color: white;">
            <h1 class="display-4" style="color: #004445; text-align: center;">Hubungi Kami</h1>
            <p class="lead" style="text-align: center;">Menghubungkan Pencari Kerja dengan Peluang Tak Terbatas.</p>
            <hr class="my-4">
            <form action="/hubungi" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">{{ __('Nama') }}</label>
                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
                </div>
    
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
    
                <div class="form-group">
                    <label for="pesan">{{ __('pesan') }}</label>
                    <textarea id="pesan" class="form-control" name="pesan" required>"{{ old('pesan') }}"</textarea>
                </div>

                @if(Auth::check())
                    <button type="submit" class="btn " style="background-color: #004445; color: white;">{{ __('Kirim') }}</button>
                @else
                    <button type="button" class="btn " style="background-color: #004445; color: white;" onclick="alert('Anda harus login untuk mengirim pesan.');">{{ __('Kirim') }}</button>
                @endif
            </form>
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

