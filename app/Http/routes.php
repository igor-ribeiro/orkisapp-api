<?php

Route::group([ 'prefix' => 'v1', 'middleware' => 'cors' ], function () {
    $exceptRoutes = [ 'create', 'edit' ];
    
    Route::resource('nurseries', 'NurseriesController', ['except' => $exceptRoutes ]);

    Route::post('users/login', 'UsersController@login');

    Route::resource('users', 'UsersController', ['except' => $exceptRoutes ]);

    Route::get('users/{users}/nurseries', [
        'as'   => 'v1.users.nurseries',
        'uses' => 'UsersController@nurseries',
    ]);

    Route::resource('orchids', 'OrchidsController', [ 'except' => $exceptRoutes ]);
});
