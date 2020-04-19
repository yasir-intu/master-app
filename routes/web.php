<?php

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



Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('');
Route::get('/order', 'orderController@index')->name('');

// validatin routes

Route::get('/confirmation', 'Auth\VerificationController@confirmation')->name('user');

// social media login

// facebook login

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::get('/page/messenger/callback', 'SocialController@message')->middleware('verifyBot');
Route::post('/page/messenger/callback', 'SocialController@message');
Route::get('/page/message/callback2', 'SocialController@webhook');


// admin routes

// admin dashboard routes
Route::get('/admin', 'dashboard\dashboardController@index')->name('admin');

// admin user routes

Route::get('/admin/user/add', 'user\UserController@add')->name('add-user');
Route::post('/admin/user/add/submit', 'user\UserController@submit')->name('user-add');

// profile route

Route::get('/admin/profile', 'user\UserController@profile')->name('profile');
Route::post('/admin/profile/update/{id}/{email}/{slug}/{user_name}/{role}', 'user\UserController@profile_update')->name('profile-update');

// super admin's user route

Route::get('/admin/all/super-admin', 'user\SuperAdminController@super_admin')->name('super-admin-all-super-admin');
Route::get('/admin/all/managing-director', 'user\SuperAdminController@director')->name('super-admin-all-director');
Route::get('/admin/all/seniour-executive', 'user\SuperAdminController@executive')->name('super-admin-all-executive');
Route::get('/admin/all/employee', 'user\SuperAdminController@employee')->name('super-admin-all-employee');
Route::get('/admin/all/author', 'user\SuperAdminController@author')->name('super-admin-all-author');
Route::get('/admin/all/editor', 'user\SuperAdminController@editor')->name('super-admin-all-editor');

// managing director's user route

Route::get('/admin/managing-director/all/seniour-executive', 'user\Managing_DirectorController@executive')->name('managing-director-all-executive');
Route::get('/admin/managing-director/all/employee', 'user\Managing_DirectorController@employee')->name('managing-director-all-employee');

// seniour executive's user route

Route::get('/admin/seniour-executive/all/employee', 'user\Senior_ExecutiveController@employee')->name('senior-executive-all-employee');

// admin facebook page message routes
Route::get('admin/client-message', 'facebook_page_message\facebook_page_messageController@index')->name('facebook-page-message');
Route::get('admin/client-message/assigning', 'facebook_page_message\facebook_page_messageController@assigning')->name('facebook-page-message-assigning');
Route::get('admin/client-message/assigning1', 'facebook_page_message\facebook_page_messageController@assigning1')->name('facebook-page-message-assigning1');
Route::get('admin/client-message/next-pagination/{after}', 'facebook_page_message\facebook_page_messageController@next')->name('facebook-page-message-next-pagination');
Route::get('admin/client-message/prev-pagination/{before}', 'facebook_page_message\facebook_page_messageController@prev')->name('facebook-page-message-prev-pagination');
Route::get('admin/client-message/{id}/{unread}', 'facebook_page_message\facebook_page_messageController@view')->name('message-view');
Route::post('admin/client-message/{id}/{unread}/{sender}', 'facebook_page_message\facebook_page_messageController@send_message')->name('send-message');
Route::get('admin/client-message/{id}/{unread}/next-pagination/{after}', 'facebook_page_message\facebook_page_messageController@view_after')->name('message-next-pagination');
Route::get('admin/client-message/{id}/{unread}/prev-pagination/{before}', 'facebook_page_message\facebook_page_messageController@view_before')->name('message-prev-pagination');
Route::get('admin/client-message/{id}/{unread}/next/{after}', 'facebook_page_message\facebook_page_messageController@view_next')->name('message-view-next');
Route::get('admin/client-message/{id}/{unread}/prev/{before}', 'facebook_page_message\facebook_page_messageController@view_prev')->name('message-view-prev');

// admin Super Admin & Managing_Director facebook page message assigning routes
Route::post('admin/client-message/multi/assign', 'facebook_page_message\facebook_page_messageController@multi_assign')->name('facebook-page-message-assign-multi');

// admin Senior_executive facebook page message routes
Route::get('admin/senior-executive/client-message', 'facebook_page_message\senior_executiveController@index')->name('');
Route::get('admin/senior-executive/client-message1', 'facebook_page_message\senior_executiveController@ass')->name('facebook-page-message-senior-executive');
Route::get('admin/senior-executive/client-message2', 'facebook_page_message\senior_executiveController@ass1')->name('facebook-page-message-senior-executive1');
Route::get('admin/senior-executive/client-message/{id}/{unread}', 'facebook_page_message\senior_executiveController@view')->name('message-view-senior-executive');
Route::post('admin/senior-executive/client-message/multi/e/assign', 'facebook_page_message\senior_executiveController@multi_assign')->name('facebook-page-message-senior-executive-assign-multi');
Route::post('admin/senior-executive/client-message/assain/progressive', 'facebook_page_message\senior_executiveController@assain_progressive')->name('facebook-page-message-senior-executive-assain-progressive');
Route::post('admin/senior-executive/client-message/assain/complete', 'facebook_page_message\senior_executiveController@assain_complete')->name('facebook-page-message-senior-executive-assain-complete');
Route::post('admin/senior-executive/client-message/assain/reprogressive', 'facebook_page_message\senior_executiveController@assain_reprogressive')->name('facebook-page-message-senior-executive-assain-reprogressive');
Route::get('admin/senior-executive/client-message/{id}/{unread}/next/{after}', 'facebook_page_message\senior_executiveController@view_next')->name('message-view-next-senior-executive');
Route::get('admin/senior-executive/client-message/{id}/{unread}/prev/{before}', 'facebook_page_message\senior_executiveController@view_prev')->name('message-view-prev-senior-executive');


// admin Employee facebook page message routes
Route::get('admin/employee/client-message', 'facebook_page_message\employeeController@index')->name('facebook-page-message-employee');
Route::get('admin/employee/client-message/progressive', 'facebook_page_message\employeeController@progressive')->name('facebook-page-message-employee-progressive');
Route::get('admin/employee/client-message/complete', 'facebook_page_message\employeeController@complete')->name('facebook-page-message-employee-complete');
Route::post('admin/employee/client-message/assain/progressive', 'facebook_page_message\employeeController@assain_progressive')->name('facebook-page-message-employee-assain-progressive');
Route::post('admin/employee/client-message/assain/complete', 'facebook_page_message\employeeController@assain_complete')->name('facebook-page-message-employee-assain-complete');
Route::post('admin/employee/client-message/assain/reprogressive', 'facebook_page_message\employeeController@assain_reprogressive')->name('facebook-page-message-employee-assain-reprogressive');
Route::get('admin/employee/client-message/{id}/{unread}', 'facebook_page_message\employeeController@view')->name('message-view-employee');
Route::get('admin/employee/client-message/{id}/{unread}/next/{after}', 'facebook_page_message\employeeController@view_next')->name('message-view-next-employee');
Route::get('admin/employee/client-message/{id}/{unread}/prev/{before}', 'facebook_page_message\employeeController@view_prev')->name('message-view-prev-employee');
