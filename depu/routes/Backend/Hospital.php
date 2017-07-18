<?php

/**
 * Hospital Controllers
 * All route names are prefixed with 'backend.'.
 */

Route::get('hospital/deleted', 'Hospital\HospitalController@deleted')->name('hospital.deleted');
Route::resource('hospital', 'Hospital\HospitalController');

Route::group(['prefix' => 'hospital/{hospital}', 'as' => 'hospital.', 'namespace' => 'Hospital'], function () {
    Route::get('restore', 'HospitalController@restore')->name('restore');
    Route::get('forcedelete', 'HospitalController@delete')->name('forcedelete');
    Route::get('image', 'HospitalController@getImage')->name('image.index');
    Route::post('image', 'HospitalController@storeImage')->name('image.store');
    Route::put('image/{image}', 'HospitalController@updateImage')->name('image.update');
    Route::get('image/{image}/delete', 'HospitalController@deleteImage')->name('image.delete');

    // 医生管理
    Route::get('doctor/deleted', 'DoctorController@deleted')->name('doctor.deleted');
    Route::resource('doctor', 'DoctorController');

    Route::group(['prefix' => 'doctor/{doctor}', 'as' => 'doctor.'], function () {
        Route::get('restore', 'DoctorController@restore')->name('restore');
        Route::get('forcedelete', 'DoctorController@delete')->name('forcedelete');
    });

    // 医疗翻译管理
    Route::get('medical/deleted', 'MedicalTranslationController@deleted')->name('medical.deleted');
    Route::resource('medical', 'MedicalTranslationController');

    Route::group(['prefix' => 'medical/{medical}', 'as' => 'medical.'], function () {
        Route::get('restore', 'MedicalTranslationController@restore')->name('restore');
        Route::get('forcedelete', 'MedicalTranslationController@delete')->name('forcedelete');
    });

    // 生活翻译管理
    Route::get('life/deleted', 'LifeTranslationController@deleted')->name('life.deleted');
    Route::resource('life', 'LifeTranslationController');

    Route::group(['prefix' => 'life/{life}', 'as' => 'life.'], function () {
        Route::get('restore', 'LifeTranslationController@restore')->name('restore');
        Route::get('forcedelete', 'LifeTranslationController@delete')->name('forcedelete');
    });

    // 保姆管理
    Route::get('nanny/deleted', 'NannyController@deleted')->name('nanny.deleted');
    Route::resource('nanny', 'NannyController');

    Route::group(['prefix' => 'nanny/{nanny}', 'as' => 'nanny.'], function () {
        Route::get('restore', 'NannyController@restore')->name('restore');
        Route::get('forcedelete', 'NannyController@delete')->name('forcedelete');
    });

    // 出租车管理
    Route::get('taxi/deleted', 'TaxiController@deleted')->name('taxi.deleted');
    Route::resource('taxi', 'TaxiController');

    Route::group(['prefix' => 'taxi/{taxi}', 'as' => 'taxi.'], function () {
        Route::get('restore', 'TaxiController@restore')->name('restore');
        Route::get('forcedelete', 'TaxiController@delete')->name('forcedelete');
    });

    // 酒店管理
    Route::get('hotal/deleted', 'HotalController@deleted')->name('hotal.deleted');
    Route::resource('hotal', 'HotalController');

    Route::group(['prefix' => 'hotal/{hotal}', 'as' => 'hotal.'], function () {
        Route::get('restore', 'HotalController@restore')->name('restore');
        Route::get('forcedelete', 'HotalController@delete')->name('forcedelete');
    });

    // 景区管理
    Route::get('tourism/deleted', 'TourismController@deleted')->name('tourism.deleted');
    Route::resource('tourism', 'TourismController');

    Route::group(['prefix' => 'tourism/{tourism}', 'as' => 'tourism.'], function () {
        Route::get('restore', 'TourismController@restore')->name('restore');
        Route::get('forcedelete', 'TourismController@delete')->name('forcedelete');

        // 景点管理
        Route::get('spot/deleted', 'SpotController@deleted')->name('spot.deleted');
        Route::resource('spot', 'SpotController');

        Route::group(['prefix' => 'spot/{spot}', 'as' => 'spot.'], function () {
            Route::get('restore', 'SpotController@restore')->name('restore');
            Route::get('forcedelete', 'SpotController@delete')->name('forcedelete');
        });
    });
});
