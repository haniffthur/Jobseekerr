<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register | Job Seeker</title>
    <link rel="shortcut icon" href="img/node-js.svg">
    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="template/css/custom.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-image: url('template/gedung.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand" style="color: #ffff; font-weight: bold; font-size: 20px;" href="#">
                <i class="fab fa-node-js" style="color: #ffffff; font-size: 24px;"></i>
                Job Seeker
            </a>
        </nav>
        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8 col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <!-- Nested Row within Card Body -->
                        <div class="text-center">
                            <h1 class="h2 text-gray-900 mb-4" style="font-weight: bold; color: #004445;">Register</h1>
                        </div>
                        <form class="user" action="{{ route('actionregister') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username"
                                    style="color: #004445; font-size: 14px; margin-bottom: 2px; font-weight: bold;">
                                    Nama Pengguna
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="username-addon"><i
                                                class="fas fa-user"></i></span>
                                    </div>
                                    <input id="username" type="text" class="form-control" name="username"
                                        placeholder="Masukkan Nama Pengguna" required autofocus
                                        aria-describedby="username-addon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"
                                    style="color: #004445; font-size: 14px; margin-bottom: 2px; font-weight: bold;">
                                    Alamat Email
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="email-addon"><i
                                                class="fas fa-envelope"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control" name="email"
                                        placeholder="Masukkan Email" required aria-describedby="email-addon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password"
                                    style="color: #004445; font-size: 14px; margin-bottom: 2px; font-weight: bold;">
                                    Kata Sandi
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="password-addon"><i
                                                class="fas fa-lock"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        placeholder="Masukkan Password" required aria-describedby="password-addon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm"
                                    style="color: #004445; font-size: 14px; margin-bottom: 2px; font-weight: bold;">
                                    Konfirmasi Kata Sandi
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="password-confirm-addon"><i
                                                class="fas fa-lock"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Konfirmasi Password" required
                                        aria-describedby="password-confirm-addon">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block"
                                style="background-color: #004445; color: white;">Daftar</button>
                            <hr>
                            <div class="text-center">
                                <a href="/login" style="color: #004445; font-weight: bold; font-size: 14px;">Sudah punya
                                    akun? Login sekarang</a>
                            </div>
                        </form>
                    </div>
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
    <script src="template/js/sweetalert2@11.js"></script>
    <script>
        @error('gagal')
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: '',
                title: 'Username atau Password Salah'
            })
        @enderror
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil ditambahkan',
                showConfirmButton: false,
                timer: 3000
            })
        @endif
    </script>
</body>

</html>