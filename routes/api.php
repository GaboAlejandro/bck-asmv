
<?php

Route::group([
    'prefix' => 'appointments',
], function () {
    Route::post('store','AppointmentController@store');
    Route::post('index','AppointmentController@index');
    Route::post('show','AppointmentController@show');

});

Route::group([
    'middleware' => ['api', 'cors'],
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::put('register', 'AuthController@register');
});
