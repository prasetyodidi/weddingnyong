<?php

use Zxing\QrReader;
use App\Models\Design;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\InvitationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $designs = Design::limit(6)->get();
    return view('home', compact('designs'));
});
Route::get('/qr', function () {
    $image = URL::to('/') . '/img/invitation/qr/77QR.svg';
    $qrcode = new QrReader($image);
    $text = $qrcode->text();
    echo $text;
});
Route::get('/qr/create', [QrController::class, 'create']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/invitation', [DashboardController::class, 'invitations'])->name('dashboard.invitation');
    Route::get('/dashboard/guest-book', [DashboardController::class, 'guestBooks']);
    Route::get('/dashboard/attendee-list', [DashboardController::class, 'attendeeList']);
    Route::get('/dashboard/user', [DashboardController::class, 'users']);
    Route::get('/dashboard/design', [DashboardController::class, 'design']);
});

Route::get('/demo/winter', function () {
    return Storage::path('file.jpg');
});

Route::get('/test/{design}', function (string $design) {
    return view('designs/' . $design . '/demo_design');
});

Route::resource('/invitation', InvitationController::class)->parameters([
    'invitation' => 'invitation:slug'
]);

Route::post('/guest-book/create', [GuestBookController::class, 'store'])->name('guest-book.post');
Route::post('/guest-book/index', [GuestBookController::class, 'index'])->name('guest-book.index');
Route::get('/design', [DesignController::class, 'index'])->name('design.all');

require __DIR__ . '/auth.php';
