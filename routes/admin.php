<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'System\Admin\Login\loginController@index')->middleware('guest:admin');
Route::group(['prefix'=>'admin','namespace'=>'System\Admin','as'=>'admin.'],function(){

######################################### login Route ########################################
Route::group(['namespace'=>'Login','middleware'=>'guest:admin'],function(){
    Route::get('login','loginController@index')->name('login');
    Route::post('logincheck','loginController@login')->name('login.check');
});
######################################### login Route ########################################

Route::group(['middleware'=>'auth:admin'],function(){

    Route::group(['namespace'=>'Login'],function(){
        Route::get('logout','loginController@logoutManager')->name('logout'); //to logout user admin
    });
    
    Route::group(['namespace'=>'Admin_Setting'],function(){
        Route::get('admin_setting','Admin_SettingController@index')->name('admin_setting.index'); //to settings user admin
        Route::post('admin_setting_update','Admin_SettingController@update')->name('admin_setting.update'); //to settings user admin
    });

    Route::group(['namespace'=>'Dashboard'],function(){
        Route::get('dashboard','DashboardController@index')->name('dashboard'); //to logout user admin
    });

    Route::group(['namespace'=>'Member'],function(){
        Route::resource('members','MemberController');
        Route::get('getMembers','MemberController@getMembers')->name('getMembers');
        Route::post('multi_delete','MemberController@multi_delete')->name('members.multi_delete');
        Route::post('status_member','MemberController@status_member')->name('members.status_member');
    });
    ######################################### indebted_members Route ########################################
    Route::group(['namespace'=>'Member'],function(){
        Route::get('indebted_members','IndebtedMembersController@index')->name('indebted_members.index');
        Route::get('messages/{id}/{name?}','IndebtedMembersController@messages')->name('indebted_members.messages');
        Route::post('indebted_members/send_message','IndebtedMembersController@send_message')->name('indebted_members.send_message');
        Route::get('getIndebtedMembers','IndebtedMembersController@getIndebtedMembers')->name('indebted_members.getIndebtedMembers');
    
    });
    
    ######################################### indebted_members Route ########################################
    
    ######################################### members_expired_already Route ########################################
    Route::group(['namespace'=>'Member'],function(){
        Route::get('expired_already_members','ExpiredMembersAlreadyController@index')->name('expired_already_members.index');
        Route::post('expired_already_members/send_message','ExpiredMembersAlreadyController@send_message')->name('expired_already_members.send_message');
        Route::get('getExpiredMembersAlready','ExpiredMembersAlreadyController@getExpiredMembers')->name('expired_already_members.getExpiredMembersAlready');
    
    });
    
    ######################################### members_expired_already Route ########################################
    
    ######################################### expired_members Route ########################################
    Route::group(['namespace'=>'Member'],function(){
        Route::get('expired_members','ExpiredMembersController@index')->name('expired_members.index');
        Route::post('expired_members/send_message','ExpiredMembersController@send_message')->name('expired_members.send_message');
        Route::get('getExpiredMembers','ExpiredMembersController@getExpiredMembers')->name('expired_members.getExpiredMembers');
    
    });
    
    ######################################### expired_members Route ########################################
    
    ######################################### Attedance Route ########################################
    Route::group(['namespace'=>'Attendance'],function(){
        Route::get('attendance','AttendanceController@index')->name('attendance.index');
        Route::post('attendance/search_attendence','AttendanceController@search_attendence')->name('attendance.search_attendence');
        Route::post('attendance/assign_attendence','AttendanceController@assign_attendence')->name('attendance.assign_attendence');
        Route::post('attendance/show_attendence','AttendanceController@show_attendence')->name('attendance.show_attendence');
    });
    ######################################### Attedance Route ########################################
    
    ######################################### Fees Route ########################################
    Route::group(['namespace'=>'Fee'],function(){
        Route::resource('fees','FeeController');
        Route::get('getfees','FeeController@getFees')->name('getfees');
        Route::post('multi_delete','FeeController@multi_delete')->name('members.multi_delete');
        Route::post('status_member','FeeController@status_member')->name('members.status_member');
    });
    ######################################### Fees Route ########################################
    
    ######################################### Fees Route ########################################
    Route::group(['namespace'=>'Invoice'],function(){
        Route::get('invoice/{id}/{name?}','InvoiceController@index')->name('invoice.index');
        Route::post('invoice/store','InvoiceController@store')->name('invoice.store');
        Route::get('invoices/show/{id}','InvoiceController@show')->name('invoices.show');
        Route::post('invoice/edit/{id}','InvoiceController@edit')->name('invoice.edit');
        Route::post('invoice/update','InvoiceController@update')->name('invoice.update');
        Route::post('invoice/destroy','InvoiceController@destroy')->name('invoice.destroy');
        Route::post('invoice/multi_delete','InvoiceController@multi_delete')->name('invoice.multi_delete');
        Route::post('invoice/inquiry_remainig','InvoiceController@inquiry_remainig')->name('invoice.inquiry_remainig');
        Route::post('invoice/remaining','InvoiceController@remaining')->name('invoice.remaining');
        Route::get('getinvoices','InvoiceController@getInvoices')->name('invoice.getInvoices');
        //Route::post('status_member','FeeController@status_member')->name('members.status_member');
    ######################################### Fees Route ########################################
    
    });
});

});