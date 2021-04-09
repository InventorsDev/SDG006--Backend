<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/sign_in', 'Api\Auth\LoginController');
// Route::post('/sign_up_with_email', 'Api\Auth\RegistrationController');
Route::get('/sign_in_with_google', 'Api\Auth\SocialiteController@redirectToGoogle');
Route::get('/google_signin_callback', 'Api\Auth\SocialiteController@handleGoogleCallback');
Route::get("email/verify/{id}/{hash}", "Api\Auth\VerificationApiController@verify")->name("verification.verify");
Route::get("email/resend", "Api\Auth\VerificationApiController@resend")->name("verification.resend");
Route::post('/password/email', 'Api\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Api\Auth\ResetPasswordController@reset');
