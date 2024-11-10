    <?php

    use App\Http\Controllers\PegawaiController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\MasukController;
    use App\Http\Controllers\HKController;
    use App\Http\Controllers\pekerjaanController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\PencakerController;
    use App\Http\Controllers\ResetPassword;

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/about', function () {
        return view('about');
    });

    Route::resource('hubungis', HKController::class)->middleware('auth');
    Route::resource('data_pekerjaan', pekerjaanController::class)->middleware('auth');
    
    Route::get('/pencaker', [pekerjaanController::class, 'search'])->name('jobs.search');
    Route::post('/pencaker', [pekerjaanController::class, 'search'])->name('jobs.search');

    Route::get('pekerjaan/create', 'JobController@create')->name('jobs.create');
    Route::post('/pekerjaan', 'JobController@store')->name('jobs.store');

    Route::get('/login', [MasukController::class, 'halamanLogin'])->name('login');
    Route::post('/login', [MasukController::class, 'login']);

    Route::get('/loginperusahaan', [MasukController::class, 'halamanLoginPerusahaan'])->name('loginperusahaan');
    Route::post('/loginperusahaan', [MasukController::class, 'loginperusahaan']);

    Route::get('/hubungi', [HKController::class, 'halamanhubungi'])->name('hubungi');
    Route::post('/hubungi', [HKController::class, 'hubungi']);

    Route::get('/lowongan', [pekerjaanController::class, 'halamanlowongan'])->name('lowongan');
    Route::post('/lowongan', [pekerjaanController::class, 'tambahlowongan'])->name('tambahlowongan');
    Route::put ('/lowongan/update/{id_pekerjaan}', [pekerjaanController::class, 'update'])->name('lowongan.update');
    Route::delete ('/lowongan/delete/{id_pekerjaan}', [pekerjaanController::class, 'delete'])->name('lowongan.delete');
 

    Route::get('/user', [UserController::class, 'index'])->name('user.form');
    Route::post('user', [UserController::class,'actionuser'])->name('actionuser');
    Route::put('user/update/{id}', [UserController::class,'update'])->name('user.update');
    Route::delete('user/delete/{id}', [UserController::class,'delete'])->name('user.delete');

    Route::get('/karyawan', [PegawaiController::class, 'index'])->name('karyawan.form');
    Route::post('/karyawan', [PegawaiController::class,'actionPegawai'])->name('actionPegawai');
    Route::delete('/karyawan/delete/{id_pegawai}', [PegawaiController::class,'delete'])->name('karyawan.delete');
    Route::put('/karyawan/update/{id_pegawai}', [PegawaiController::class, 'update'])->name('karyawan.update');

    Route::get('/datapencaker', [PencakerController::class,'index'])->name('datapencaker');
    Route::post('/datapencaker', [PencakerController::class,'actionPencaker'])->name('actionPencaker');
    
    Route::get('/pegawailoker', [pekerjaanController::class, 'halamanpesan'])->name('pegawailoker');


    Route::get('/adminpesan', [HKController::class, 'halamanpesan'])->name('adminpesan');
    Route::delete('/adminpesan/{nama}', [HKController::class, 'destroy'])->name('adminpesan.destroy');

   Route::get('register', [RegisterController::class, 'form'])->name('register.form');
   Route::post('register', [RegisterController::class, 'actionregister'])->name('actionregister');

   Route::get('reset_password', [ResetPassword::class, 'showResetForm'])->name('password.request');
   Route::post('reset_password', [ResetPassword::class, 'reset'])->name('password.update');



    Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

    // Rute untuk menampilkan halaman admin, pegawai, dan pencaker
    Route::get('/admin', [MasukController::class, 'halamanAdmin'])->name('admin.home')->middleware('auth');
    Route::get('/pegawai', [MasukController::class, 'halamanPegawai'])->name('pegawai.home')->middleware('auth');
    Route::get('/pencaker', [MasukController::class, 'halamanPencaker'])->name('pencaker.home')->middleware('auth');
    Route::get('/perusahaan', [MasukController::class, 'halamanPerusahaan'])->name('perusahaan.home')->middleware('auth');

