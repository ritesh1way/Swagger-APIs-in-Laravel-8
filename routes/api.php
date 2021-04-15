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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group([
    'prefix' => 'v1',
    'as' => 'api.',
    'middleware' => ['auth:api'],
], function () {
    //lists all users
    Route::post('/all-user', 'Api\V1\ApiController@allUsers')->name('all-user');
});

//auth routes
Route::post('v1/user-register', 'Api\V1\AuthController@register');
Route::post('v1/user-login', 'Api\V1\AuthController@login');

//lists all active tests
Route::post('v1/test', 'Api\V1\ApiController@getActiveTest');

//lists payment detail of an individual
Route::post('v1/paymentdetail/{id}', 'Api\V1\API@paymentDetail');

//lists test user details
Route::post('v1/testuser', 'Api\V1\ApiController@testUsers');

//lists all active packages
Route::post('v1/package', 'Api\V1\ApiController@getPackages');

//lists every tests within the package
Route::post('v1/packagedetail/{id}', 'Api\V1\ApiController@getPackageDetails');

//lists all test details(test sections, questions, options)
Route::post('v1/testdetail/{id}', 'Api\V1\ApiController@testDetails');
