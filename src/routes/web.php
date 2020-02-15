<?php
$namespace = 'TES\Cartli\App\Http\Controllers';
Route::group([    
    'namespace' => $namespace,
    'middleware' => ['web'], 
    'prefix' => 'admin'
], function () {
    Route::get('/login', 'Auth\LoginController@index')->name('admin.login.index');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login.attempt');
    Route::group([   
        'middleware' => ['auth:admin'],
    ], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
    });
});