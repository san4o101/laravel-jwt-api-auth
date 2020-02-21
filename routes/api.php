<?php

use Illuminate\Http\Request;
use App\Enums\UserRole;

Route::group([
    'namespace' => 'API'
], function () {
    Route::group([
        'prefix' => 'auth',
        'as' => 'auth.',
        'namespace' => 'Auth'
    ], function () {
        Route::post('login', 'AuthController@login')->name('login');

        Route::group([
            'middleware' => 'auth:api'
        ], function() {
            Route::get('logout', 'AuthController@logout')->name('logout');
        });
    });

    Route::group([
        'namespace' => 'Admin',
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['auth:api', 'api.role:' . UserRole::getKey(UserRole::Admin)]
    ], function () {
        Route::get('', function (Request $request) {
            return response()->json([
                'role' => 'admin',
                'user' => $request->user()
            ], 200);
        });
    });

    Route::group([
        'namespace' => 'User',
        'as' => 'user.',
        'prefix' => 'user',
        'middleware' => ['auth:api', 'api.role:' . UserRole::getKey(UserRole::User)]
    ], function () {
        Route::get('', function (Request $request) {
            return response()->json([
                'role' => 'user',
                'user' => $request->user()
            ], 200);
        });
    });
});
