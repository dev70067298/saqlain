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

Route::get('/','pagesController@login');
Route::get('/register','pagesController@register')->name('register');
Route::get('/login','pagesController@login')->name('login');
Route::get('/Frontend-Settings','pagesController@Frontend')->name('Frontend-Settings');

Route::post('/signup','authController@signup')->name('signup');
Route::post('/signin','authController@signin')->name('signin');

Route::get('/admin','adminController@index');
Route::get('/dashboard','adminController@dashboard')->name('dashboard');
Route::post('/admin_login','authController@admin_login')->name('admin_login');
Route::get('/admin_logout','authController@admin_logout')->name('admin_logout');
Route::get('/user_logout','authController@user_logout')->name('user_logout');
Route::get('/researcher_list','adminController@researcher_list')->name('researcher_list');
Route::get('/buyer_list','adminController@buyer_list')->name('buyer_list');
Route::get('/researcher_request','adminController@researcher_request')->name('researcher_request');
Route::get('/admin_profile','adminController@admin_profile')->name('admin_profile');
Route::get('/deactive_buyer/{id}','adminController@deactive_buyer')->name('deactive_buyer');
Route::get('/del_buyer/{id}','adminController@del_buyer')->name('del_buyer');
Route::get('/deactive_researcher/{id}','adminController@deactive_researcher')->name('deactive_researcher');
Route::get('/del_researcher/{id}','adminController@del_researcher')->name('del_researcher');
Route::get('/reject_researcher/{id}','adminController@reject_researcher')->name('reject_researcher');
Route::get('/accept_researcher/{id}','adminController@accept_researcher')->name('accept_researcher');
Route::get('/edit_buyer/{id}','adminController@edit_buyer')->name('edit_buyer');
Route::post('/buyer_update/{id}','adminController@buyer_update')->name('buyer_update');
Route::get('/edit_researcher/{id}','adminController@edit_researcher')->name('edit_researcher');
Route::post('/researcher_update/{id}','adminController@researcher_update')->name('researcher_update');
Route::get('/accept_buyer/{id}','adminController@accept_buyer')->name('accept_buyer');
Route::post('/admin_profile_update/{id}','adminController@admin_profile_update')->name('admin_profile_update');
Route::get('/admin_comment','adminController@admin_comment')->name('admin_comment');
Route::get('/chat/{id}','ChatController@chat')->name('chat');
Route::post('/send_message','ChatController@send_message')->name('send_message');
Route::get('/package','adminController@package')->name('package');
Route::post('/add_package','adminController@add_package')->name('add_package');
Route::get('/del_package/{id}','adminController@del_package')->name('del_package');
Route::get('/edit_package/{id}','adminController@edit_package')->name('edit_package');
Route::post('/update_package/{id}','adminController@update_package')->name('update_package');


//Researcher Routes
Route::get('/reseacherdash','ResearcherController@reseacherdash')->name('reseacherdash');
Route::get('/researcher_profile','ResearcherController@researcher_profile')->name('researcher_profile');
Route::post('/researcher_profile_update/{id}','ResearcherController@researcher_profile_update')->name('researcher_profile_update');
Route::get('/researcher_chat/{id}','ChatController@researcher_chat')->name('researcher_chat');
Route::post('/send_message_researcher','ChatController@send_message_researcher')->name('send_message_researcher');
Route::get('/research_service','ResearcherController@research_service')->name('research_service');
Route::post('/researcher_service','ResearcherController@researcher_service')->name('researcher_service');
Route::get('/delete_service/{id}','ResearcherController@delete_service')->name('delete_service');
Route::get('/group_teacher_data/{id}','ResearcherController@group_teacher_data')->name('group_teacher_data');
Route::get('/group_student_data/{id}','bidController@group_student_data')->name('group_student_data');



Route::get('/researches','ResearchController@researches')->name('researches');
Route::post('/add_research','ResearchController@add_research')->name('add_research');
Route::get('/edit_research/{id}','ResearchController@edit_research')->name('edit_research');
Route::post('/update_research/{id}','ResearchController@update_research')->name('update_research');
Route::get('/change_research_status/{id}/{value}','ResearchController@change_research_status')->name('change_research_status');

//Buyer Routes
Route::get('/buyerdash','BuyerController@buyerdash')->name('buyerdash');
Route::get('/buyer_profile','BuyerController@buyer_profile')->name('buyer_profile');
Route::post('/buyer_profile_update/{id}','BuyerController@buyer_profile_update')->name('buyer_profile_update');
Route::get('/buyer_chat/{id}','ChatController@buyer_chat')->name('buyer_chat');
Route::post('/send_message_buyer','ChatController@send_message_buyer')->name('send_message_buyer');
Route::get('/assets','adminController@assets')->name('assets');
Route::post('/add_asset','adminController@add_asset')->name('add_asset');
Route::get('/del_asset/{id}','adminController@del_asset')->name('del_asset');
Route::get('/admin_service','adminController@admin_service')->name('admin_service');
Route::post('/add_service','adminController@add_service')->name('add_service');
Route::get('/del_service/{id}','adminController@del_service')->name('del_service');
Route::get('/market','adminController@market')->name('market');
Route::post('/add_market','adminController@add_market')->name('add_market');
Route::get('/del_market/{id}','adminController@del_market')->name('del_market');
Route::get('/buyer_researcher','BuyerController@buyer_researcher')->name('buyer_researcher');
Route::get('/service_list/{id}','BuyerController@service_list')->name('service_list');
Route::get('/signal_list/{service}/{researcher}','BuyerController@signal_list')->name('signal_list');
Route::get('/add_credit','BuyerController@add_credit')->name('add_credit');
Route::get('/chat_page','ChatController@chat_page')->name('chat_page');
Route::post ('/strip', 'BuyerController@payment');
Route::get('/services','BuyerController@services')->name('services');
Route::get('/file_down/{id}','BuyerController@file_down')->name('file_down');
Route::post('/cart','BuyerController@cart')->name('cart');
Route::get('/order','BuyerController@order')->name('order');
Route::get('/delete_order/{id}','BuyerController@delete_order')->name('delete_order');
Route::get('/bid_product','ResearchController@bid_product')->name('bid_product');
Route::post('/add_bid','ResearchController@add_bid')->name('add_bid');
Route::get('/del_bid/{id}','ResearchController@del_bid')->name('del_bid');
Route::get('/buyer_bid','bidController@buyer_bid')->name('buyer_bid');
Route::get('/your_bid/{id}','bidController@your_bid')->name('your_bid');
Route::post('/send_bid/{id}','bidController@send_bid')->name('send_bid');
Route::get('/Biddingpage','bidController@Biddingpage')->name('Biddingpage');
Route::get('/home','bidController@home')->name('home');
Route::get('/about','bidController@about')->name('about');
Route::resource('/events', EventsController::class);
Route::post('/events/{event}','EventsController@update')->name('events.update');
Route::get('/events/{event}','EventsController@destroy')->name('events.destroy');
Route::resource('/articals', ArticalController::class);
Route::post('/articals/{artical}','ArticalController@update')->name('articals.update');
Route::get('/articals/{artical}','ArticalController@destroy')->name('articals.destroy');
Route::resource('/groups', GroupController::class);
Route::resource('/projects', ProjectController::class);
Route::resource('/assign', AssignController::class);

Route::get('/indexteacher','AssignController@indexteacher')->name('indexteacher');
Route::post('/assignteacher','AssignController@assignteacher')->name('assignteacher');

Route::get('/assigns/{id}','AssignController@destroy')->name('assigns.destroy');
Route::get('/assigns1/{id}','AssignController@destroy1')->name('assigns.destroy1');
Route::get('/groups/{group}','GroupController@destroy')->name('groups.destroy');
Route::get('/projects/{project}','ProjectController@destroy')->name('projects.destroy');
Route::resource('/announcements', AnnouncementController::class);
Route::post('/announcements/{announcement}','AnnouncementController@update')->name('announcements.update');
Route::get('/announcements/{announcement}','AnnouncementController@destroy')->name('announcements.destroy');
