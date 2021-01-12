<?php

Route::group(['middleware' => config('settings.middleware')], function () {
    Route::resource(config('settings.route'), 'brandnewteam\Settings\App\Http\Controllers\SettingsController');
    Route::get(config('settings.route') . '/download/{setting}', 'brandnewteam\Settings\App\Http\Controllers\SettingsController@fileDownload');
});
