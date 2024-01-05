<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();

    return response()->json(['message' => 'User logged out successfully'],201);
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);     
Route::get('get',function(){
    return "hello ";
}); 

Route::post('/savefeedback', [FeedbackController::class, 'save']);
Route::get('/getfeedbacks', [FeedbackController::class, 'get']);
Route::post('/savecomment', [CommentController::class, 'savecomment']);
Route::get('/getallcomments', [CommentController::class, 'getAllComments']);

