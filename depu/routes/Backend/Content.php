<?php

/**
 * Content Controllers
 * All route names are prefixed with 'backend.'.
 */

Route::group([
        'namespace' => 'Content',
        'prefix' => 'content',
        'as' => 'content.',
    ], function () {

    // 服务管理
    // Route::get('menu/deleted', 'MenuController@deleted')->name('menu.deleted');
    Route::resource('service', 'ServiceController', ['only' => ['index', 'edit', 'update']]);

});
