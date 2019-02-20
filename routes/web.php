<?php

                    //Website 
Route::prefix('websites')->group(function(){
    Route::get          ('/{id}',                        'DynamicController@show'                 )->name('website_chose');
    Route::get          ('/add',                         'TeacherController@create'               )->name('teacher_add');
    Route::post         ('/save',                        'TeacherController@save'                 )->name('teacher_save');
    Route::get          ('/update/{id}',                 'TeacherController@edit'                 )->name('teacher_edit');
    Route::post         ('/update/{id}/save',            'TeacherController@update'               )->name('teacher_update');
    Route::post         ('/delete/{id}',                 'TeacherController@destroy'              )->name('teacher_destroy');
    Route::get          ('/resortlists',                 'DynamicController@resortlists'          )->name('website_resorts');
    Route::get          ('/aboutus/{id}',                'DynamicController@aboutus'              )->name('website_aboutus');
    Route::get          ('/services/{id}',               'DynamicController@services'             )->name('website_services');
    Route::get          ('/showadmin/{id}',              'DynamicController@adminlogo'            )->name('website_servicesss');
    Route::get          ('/reservation/{id}',            'DynamicController@reservation'          )->name('website_reservation');
});
                    //Company Information 
Route::prefix('companyinfo')->group(function(){
    Route::get          ('/',                            'CompanyinformationController@index'     )->name('website');
    Route::get          ('/add',                         'TeacherController@create'               )->name('teacher_add');
    Route::post         ('/store/{user_id}',             'CompanyinformationController@store'     )->name('teacher_store');
    Route::get          ('/update/{id}',                 'TeacherController@edit'                 )->name('teacher_edit');
    Route::post         ('/update/{id}/save',            'TeacherController@update'               )->name('teacher_update');
    Route::post         ('/delete/{id}',                 'TeacherController@destroy'              )->name('teacher_destroy');
});
                    // Resorts
Route::prefix('resorts')->group(function(){
    Route::get          ('/',                            'AccountController@index'                )->name('website');
    Route::get          ('/add',                         'AccountController@create'               )->name('resort_add');
    Route::post         ('/save',                        'AccountController@store'                )->name('teacher_store');
    Route::get          ('/update/{id}',                 'AccountController@edit'                 )->name('teacher_edit');
    Route::post         ('/update/{id}/save',            'AccountController@update'               )->name('teacher_update');
    Route::post         ('/delete/{id}',                 'AccountController@destroy'              )->name('teacher_destroy');
});
                // Galleries
Route::prefix('galleries')->group(function(){
    Route::get          ('/',                            'GalleryController@index'                )->name('gallery');
    Route::get          ('/show',                        'GalleryController@show'                 )->name('gallery_show');
    Route::get          ('/create',                      'GalleryController@create'               )->name('gallery_create');
    Route::post         ('/store',                       'GalleryController@store'                )->name('gallery_store');
    Route::get          ('/{id}/edit',                   'GalleryController@edit'                 )->name('gallery_edit');
    Route::patch         ('/{id}/save',                   'GalleryController@update'              )->name('gallery_update');
    Route::post         ('/delete/{id}',                 'GalleryController@destroy'              )->name('gallery_destroy');
});   
    // Notification
Route::prefix('notification')->group(function(){
    Route::get          ('/',                            'DynamicController@notification'         )->name('gallery');
    Route::post         ('/update',                      'DynamicController@notificationupdate'   )->name('gallery');
});  

Route::get('/','DynamicController@index');
Route::post('bookmassage/{id}/{amount}/{date}','BookmassageController@updateStatus');

Route::get('paypalform', function () {
    return view('paywithpaypal');
});

Route::post('paypal','PaymentController@payWithpaypal');
Route::get('status','PaymentController@getPaymentStatus');

Route::get('nt_admin', function () {
    return view('auth.adminlogin');
});

Route::resource('dashboard','DashboardController');

Route::get('nuatthaihome', function () {
    return view('home.index');
});

Route::get('nuatthaivirtualtour', function () {
    return view('website.pages.virtualtour');
});

Route::resource('bookmassagesave','BookmassageController');
Route::get('bookmassage', function () {
    return View::make('website.pages.bookmassage');
    return view('bookmassages.create');
});

Route::resource('bookmassages','BookmassageController');

Route::get('bookmassage', function () {
    return view('bookmassages.create');
});

// Route::get('accounts', function () {
//     return view('accounts.account');
// });
// Route::resource('accounts','AccountController');


Route::get('edit', function () {
    return view('accounts.editaccount');
});
Route::resource('massagereservations','BookmassageController');

Route::get('massagereservations', function () {
    return view('massagereservation.massagereservation');
});

Route::get('cabins', function () {
    return view('cabins.cabins');
});
Route::resource('cabins','CabinController');


Route::get('addcabin', function () {
    return view('cabins.addcabin');
});

Route::get('addstaff', function () {
    return view('staffs.addstaff');
});
Route::resource('staffs','StaffController');

Route::get('massagetypes', function () {
    return view('massagetypes.massagetypes');
});

Route::get('addmassagetype', function () {
    return view('massagetypes.addmassagetype');
});
Route::resource('massagetypes','MassagetypeController');

Route::get('packages', function () {
    return view('packages.packages');
});
Route::resource('packages','PackageController');


Route::get('branches', function () {
    return view('branches.branches');
});

Route::get('addbranch', function () {
    return view('branches.addbranch');
});
Route::resource('branches','BranchController');


Route::get('companyinformation', function () {
    return view('companyinformation.companyinformation');
});

Route::get('editcompanyinformation', function () {
    return view('companyinformation.editcompanyinformation');
});

Route::get('addpackage', function () {
    return view('packages.addpackage');
});

Route::get('addpromo', function () {
    return view('promotions.addpromo');
});
Route::resource('promotions', 'PromotionController');


Route::get('nuatthaiaboutus', function () {
    return view('website.pages.aboutus');
});

Route::get('nuatthaireservation', function () {
    return view('website.pages.reservation');
});


Route::get('bookingsummary', function () {
    return view('website.pages.bookingsummary');
});
Route::get('profile', function () {
    return view('website.pages.profile');
});


Auth::routes();
Route::get('bookmassages','BookmassageController@index');
Route::post('bookmassages/update','BookmassageController@update');
Route::get('bookmassages/create/{id}','PackageController@packagesdropdown');
Route::get('website/pages/reservation','BookmassageController@reservation');
Route::get('website/pages/allreservation','BookmassageController@allreservation');
Route::get('website/pages/services','PackageController@services');
Route::get('website/pages/profile','ProfileController@index');

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/home', [
    'uses' => 'LoginController@login',
    'as'   => 'home.index'
]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('home.index', function(){
          return view('home.index');
    })->name('home');

    Route::get('dashboard.index', function(){
        return view('dashboard.index');
    })->name('dashboard');

});

Route::get('dashboard.index', function (){
    if (Auth::user()->admin == 0){
        return view('home.index');
    }else if (Auth::user()->admin == 1){
        return view('dashboard.index', $users);
    }else{
        return view('dashboard.index', $users);
    }
});
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);