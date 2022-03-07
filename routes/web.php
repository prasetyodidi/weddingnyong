<?php

use App\Http\Controllers\AttendeeListController;
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
use App\Http\Controllers\UserController;

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
})->name('landing.page');
Route::get('/qr', function () {
    $image = URL::to('/') . '/img/invitation/qr/77QR.svg';
    $qrcode = new QrReader($image);
    $text = $qrcode->text();
    echo $text;
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/invitation', [DashboardController::class, 'invitations'])->name('dashboard.invitation');
    Route::get('/dashboard/guest-book', [DashboardController::class, 'guestBooks'])->name('dashboard.guest_book');
    Route::get('/dashboard/attendee-list', [DashboardController::class, 'attendeeList'])->name('dashboard.attendee_list');
    Route::get('/dashboard/user', [DashboardController::class, 'users']);
    Route::get('/dashboard/design', [DashboardController::class, 'design']);
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    route::resource('/design', DesignController::class)->parameters([
        'design' => 'design:slug'
    ]);
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
});
Route::resource('/invitation', InvitationController::class)->parameters([
    'invitation' => 'invitation:slug'
]);
Route::post('/guest-book/create', [GuestBookController::class, 'store'])->name('guest-book.post');
Route::post('/guest-book/index', [GuestBookController::class, 'index'])->name('guest-book.index');

require __DIR__ . '/auth.php';
