<?php

use App\Http\Controllers\AddCommentToTicketController;
use App\Http\Controllers\AgentClosedTicketsController;
use App\Http\Controllers\AgentOpenTicketsController;
use App\Http\Controllers\AgentReplyTicketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ManagerCompanyController;
use App\Http\Controllers\ManagerViewAdminisController;
use App\Http\Controllers\ManagerViewSubscriptionsController;
use App\Http\Controllers\RegisterCompanyAdminController;
use App\Http\Controllers\RegisterCompanyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ViewAgentsController;
use App\Http\Controllers\ViewSupervisorsController;
use App\Http\Controllers\ViewTicketController;
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
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home',[IndexPageController::class, 'index'])->name('home');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/managerdashboard',[DashboardController::class, 'manager'])->name('managerdashboard');

Route::get('/ticketview/{ticketid}',[ViewTicketController::class, 'index'])->name('ticketview');

Route::get('/agentopentickets/',[AgentOpenTicketsController::class, 'index'])->name('agentopentickets');

Route::get('/agentclosedtickets',[AgentClosedTicketsController::class, 'index'])->name('agentclosedtickets');

Route::get('/registercompany',[RegisterCompanyController::class, 'index'])->name('registercompany');
Route::post('/registercompany',[RegisterCompanyController::class, 'store']);

Route::get('/registercompanyadmin',[RegisterCompanyAdminController::class, 'index'])->name('registercompanyadmin');
Route::post('/registercompanyadmin',[RegisterCompanyAdminController::class, 'store']);

Route::get('/managerviewcompanies',[ManagerCompanyController::class, 'index'])->name('managerviewcompanies');
Route::get('/managerviewadmins',[ManagerViewAdminisController::class, 'index'])->name('managerviewadmins');
Route::get('/managerviewsubscriptions',[ManagerViewSubscriptionsController::class, 'index'])->name('managerviewsubscriptions');

Route::get('/viewagents',[ViewAgentsController::class, 'index'])->name('viewagents');

Route::get('/viewsupervisors',[ViewSupervisorsController::class, 'index'])->name('viewsupervisors');

Route::get('/registercompanysupervisor',[RegisterCompanyAdminController::class, 'index'])->name('registercompanysupervisor');
Route::post('/registercompanysupervisor',[RegisterCompanyAdminController::class, 'store']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::post('/addcommenttoticket',[AddCommentToTicketController::class, 'store'])->name('addcommenttoticket');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::post('/agentticketreply',[AgentReplyTicketController::class, 'store'])->name('agentticketreply');


//Mariat Functionality Merging
Route::get('/tickets', [TicketController::class, 'ticket'])->name('tickets');
Route::post('/tickets', [TicketController::class, 'addticket']);

Route::post('/assignagent', [TicketController::class, 'assign'])->name('assignagent');

//open tickets
Route::get('/opentickets', [TicketController::class, 'openticket'])->name('opentickets');
//closed tickets
Route::get('/closedtickets', [TicketController::class, 'closedticket'])->name('closedtickets');
//pending tickets
Route::get('/pendingtickets', [TicketController::class, 'pendingticket'])->name('pendingtickets');


//create new ticket
Route::post('/addcomment', [TicketController::class, 'addcomment'])->name('addcomment');

//route for specific ticket
Route::get('/ticketdetails/{id}', [TicketController::class, 'ticketdetails'])->name('ticketdetails');

//ticket reply route
Route::post('/ticketdetails/{id}', [TicketController::class, 'ticketreply'])->name('ticketdetails');
//route for specific open ticket
Route::get('/openticketdetails/{id}', [TicketController::class, 'openticketdetails'])->name('openticketdetails');
//route to retrieve groups
Route::get('/groups', [TicketController::class, 'assign'])->name('groups');