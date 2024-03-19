<?php

use App\Http\Controllers\Web\Payment\SponsorPaymentController;
use App\Http\Controllers\Web\Payment\MemberPaymentController;
use App\Http\Controllers\Web\Payment\EventPaymentController;
use App\Http\Controllers\Web\UserSettingController;
use App\Http\Controllers\Web\FeedbackController;
use App\Http\Controllers\Web\DefaultController;
use App\Http\Controllers\Web\FilterController;
use App\Http\Controllers\Web\PagesController;
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
Route::get('/logged', [DefaultController::class, 'logged'])->name('logged.user');
Route::middleware('admin-not-access')->group(function() {
    Route::get('/', [PagesController::class, 'index'])->name('web.index');
    Route::get('/about', [PagesController::class, 'aboutUs'])->name('web.about');
    Route::get('/who-we-are', [PagesController::class, 'whoweare'])->name('web.who-we-are');
    Route::get('/team', [PagesController::class, 'team'])->name('web.team');
    Route::get('/contactus', [PagesController::class, 'contactUs'])->name('web.contactus');
    Route::post('/contactUsData', [PagesController::class, 'contactUsData'])->name('contactus.form');
    Route::get('/membership', [PagesController::class, 'membership'])->name('web.membership');
    Route::get('/join', [PagesController::class, 'join'])->name('web.join');
    Route::get('/benefits', [PagesController::class, 'benefits'])->name('web.benefits');
    Route::get('/programs', [PagesController::class, 'programs'])->name('web.programs');
    Route::get('/evaluation', [PagesController::class, 'evaluation'])->name('web.evaluation');
    Route::get('/rules_of_engagement', [PagesController::class, 'rules_of_engagement'])->name('web.rules_of_engagement');
    Route::get('/sectors', [PagesController::class, 'sectors'])->name('web.sectors');
    Route::get('/construction', [PagesController::class, 'construction'])->name('web.construction');
    Route::get('/agriculture', [PagesController::class, 'agriculture'])->name('web.agriculture');
    Route::get('/supply_chain', [PagesController::class, 'supply_chain'])->name('web.supply_chain');
    Route::get('/technology', [PagesController::class, 'technology'])->name('web.technology');
    Route::get('/natural_resources', [PagesController::class, 'natural_resources'])->name('web.natural_resources');
    Route::get('/energy', [PagesController::class, 'energy'])->name('web.energy');
    Route::get('/textiles', [PagesController::class, 'textiles'])->name('web.textiles');
    Route::get('/advocacy', [PagesController::class, 'advocacy'])->name('web.advocacy');
    Route::get('/small_businesses', [PagesController::class, 'small_businesses'])->name('web.small_businesses');
    Route::get('/women', [PagesController::class, 'women'])->name('web.women');
    Route::get('/veterans', [PagesController::class, 'veterans'])->name('web.veterans');
    Route::get('/support_services', [PagesController::class, 'support_services'])->name('web.support_services');
    Route::get('/international_events', [PagesController::class, 'international_events'])->name('web.international_events');
    Route::get('/event_request', [PagesController::class, 'event_request'])->name('web.event_request');
    Route::get('/event_calendar', [PagesController::class, 'event_calendar'])->name('web.event_calendar');
    Route::get('/events', [PagesController::class, 'events'])->name('web.events');
    Route::get('/blog', [PagesController::class, 'blog'])->name('web.blog');
    Route::get('/financial', [PagesController::class, 'financial'])->name('web.financial');
    Route::get('/grants', [PagesController::class, 'grants'])->name('web.grants');
    Route::get('/funding', [PagesController::class, 'funding'])->name('web.funding');
    Route::get('/forms', [PagesController::class, 'forms'])->name('web.forms');
    Route::post('/feedback', [FeedbackController::class, 'feedback'])->name('feedbacks');
    Route::get('/partners_sponsors', [PagesController::class, 'partners_sponsors'])->name('web.partners_sponsors');
    Route::get('/become_partner', [PagesController::class, 'become_partner'])->name('web.become_partner');
    Route::get('/become_sponsor', [PagesController::class, 'become_sponsor'])->name('web.become_sponsor');
    Route::get('/outreach', [PagesController::class, 'outreach'])->name('web.outreach');
    Route::get('/chad', [PagesController::class, 'chad'])->name('web.chad');
    Route::get('/ghana', [PagesController::class, 'ghana'])->name('web.ghana');
    Route::get('/south_africa', [PagesController::class, 'south_africa'])->name('web.south_africa');
    Route::get('/zimbabwe', [PagesController::class, 'zimbabwe'])->name('web.zimbabwe');
    Route::get('/cameroon', [PagesController::class, 'cameroon'])->name('web.cameroon');
    Route::get('/drc', [PagesController::class, 'drc'])->name('web.drc');
    Route::get('/cote_divoire', [PagesController::class, 'cote_divoire'])->name('web.cote_divoire');
    Route::get('/usa', [PagesController::class, 'usa'])->name('web.usa');
    Route::get('/india', [PagesController::class, 'india'])->name('web.india');
    Route::get('/south_america', [PagesController::class, 'south_america'])->name('web.south_america');
    Route::get('/uganda', [PagesController::class, 'uganda'])->name('web.uganda');
    Route::get('/opportunities', [PagesController::class, 'opportunities'])->name('web.opportunities');
    Route::get('/opportunities_agriculture', [PagesController::class, 'opportunities_agriculture'])->name('web.opportunities_agriculture');
    Route::get('/opportunities_construction', [PagesController::class, 'opportunities_construction'])->name('web.opportunities_construction');
    Route::get('/mining', [PagesController::class, 'mining'])->name('web.mining');
    Route::get('/rfx', [PagesController::class, 'rfx'])->name('web.rfx');
    Route::get('/job_openings', [PagesController::class, 'job_openings'])->name('web.job_openings');
    Route::get('/job_detail/{id}', [PagesController::class, 'job_detail'])->name('web.job_detail');
    Route::get('/careers', [PagesController::class, 'careers'])->name('web.careers');
    Route::post('/filter-keywords', [FilterController::class, 'filterKeywords'])->name('filter.keywords');
    
    Route::post('/update-sponsor-info', [PagesController::class, 'updateSponser'])->name('sponsor.update');
    Route::post('/update-partner-info', [PagesController::class, 'updatePartner'])->name('partner.update');
    Route::post('/update-member-info', [PagesController::class, 'updateMember'])->name('member.update');

    Route::get('/filter-search', [FilterController::class, 'filterSearch'])->name('filter.search');
    Route::post('/subscribe-newsletter', [DefaultController::class, 'subscribe'])->name('subscribe.newsletter');
    Route::post('/satisfied_members', [DefaultController::class, 'satisfiedMembers'])->name('satisfied.members');
    
    Route::get('/user-login', [PagesController::class, 'login'])->name('user.login');
    Route::get('/privact-policy', [PagesController::class, 'privacypolicy'])->name('web.privacypolicy');
    Route::get('/term-use', [PagesController::class, 'termsuse'])->name('web.termsuse');
    Route::post('/welcome-modal', [DefaultController::class, 'weclome'])->name('welcom.modal');
    Route::post('/job-application/{id}', [DefaultController::class, 'jobApply'])->name('job.application');
    
    Route::get('/list_projects', [PagesController::class, 'listProject'])->name('web.projects');
    Route::get('/member_directory', [PagesController::class, 'member_directory'])->name('web.member_directory');

    /////--------* Stripe Payment Integration Routes *--------/////
    Route::post('charge-member', [MemberPaymentController::class,'payment'])->name('charge.member');
    Route::post('charge-event', [EventPaymentController::class,'payment'])->name('charge.event');
    Route::post('charge-sponsor', [SponsorPaymentController::class,'payment'])->name('charge.sponsor');
    //////------ End Stripe Payment Integration Routes ------/////
    
    Route::post('store-financial', [DefaultController::class,'storeFinancial'])->name('store.financial');
    Route::post('store-partneruser', [DefaultController::class,'storePartner'])->name('store.partneruser');
    Route::post('check-email',[DefaultController::class,'checkEmail']);

    Route::get('filter-members',[DefaultController::class,'filterMembers'])->name('filter.members');

    Route::get('/user-dashboard', [UserSettingController::class,'index'])->name('web.user-dashboard');
    Route::put('/user-updpass/{id}', [UserSettingController::class,'updatePassword'])->name('user.updPass');
    Route::get('/user-member', [UserSettingController::class,'member'])->name('web.user-member');
    Route::get('/user-partner', [UserSettingController::class,'partner'])->name('web.user-partner');
    Route::get('/financial-forms', [UserSettingController::class,'financialForms'])->name('web.user-financialForms');
    Route::get('/financial-detail/{id}', [UserSettingController::class, 'financialDetail'])->name('web.user-financialDetail');

    Route::get('/eventReq-forms', [UserSettingController::class,'eventReqForms'])->name('web.user-eventReqForms');
    Route::get('/eventReq-detail/{id}', [UserSettingController::class, 'eventReqDetail'])->name('web.user-eventReqDetail');



    
    Route::get('/user-sponsor', [UserSettingController::class,'sponsor'])->name('web.user-sponsor');
});
include __DIR__.'/admin.php';

Route::get('/commands', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('optimize');
    \Artisan::call('view:clear');
    \Artisan::call('optimize:clear');
    return 'Commands executed successfully!';
});

Route::get('/commandMigrate', function () {
    \Artisan::call('migrate');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('optimize');
    \Artisan::call('view:clear');
    \Artisan::call('optimize:clear');
    return 'Commands executed successfully!';
});
Auth::routes();
