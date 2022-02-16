<?php

use App\Http\Controllers\API\AttendeeListController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DesignController;
use App\Http\Controllers\API\GuestBookController;
use App\Http\Controllers\API\InvitationController;
use App\Http\Controllers\API\PriceController;
use App\Http\Controllers\API\UserController;
use App\Models\Qr;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/form', function () {
        return response()->json([
            'message' => 'Halaman create data'
        ], 200);
    });
    Route::get('/test-verified', [UserController::class, 'test']);
    Route::get('/user-data', function () {
        return response()->json([
            'message' => 'success',
            'user' => Auth::user()
        ], 200);
    });
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::middleware(['admin'])->group(function () {
        Route::delete('/user/delete/{id}', [UserController::class, 'delete']);
        Route::get('/user/all', [UserController::class, 'getAllUser']);
        Route::get('/user/{id}', [UserController::class, 'getUserById']);
        Route::post('/design', [DesignController::class, 'create']);
        Route::get('/design/{slug}', [DesignController::class, 'getDesignBySlug']);
        Route::put('/design/{slug}', [DesignController::class, 'update']);
        Route::post('/price', [PriceController::class, 'create']);
        Route::get('/price/all', [PriceController::class, 'getAllPrice']);
        Route::put('/price/{id}', [PriceController::class, 'update']);
        Route::delete('/price/{name}', [PriceController::class, 'delete']);
        Route::get('/invitation/all', [InvitationController::class, 'getAllInvitation']);
        Route::get('/invitation/user/{user_id}', [InvitationController::class, 'getInvitationByUserId']);
        Route::put('/invitation/{invitation:slug}/active', [InvitationController::class, 'updateActiveStatus']);
        Route::put('/invitation/{invitation:slug}/price', [InvitationController::class, 'updateTypeOfPrice']);
        // todo
    });
    Route::delete('/guest-book/{id}', [GuestBookController::class, 'delete']);
    Route::delete('/attendee-list/{id}', [AttendeeListController::class, 'delete']);
    Route::get('/invitation/user', [InvitationController::class, 'getInvitationByUser']);
    Route::post('/invitation/create', [InvitationController::class, 'create']);
    // todo
    Route::get('/guest-book/user/{user_id}', [GuestBookController::class, 'getByUser']);
    Route::get('/guest-book/{invitation_id}', [GuestBookController::class, 'getByInvitation']);
    Route::get('/attendee-list/user/{user_id}', [AttendeeListController::class, 'getByUser']);
    Route::get('/attendee-list/{invitation_id}', [AttendeeListController::class, 'getByInvitation']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/guest-book', [GuestBookController::class, 'create']);
Route::post('/attendee-list', [AttendeeListController::class, 'create']);
Route::get('/invitation/{slug}', [InvitationController::class, 'getInvitationBySlug']);
// todo

Route::get('/test', function (Request $request) {
    // return 'hello world';
    $value = $request->cookie('token');
    // $qr = new Qr;
    $qr = DB::select('select * from qr where id = ?', [1]);

    return response()->json([
        'message' => 'success',
        'request' => $request,
        // 'cookie' => $value
        // 'qr' => $qr->create()
        'qr' => $qr
    ], 200);
});

function setNewCookie()
{
    $minutes = 60;
    $response = new HttpResponse('Set Cookie');
    $response->withCookie(cookie('name3', 'MyValueUpdate2', $minutes));
    return $response;
}

Route::get('/create-cookie', function () {
    // return setNewCookie();
    $minutes = 60;
    // $response = new HttpResponse('Set Cookie');
    // $response->withCookie(cookie('name3', 'MyValueUpdate', $minutes));
    // return $response;
    // setrawcookie('name3', 'value23', time() + 60);
    setrawcookie('tokenn', '38|zn1xy9R3Y3w4ZgrWacdbCWojxQwCEZP85G989n7q', time() + 60);

    return 'create cookie';
});
