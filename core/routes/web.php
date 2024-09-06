<?php


use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/', 'supportTicket')->name('index');
    Route::get('new', 'openSupportTicket')->name('open');
    Route::post('create', 'storeSupportTicket')->name('store');
    Route::get('view/{ticket}', 'viewTicket')->name('view');
    Route::post('reply/{ticket}', 'replyTicket')->name('reply');
    Route::post('close/{ticket}', 'closeTicket')->name('close');
    Route::get('download/{ticket}', 'ticketDownload')->name('download');
});


Route::controller('SiteController')->group(function () {

    Route::get('contact', 'contact')->name('contact');
    Route::post('contact', 'contactSubmit');
    Route::get('change/{lang?}', 'changeLanguage')->name('lang');

    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');
    Route::get('cookie/accept', 'cookieAccept')->name('cookie.accept');
    Route::get('category/list', 'categories')->name('category.list');
    Route::get('category/job/{id}/{name}', 'categoryJobs')->name('category.jobs');
    Route::get('subcategory/{id}/{title}', 'subcategories')->name('subcategory.list');
    Route::get('subcategory/job/{id}/{name}', 'subcategoryJobs')->name('subcategory.jobs');


    Route::get('blogs', 'blogs')->name('blogs');
    Route::get('blog/{slug}/{id}', 'blogDetails')->name('blog.details');
    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');


    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');
    Route::get('/{slug}', 'pages')->name('pages');

    Route::get('/', 'index')->name('home');

    Route::get('job/list', 'allJobs')->name('job.list');
    Route::get('job-details/{id}/{title}', 'jobDetails')->name('job.details');
    Route::get('job/sort', 'sortJob')->name('job.sort');
    Route::get('job/pagination', 'sortJob');
    Route::get('job/search', 'jobSearch')->name('job.search');
});
