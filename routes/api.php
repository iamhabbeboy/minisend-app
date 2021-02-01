<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AttachmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('emails/search', [EmailController::class, 'search'])
->name('emails.search');
Route::get('emails/recipient', [EmailController::class, 'recipientEmails'])
->name('emails.recipient');
Route::get('emails/chart', [EmailController::class, 'emailStat'])
->name('emails.stats');
Route::resource('emails', EmailController::class);
Route::resource('attachment', AttachmentController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 1. create endpoint for create email POST

// 2. create endpoint for get all email with pagination GET/{first, pageNo}
// 3. create search endpoint to filter emails GET/{sender,recipient,subject}
// 4. single email GET/id

//Home.vue
// SearchComponent
// FilterComponent
// ListComponent
// PaginationComponent

//Create.vue
// Form
// Toast

//Single.vue
// ContentComponent
// AttachmentComponent
// PaginationComponent

