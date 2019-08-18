
<?php

Route::group([
    'middleware' => ['api'],
    'prefix' => 'appointments',
], function () {
    Route::post('store','AppointmentController@store')-> name('appointments.store');
    Route::post('index','AppointmentController@index')-> name('appointments.index');
    Route::post('show','AppointmentController@show')-> name('appointments.show');

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
