<?php


/*
 * Global Constants Variables
 * */
define('PAGINATE_NUMBER' , 5);
define('RIDE_NOT_ACTIVE' , __('messagesGlobal.rideNotActive') );
define('RIDE_IS_ACTIVE' , __('messagesGlobal.rideIsActive'));
define('YES' , __('messagesGlobal.yes'));
define('NO' , __('messagesGlobal.no'));


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


/*
 * Multi Language Route .. Mcamara
 * */
Route::group(['prefix' => LaravelLocalization::setLocale() ,
                'middleware' => ['localeSessionRedirect' , 'localizationRedirect' , 'localeViewPath']] ,
     function(){

    /*
     * Main Routes to open Main Pages
     * */
    Route::group(["namespace" => "PagesControllers"] , function(){
        Route::get('/' , 'HomeController@index') ->name('home');
        Route::get('/home' , 'HomeController@index');
        Route::get('/drivers' , 'DriversController@index') ->name('drivers');
        Route::get('/drivers/{driver_id}' , 'DriverRatingController@show') ->name('driver-rating');
        Route::get('/rides' , 'RidesController@index') ->name('rides');
        Route::get('/search' , 'SearchController@index')->name('search');
        Route::get('/our-terms' , 'HomeController@ourTerms') -> name('our-terms');

    });

    /*
     * routes for more information
     * */
    Route::group(['namespace' => 'Information'],function(){
        Route::get('/user_information/{user_id}' , 'UserInfoController@index')->name('user.info');
    });


    /*
     * routes for rides information
     * */
    Route::group(["prefix" => "rides" , "namespace" => "Rides"] , function(){
        Route::get('/{ride_id}' , 'ReadAllController@rideReadAll')->name('ride.read.all');
    });

    /*
     * Routes for authenticated drivers to make own drivers operations
     * Create Rides
     * Show driver rides
     * Add Cars
     * */
    Route::get('/show-driver-rides/{driver_id}' , 'Drivers\CrudDriverController@showDriverRides')->name('show.driver.rides');
    Route::group(['prefix' => 'drivers' , 'namespace' => 'Drivers' , 'middleware' => 'driver'] , function(){
        Route::get('/create-ride/{driver_id}' , 'CreateRideController@index')->name('createRideIndex');
        Route::post('/create-ride/create' , 'CreateRideController@store') ->name ('create.driver.ride');


        Route::get('/edit-driver-ride/{ride_id}' , 'CrudDriverController@editDriverRide')->name('edit.driver.ride');
        Route::post('/update-driver-ride/{ride_id}' , 'CrudDriverController@updateDriverRide')->name('update.driver.ride');
        Route::get('/close-driver-ride/{ride_id}' , 'CrudDriverController@closeDriverRide')->name('close.driver.ride');
        Route::get('/activate-driver-ride/{ride_id}' , 'CrudDriverController@activateDriverRide')->name('activate.driver.ride');
        Route::get('/delete-driver-ride/{ride_id}' , 'CrudDriverController@deleteDriverRide')->name('delete.driver.ride');

        Route::get('/add-driver-car/{driver_id}' , 'AddCarController@index')->name('add.car.index');
        Route::post('/add-driver-car/create/{driver_id}' , 'AddCarController@store')->name('add.driver.car');
        Route::get('/show-driver-cars/{driver_id}' , 'CrudDriverCarController@showDriverCars')->name('show.driver.cars');
        Route::get('/edit-driver-car/{car_id}' , 'CrudDriverCarController@editDriverCar')->name('edit.driver.car');
        Route::get('/delete-driver-car/{car_id}' , 'CrudDriverCarController@deleteDriverCar')->name('delete.driver.car');
        Route::post('/update-driver-car/{car_id}' , 'CrudDriverCarController@updateDriverCar')->name('update.driver.car');

        Route::get('show-licenses-requests/{driver_id}' , 'LicenseRequestsController@index')->name('show.license.requests');
        Route::post('send-licenses-requests/{driver_id}' , 'LicenseRequestsController@store')->name('send.license.request');
    });


    /*
     * Routes to public user or driver to booking rides
     * */
    Route::group(['prefix' => 'booking-ride' , 'namespace' => 'BookingRides'] , function(){
        Route::post('/create-booking-ride' , 'CrudBookingController@store') -> name('create-booking-ride');
    });

    /*
     * Routes for notifications
     * */
     Route::group(['prefix' => 'notifications' , 'namespace' => 'Notifications'] , function(){
         Route::get('/' , 'NotificationsController@index') -> name('show.notifications');
         Route::get('/accept-ride-request/{ride_id}' , 'NotificationsController@acceptRideRequest')->name('accept.ride.request');
         Route::get('/reject-ride-request/{ride_id}' , 'NotificationsController@rejectRideRequest')->name('reject.ride.request');
     });

    //////////////////// Redirect pages after failed with errors \\\\\\\\\\\\\\\\\



    //////////////////////////////////////////////////////////



    ///////////////////////////////////////////// Routes for test /////////////////////
    Route::view('/master' , 'layouts.master');
    Route::get('show-users' , 'Tests\TestController@showUsers');
    Route::get('show' , 'Tests\TestController@show');
    Route::get('show-drivers' , 'Tests\TestController@showDrivers');
    Route::get('show-cars' , 'Tests\TestController@showCars');
    Route::get('get-index' , function(){
       return view('index');
    });
    //////////////////////////////////////////////////////////////////////////////////



    //////////// Authentication & Registering $ Login /////////////
    Auth::routes();
    Route::get('/updateAccount/{id}' , 'Auth\UpdateAccountController@index') -> name('updateAccount');
    Route::post('/updateAccount/update/{id}' , 'Auth\UpdateAccountController@update') -> name('updateRegister');
    // Route::resource('updateAccount' , 'Auth\UpdateAccountController');
    // Route::get('/home', 'HomeController@index')->name('home');
    ///////////////////////////////////////////////////////////////////////////////

    Route::get('rating/{driver_id}' , 'DriverRatingController@getDriverRating');
    Route::post('rating/{user_id}/{driver_id}' , 'DriverRatingController@setDriverRating');
    
});
