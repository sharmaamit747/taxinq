
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


//Web Front
Route::get('/', 'WebController@index')->name('/');
Route::get('/contact-us', 'WebController@contact')->name('/contact-us');
Route::get('/news', 'WebController@news')->name('/news');
Route::get('/news-single/{id}', 'WebController@news_single')->name('/news-single');
Route::get('/services', 'WebController@services')->name('/services');
Route::get('/services/gst', 'WebController@gst')->name('/services/gst');
Route::get('/services/customs', 'WebController@customs')->name('/services/customs');
Route::get('/services/income-tax', 'WebController@incometax')->name('/services/income-tax');
Route::get('/services/corporation-tax', 'WebController@corporationtax')->name('/services/corporation-tax');
Route::get('/services/pf-esi', 'WebController@pfesi')->name('/services/pf-esi');
Route::get('/services/labor-law', 'WebController@laborlaw')->name('/services/labor-law');
Route::get('/blogs', 'WebController@blogs')->name('/blogs');
Route::get('/blog/{id}', 'WebController@blog')->name('/blog');
Route::get('/blog-category/{id}', 'WebController@blog_category')->name('/blog-category');
Route::get('/blog-tag/{id}', 'WebController@blog_tag')->name('/blog-tag');
Route::post('/add_comment', 'WebController@add_comment')->name('/add_comment');
Route::post('/contact-submit', 'WebController@contact_submit')->name('/contact-submit');
Route::get('/book-appointment', 'WebController@book_appointment')->name('/book-appointment');
Route::post('/appoitment-book', 'WebController@appoitment_book')->name('/appoitment-book');
Route::post('/profile-pic-update', 'WebController@profile_pic_update')->name('/profile-pic-update');
Route::post('/profile-intro-update', 'WebController@profile_intro_update')->name('/profile-intro-update');
Route::post('/profile-edu-update', 'WebController@profile_edu_update')->name('/profile-edu-update');
Route::post('/pass-update', 'WebController@pass_update')->name('/pass-update');
Auth::routes();


//Consultant
Route::get('/consultant/home', 'ConsultantController@index')->name('/consultant/home');
Route::get('/consultant/profile', 'ConsultantController@profile')->name('/consultant/profile');
Route::get('/consultant/appointments', 'ConsultantController@appointments')->name('/consultant/appointments');

//Client
Route::get('/client/home', 'ClientController@index')->name('/client/home');
Route::get('/client/profile', 'ClientController@profile')->name('/client/profile');
Route::get('/client/appointments', 'ClientController@appointments')->name('/client/appointments');
Route::get('/client/appointment/{id}', 'ClientController@appointment')->name('/client/appointment');
Route::get('/chatemail_table/{id}', 'ClientController@chatemail_table')->name('/chatemail_table');
Route::post('/email_chat', 'ClientController@email_chat')->name('/email_chat');

//Admin
Route::get('/admin/home', 'HomeController@index')->name('/admin/home');
Route::get('/admin/news', 'NewsController@news')->name('/admin/news');
Route::get('/admin/news_table', 'NewsController@news_table')->name('/admin/news_table');
Route::get('/admin/create_news', 'NewsController@create_news')->name('/admin/create_news');
Route::get('/admin/edit_news/{id}', 'NewsController@edit_news')->name('/admin/edit_news');
Route::post('/admin/add_news', 'NewsController@add_news')->name('/admin/add_news');
Route::post('/admin/edit_newss', 'NewsController@edit_newss')->name('/admin/edit_newss');
Route::get('/admin/blog', 'BlogController@blog')->name('/admin/blog');
Route::get('/admin/blogcategory_table', 'BlogController@blogcategory_table')->name('/admin/blogcategory_table');
Route::get('/admin/blog-categories', 'BlogController@blog_categories')->name('/admin/blog-categories');
Route::get('/admin/blog-tags', 'BlogController@blog_tags')->name('/admin/blog-tags');
Route::get('/admin/blog_table', 'BlogController@blog_table')->name('/admin/blog_table');
Route::get('/admin/create_blog', 'BlogController@create_blog')->name('/admin/create_blog');
Route::get('/admin/edit_blog/{id}', 'BlogController@edit_blog')->name('/admin/edit_blog');
Route::post('/admin/create_blogss', 'BlogController@create_blogss')->name('/admin/create_blogss');
Route::post('/admin/edit_blogss', 'BlogController@edit_blogss')->name('/admin/edit_blogss');
Route::get('/admin/blogtag_table', 'BlogController@blogtag_table')->name('/admin/blogtag_table');
Route::post('/admin/create_blogtag', 'BlogController@create_blogtag')->name('/admin/create_blogtag');
Route::post('/admin/edit_blogtag', 'BlogController@edit_blogtag')->name('/admin/edit_blogtag');
Route::post('/admin/create_blogcategory', 'BlogController@create_blogcategory')->name('/admin/create_blogcategory');
Route::post('/admin/edit_blogcategory', 'BlogController@edit_blogcategory')->name('/admin/edit_blogcategory');
Route::post('/admin/retrieve', 'BlogController@retrieve')->name('/admin/retrieve');
Route::post('/admin/delete_record', 'BlogController@delete_record')->name('/admin/delete_record');
Route::get('/admin/slider', 'SettingController@slider')->name('/admin/slider');
Route::get('/admin/slider_table', 'SettingController@slider_table')->name('/admin/slider_table');
Route::post('/admin/create_slider', 'SettingController@create_slider')->name('/admin/create_slider');
Route::post('/admin/edit_slider', 'SettingController@edit_slider')->name('/admin/edit_slider');
Route::get('/admin/testimonial', 'SettingController@testimbnonial')->name('/admin/testimonial');
Route::get('/admin/testimonial_table', 'SettingController@testimonial_table')->name('/admin/testimonial_table');
Route::post('/admin/create_testimonial', 'SettingController@create_testimonial')->name('/admin/create_testimonial');
Route::post('/admin/edit_testimonial', 'SettingController@edit_testimonial')->name('/admin/edit_testimonial');
Route::get('/admin/client', 'ClientController@client')->name('/admin/client');
Route::get('/admin/client_table', 'ClientController@client_table')->name('/admin/client_table');
Route::post('/admin/create_client', 'ClientController@create_client')->name('/admin/create_client');
Route::post('/admin/edit_client', 'ClientController@edit_client')->name('/admin/edit_client');
Route::get('/admin/general', 'SettingController@general')->name('/admin/general');
Route::post('/admin/generalsave', 'SettingController@generalsave')->name('/admin/generalsave');
Route::get('/admin/consultants', 'ConsultantController@consultants')->name('/admin/consultants');
Route::get('/admin/consultants_table', 'ConsultantController@consultants_table')->name('/admin/consultants_table');
Route::post('/admin/create_consultants', 'ConsultantController@create_consultants')->name('/admin/create_consultants');
Route::post('/admin/edit_consultants', 'ConsultantController@edit_consultants')->name('/admin/edit_consultants');
Route::get('/admin/laws', 'SettingController@laws')->name('/admin/laws');
Route::get('/admin/laws_table', 'SettingController@laws_table')->name('/admin/laws_table');
Route::post('/admin/create_laws', 'SettingController@create_laws')->name('/admin/create_laws');
Route::post('/admin/edit_laws', 'SettingController@edit_laws')->name('/admin/edit_laws');
Route::get('/admin/query', 'SettingController@query')->name('/admin/query');
Route::get('/admin/query_table', 'SettingController@query_table')->name('/admin/query_table');
Route::post('/admin/create_query', 'SettingController@create_query')->name('/admin/create_query');
Route::post('/admin/edit_query', 'SettingController@edit_query')->name('/admin/edit_query');
Route::post('/admin/allote_consultant', 'AppointmentController@allote_consultant')->name('/admin/allote_consultant');
Route::get('/admin/appointments', 'AppointmentController@appointments')->name('/admin/appointments');
Route::get('/admin/appointment_table', 'AppointmentController@appointment_table')->name('/admin/appointment_table');
Route::get('/admin/edit_appointment/{id}', 'AppointmentController@edit_appointment')->name('/admin/edit_appointment');
Route::get('/admin/chatemail_table/{id}', 'AppointmentController@chatemail_table')->name('/admin/chatemail_table');
Route::post('/admin/email_chat', 'AppointmentController@email_chat')->name('/admin/email_chat');
Route::post('/admin/uploadFile', 'AppointmentController@uploadFile')->name('/admin/uploadFile');
Route::post('/admin/view_appointment_email', 'AppointmentController@view_appointment_email')->name('/admin/view_appointment_email');
