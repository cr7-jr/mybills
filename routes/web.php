<?php

use Illuminate\Support\Facades\Auth;
use App\Events\pop;

define('BANK_DOMAIN_NAME', 'http://localhost:777/bemoBank/public/');
define('Billing_CORPORATION_DOMAIN_NAME', 'http://localhost:777/billingCorporation/public/');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Auth::routes();
        Route::get('/', function () {
            return redirect()->route('login');
        });
        Route::prefix('myBills')->group(
            function () {

                Route::get('verify/{token}', 'client\clientController@verify')->name('verify');
                Route::get('resetPassword', 'client\clientController@showResetPasswordForm')->name('showResetPasswordForm');
                Route::post('searshYourAccount', 'client\clientController@searshYourAccount')->name('searshYourAccount');
                Route::get('showSetNewPassword/{token_reset_password}', 'client\clientController@showsetNewPassword')->name('showSetNewPassword');
                Route::post('setNewPassword/{token_reset_password}', 'client\clientController@setNewPassword')->name('setNewPassword');
            }
        );
        Route::middleware('auth')->group(function () {
            Route::middleware(['accountIsActivated'])->group(function () {
                Route::get('/myBills', 'client\homeController@index')->name('home');

                Route::prefix('myBills')->group(function () {

                    Route::resource('Question', 'client\questionController');
                    Route::resource('Client', 'client\clientController')->except('index', 'create', 'store', 'show', 'destroy');
                    //pages view bills
                    Route::get('new/Telecome/bill/{phone_number}/{course_number}', 'client\billTelecomeController@show')->name('telecome.bills.view');
                    Route::get('new/Electricity/bill/{hour_number}/{course_number}', 'client\billElecticityController@show')->name('electricity.bills.view');
                    Route::get('new/Water/bill/{counter_number}/{course_number}', 'client\billWaterController@show')->name('water.bills.view');

                    Route::get('archived/Telecome/bill/{phone_number}/{course_number}', 'client\billTelecomeController@showArchived')->name('archived.telecome.bills.view');
                    Route::get('archived/Electricity/bill/{hour_number}/{course_number}', 'client\billElecticityController@showArchived')->name('archived.electricity.bills.view');
                    Route::get('archived/Water/bill/{counter_number}/{course_number}', 'client\billWaterController@showArchived')->name('archived.water.bills.view');

                    Route::post('Telecome/bill/pay/{phone_number}/{course_number}/idBank/{id_bank}', 'client\billTelecomeController@pay')->name('telecome.bill.pay');
                    Route::post('Electricity/bill/pay/{hour_number}/{course_number}/idBank/{id_bank}', 'client\billElecticityController@pay')->name('electricity.bill.pay');
                    Route::post('Water/bill/pay/{counter_number}/{course_number}/idBank/{id_bank}', 'client\billWaterController@pay')->name('water.bill.pay');

                    Route::post('Telecome/bill/pay/all', 'client\billTelecomeController@payAll')->name('telecome.bill.payAll');
                    Route::post('Electricity/bill/pay/all', 'client\billElecticityController@payAll')->name('electricity.bill.payAll');
                    Route::post('Water/bill/pay/all', 'client\billWaterController@payAll')->name('water.bill.payAll');

                    Route::post('bill/pay/all', 'client\payController@payAll')->name('bill.payAll');
                });
                Route::prefix('myBills/new')->group(function () {
                    Route::get('/telecome', 'client\homeController@telecome')->name('new.telecome');
                    Route::get('/electricity', 'client\homeController@electricity')->name('new.electricity');
                    Route::get('/water', 'client\homeController@water')->name('new.water');
                });
                Route::prefix('myBills/archived')->group(function () {
                    Route::get('/telecome', 'client\billTelecomeController@archived')->name('archived.telecome');
                    Route::get('/electricity', 'client\billElecticityController@archived')->name('archived.electricity');
                    Route::get('/water', 'client\billWaterController@archived')->name('archived.water');
                });

                Route::resource('myBills/places', 'client\placeController')->except('edit', 'update', 'store', 'destroy', 'create');
                Route::resource('myBills/CategoryNews', 'client\categoryNewsController');
                Route::resource('myBills/category.news', 'client\newsController');
            });
            Route::get('/logout', function () {
                Auth::logout();
                return redirect()->route('login');
            });
        });
    }
);
Route::get('pdfTelecome', 'additionsController@pdfTelecome')->name('pdfTelecome');
Route::get('pdfElectricity', 'additionsController@pdfElectricity')->name('pdfElectricity');
Route::get('pdfWater', 'additionsController@pdfWater')->name('pdfWater');
Route::get('pdfTelecomeArchived', 'additionsController@pdfTelecomeArchived')->name('pdfTelecomeArchived');
Route::get('pdfElectricityArchived', 'additionsController@pdfElectricityArchived')->name('pdfElectricityArchived');
Route::get('pdfWaterArchived', 'additionsController@pdfWaterArchived')->name('pdfWaterArchived');

Route::get('accountIsNotActivated', function () {
    if (Auth::user()->verified()) {
        return redirect(route('home'));
    }
    return view('accountDisabled');
});
Route::get('reSendEmailVerified/{user}', 'client\clientController@reSendEmailVerified')->name('reSendEmailVerified');

Route::any('a', function () {
    event(new pop("hello"));
    return view('welcome');
});
Route::get('sendEmails',function (){
    $emails=\App\emails::chunk(50,function ($data){
        dispatch(new \App\Jobs\sendEmail($data));
    });
    return "job run !";
});
