<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::get('/create-super/{email}','authentication\RegistrationController@createAdmin');

//Authentication Routes
Route::post('/logout', 'authentication\LogController@logout')->name('logout');
Route::post('/admin/login/', 'authentication\LogController@check')->name('login_check');
Route::group([
    'namespace'=>'authentication',
    'middleware' => 'visitor'
], function () {

    Route::get('/', 'LogController@login')->name('admin_login');
    Route::get('/register', 'RegistrationController@register')->name('register');
//    Route::get('/login','LogController@admin_login')->name('admin_login');
    Route::get('/forgot_password','ForgotPasswordController@forgot_password')->name('forgot_password');
    Route::POST('/post_forgot_password','ForgotPasswordController@post_forgot_password')->name('post_forgot_password');

    //activation
    Route::get('/activate/{email}/{activationCode}','authentication\ActivationController@activate');

    Route::post('/store', 'authentication\RegistrationController@store')->name('register_user');

    //forgot_password
    Route::get('/reset_password/{email}/{code}','authentication\ForgotPasswordController@reset');
    Route::post('/reset_password/{email}/{code}','authentication\ForgotPasswordController@post_reset')->name('post_password_reset');

});

Route::get('/api-hint','authentication\LogController@apiHints');

Route::group([
    'prefix' => '/admin',
    'namespace'=>'admin',
    'as' => 'admin.',
    'middleware' => 'sentinel'
], function () {

    //dashboard
    Route::get('/',function(){
        return view('admin.index');
    })->name('dashboard');



    //    post type
    Route::get('/post_type', 'PostTypeController@index')->name('post_type');
    Route::get('/post_type/create', 'PostTypeController@create')->name('post_type.create');
    Route::post('/post_type/store', 'PostTypeController@store')->name('post_type.store');
    Route::get('/post_type/delete/{slug}', 'PostTypeController@destroy')->name('post_type.delete');
    Route::get('/post_type/edit/{slug}', 'PostTypeController@edit')->name('post_type.edit');
    Route::post('/post_type/update', 'PostTypeController@update')->name('post_type.update');
    Route::get('/post_type/order', 'PostTypeController@ordering')->name('post_type.order');
    Route::post('/post_type/order/store', 'PostTypeController@orderStore')->name('post_type.order.store');

    //    gobal post
    Route::get('/post/{post_type}', 'GlobalController@index')->name('post');
    Route::get('/post/{post_type}/create', 'GlobalController@create')->name('post.create');
    Route::post('/post/{post_type}/store', 'GlobalController@store')->name('post.store');
    Route::get('/post/{post_type}/delete/{slug}', 'GlobalController@destroy')->name('post.delete');
    Route::get('/post/{post_type}/edit/{slug}', 'GlobalController@edit')->name('post.edit');
    Route::post('/post/{post_type}/update', 'GlobalController@update')->name('post.update');
    Route::get('/post/{post_type}/order', 'GlobalController@ordering')->name('post.order');
    Route::post('/post/{post_type}/order/store', 'GlobalController@orderStore')->name('post.order.store');
    Route::post('/post/delete/field_file/{id}', 'GlobalController@deleteFieldFile')->name('post.delete.field_file');
    Route::get('/post/{post_type}/trash', 'GlobalController@getTrash')->name('post.trash');
    Route::get('/post/{post_type}/log', 'GlobalController@log')->name('post.log');
    Route::get('/post/{post_type}/restore/{slug}', 'GlobalController@getRestore')->name('post.restore');
    Route::get('/post/{post_type}/forcedelete/{slug}', 'GlobalController@forceDelete')->name('post.forcedelete');





    //    custom field
    Route::get('/custom_field', 'CustomFieldController@index')->name('custom_field');
    Route::get('/custom_field/create', 'CustomFieldController@create')->name('custom_field.create');
    Route::post('/custom_field/store', 'CustomFieldController@store')->name('custom_field.store');
    Route::get('/custom_field/delete/{slug}', 'CustomFieldController@destroy')->name('custom_field.delete');
    Route::get('/custom_field/edit/{slug}', 'CustomFieldController@edit')->name('custom_field.edit');
    Route::post('/custom_field/update', 'CustomFieldController@update')->name('custom_field.update');

    Route::get('/custom_field/field', 'CustomFieldController@getField')->name('custom_field.field');
    Route::get('/custom_field/field/delete,{id}', 'CustomFieldController@deleteField')->name('custom_field.field.delete');
    Route::get('/custom_field/{slug}/field_position', 'CustomFieldController@filedPosition')->name('custom_field.field_position');
    Route::post('/custom_field/filed/order/store', 'CustomFieldController@orderStore')->name('custom_field.field.order.store');


    //    User role
    Route::get('/user/role', 'RoleController@userRole')->name('user.role');
    Route::post('/user/role', 'RoleController@userRoleStore')->name('user.role.store');
    Route::get('/user/role/edit/{id}', 'RoleController@userRoleEdit')->name('user.role.edit');
    Route::post('/user/role/update', 'RoleController@userRoleUpdate')->name('user.role.update');
    Route::get('/user/role/delete/{id}', 'RoleController@userRoleDelete')->name('user.role.delete');
    Route::get('/user/role/permission/{id}', 'RoleController@userRolePermission')->name('user.role.permission');
    Route::post('/user/role/permission', 'RoleController@userRolePermissionStore')->name('user.role.permission.store');


    //    User permission
    Route::get('/user/permission', 'PermissionController@userPermission')->name('user.permission');
    Route::post('/user/permission', 'PermissionController@userPermissionStore')->name('user.permission.store');
    Route::get('/user/permission/edit/{id}', 'PermissionController@userPermissionEdit')->name('user.permission.edit');
    Route::post('/user/permission/update', 'PermissionController@userPermissionUpdate')->name('user.permission.update');
    Route::get('/user/permission/delete/{id}', 'PermissionController@userPermissionDelete')->name('user.permission.delete');


    //    user create
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::get('/user/delete/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/user/update', 'UserController@update')->name('user.update');
    Route::get('/user/profile', 'UserController@myProfile')->name('user.profile');
    Route::post('/user/profile/update', 'UserController@myProfileUpdate')->name('user.profile.update');


    Route::get('site', 'SiteController@index')->name('site');
    Route::post('site', 'SiteController@update')->name('site.update');

    Route::get('analytic', 'AnalyticController@index')->name('analytic');
    Route::get('analytic/realtime', 'AnalyticController@getRealTimeVisitor')->name('analytic.realtime');

    Route::get('/contacts','ContactController@index')->name('contacts');


    //Brands
    Route::get('/brands','BrandController@index')->name('brands');
    Route::post('/brand/add','BrandController@add')->name('brands.add');
    Route::get('/brand/edit/{id}','BrandController@edit')->name('brands.edit');
    Route::post('/brand/edit/{id}','BrandController@update')->name('brands.update');
    Route::post('/brand/delete','BrandController@delete')->name('brands.delete');

    //Brand-Setting
    Route::get('brand-setting/{brandSlug}','BrandSettingController@index')->name('brand.setting');
    Route::post('brand-setting/{brandSlug}','BrandSettingController@update')->name('brand.setting.update');

    //Hotels
    Route::get('/hotels','HotelController@index')->name('hotels');
    Route::post('/hotel/add','HotelController@add')->name('hotels.add');
    Route::get('/hotel/edit/{id}','HotelController@edit')->name('hotels.edit');
    Route::post('/hotel/edit/{id}','HotelController@update')->name('hotels.update');
    Route::post('/hotel/delete','HotelController@delete')->name('hotels.delete');

    //Room Types
    Route::get('/room-types','RoomTypeController@index')->name('roomType');
    Route::get('/room-type/add/{hotel_slug}','RoomTypeController@add')->name('roomType.add');
    Route::post('/room-type/add/{hotel_slug}','RoomTypeController@store')->name('roomType.store');
    Route::get('/room-type/edit/{roomTypeSlug}','RoomTypeController@edit')->name('roomType.edit');
    Route::post('/room-type/edit/{roomTypeSlug}','RoomTypeController@update')->name('roomType.update');
    Route::post('/room-type/delete','RoomTypeController@delete')->name('roomType.delete');
    // Room Routes
    Route::post('/room/add/','RoomController@store')->name('room.add');
    Route::get('room/edit/','RoomController@edit')->name('room.edit');
    Route::post('room/update','RoomController@update')->name('room.update');
    Route::post('room/delete','RoomController@delete')->name('room.delete');

    //Faq Category
    Route::get('/faqs','FaqController@index')->name('faqs');
    Route::post('/faqs','FaqController@storeCategory')->name('faqCategory.store');
    Route::get('/faq-category/{slug}/edit','FaqController@editCategory')->name('faqCategory.edit');
    Route::post('/faq-category/{slug}/edit','FaqController@updateCategory')->name('faqCategory.update');
    Route::post('/faq-category/delete','FaqController@deleteCategory')->name('faqCategory.delete');
    // Faq Question
    Route::post('/faq-question/add','FaqController@storeQuestion')->name('faq.store');
    Route::get('/faq-question/edit','FaqController@editQuestion')->name('faq.edit');
    Route::post('/faq-question/update','FaqController@updateQuestion')->name('faq.update');
    Route::post('/faq-question/delete','FaqController@deleteQuestion')->name('faq.delete');

    //Amenities Crud
    Route::get('/amenities','AmenityController@index')->name('amenities');

    //Inclusions Crud
    Route::get('/inclusions','InclusionController@index')->name('inclusions');

    //Booking
    Route::get('/booking/new','BookingController@new')->name('booking.new');
    Route::post('/booking/checkAvailable','BookingController@checkAvailable')->name('booking.checkAvailable');
    Route::post('/booking/proceed','BookingController@proceedBooking')->name('booking.proceedBooking');
    Route::post('/booking/new','BookingController@finalize')->name('booking.finalize');
});
