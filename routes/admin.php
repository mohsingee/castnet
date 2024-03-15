<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\International_events\InternationalEventsController;
use App\Http\Controllers\Admin\Rules_of_engagement\RulesOfEngagementController;
use App\Http\Controllers\Admin\Oppor_construction\OpporConstructionController;
use App\Http\Controllers\Admin\Oppor_agriculture\OpporAgricultureController;
use App\Http\Controllers\Admin\Partners_sponsors\PartnerSponsorController;
use App\Http\Controllers\Admin\Support_services\SupportServicesController;
use App\Http\Controllers\Admin\Member_directory\MemberDirectoryController;
use App\Http\Controllers\Admin\Partners_sponsors\BecomePartnerController;
use App\Http\Controllers\Admin\Partners_sponsors\BecomeSponsorController;
use App\Http\Controllers\Admin\Small_businesses\SmallBusinessController;
use App\Http\Controllers\Admin\Sectors\SectorsCommonSection1Controller;
use App\Http\Controllers\Admin\Sectors\SectorsCommonSection2Controller;
use App\Http\Controllers\Admin\Event_calender\EventCalenderController;
use App\Http\Controllers\Admin\Event_request\EventRequestController;
use App\Http\Controllers\Admin\South_america\SouthAmericaController;
use App\Http\Controllers\Admin\HomePage\HomePageSection1Controller;
use App\Http\Controllers\Admin\HomePage\HomePageSection2Controller;
use App\Http\Controllers\Admin\HomePage\HomePageSection3Controller;
use App\Http\Controllers\Admin\HomePage\HomePageSection4Controller;
use App\Http\Controllers\Admin\HomePage\HomePageSection5Controller;
use App\Http\Controllers\Admin\HomePage\HomePageSection6Controller;
use App\Http\Controllers\Admin\HomePage\HomePageSection7Controller;
use App\Http\Controllers\Admin\HomePage\HomePageSection8Controller;
use App\Http\Controllers\Admin\HomePage\HomePageSection9Controller;
use App\Http\Controllers\Admin\Advocacy\AdvocacySection1Controller;
use App\Http\Controllers\Admin\South_africa\SouthAfricaController;
use App\Http\Controllers\Admin\Oppor_mining\OpporMiningController;
use App\Http\Controllers\Admin\HomePage\HomePageBannerController;
use App\Http\Controllers\Admin\Who_we_are\WhoWeArePageController;
use App\Http\Controllers\Admin\Job_openings\JobOpeningController;
use App\Http\Controllers\Admin\Evaluation\EvaluationController;
use App\Http\Controllers\Admin\Membership\MembershipController;
use App\Http\Controllers\Admin\OpporProjects\ProjectController;
use App\Http\Controllers\Admin\Join\JoinFormSettingController;
use App\Http\Controllers\Admin\Events\EventSection1Controller;
use App\Http\Controllers\Admin\Financial\FinancialController;
use App\Http\Controllers\Admin\AboutPage\AboutPageController;
use App\Http\Controllers\Admin\Contact_us\ContactController;
use App\Http\Controllers\Admin\Cote_divoire\CotedController;
use App\Http\Controllers\Admin\Oppor_rfx\OpporRfxController;
use App\Http\Controllers\Admin\AdvocacySServicesController;
use App\Http\Controllers\Admin\Advocacy\AdvocacyController;
use App\Http\Controllers\Admin\Benefits\BenefitsController;
use App\Http\Controllers\Admin\Veterans\VeteransController;
use App\Http\Controllers\Admin\Programs\ProgramsController;
use App\Http\Controllers\Admin\Cameroon\CameroonController;
use App\Http\Controllers\Admin\Zimbabwe\ZimbabweController;
use App\Http\Controllers\Admin\Outreach\OutreachController;
use App\Http\Controllers\Admin\Team\TeamSectionController;
use App\Http\Controllers\Admin\Events\OurEventController;
use App\Http\Controllers\Admin\Careers\CareersController;
use App\Http\Controllers\Admin\Funding\FundingController;
use App\Http\Controllers\Admin\Sectors\SectorController;
use App\Http\Controllers\Admin\Grants\GrantsController;
use App\Http\Controllers\Admin\Uganda\UgandaController;
use App\Http\Controllers\Admin\India\IndiaController;
use App\Http\Controllers\Admin\Oppor\OpporController;
use App\Http\Controllers\Admin\Ghana\GhanaController;
use App\Http\Controllers\Admin\Women\WomenController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Join\JoinController;
use App\Http\Controllers\Admin\Chad\ChadController;
use App\Http\Controllers\Admin\UsersDataController;
use App\Http\Controllers\Admin\Drc\DrcController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Usa\UsaController;
use App\Http\Controllers\Admin\WidgetsController;
use App\Http\Controllers\Admin\AdvocacyCSection;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\Privacy\PrivacyController;
use App\Http\Controllers\Admin\Term_of_use\TermOfUseController;

Route::get('/administrator', [PagesController::class, 'login'])->name('admin.login');

Route::put('/update-setting/{id}', [SettingController::class,'updateSetting'])->name('update.setting');
Route::post('/check-password', [SettingController::class,'checkPassword']);

Route::middleware('auth')->group(function() {
    Route::middleware('user-not-access')->group(function() {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [PagesController::class, 'index'])->name('admin.index');

            //---** Web setting **---//
            Route::get('/setting', [SettingController::class, 'index'])->name('admin.setting');
            Route::put('/setting-update/{id}', [SettingController::class,'update'])->name('setting.update');
            Route::get('/account-setting', [SettingController::class,'setting'])->name('account.setting');

            //---** Social links **---//
            Route::get('/sociallinks', [SocialLinkController::class, 'index'])->name('admin.sociallinks');
            Route::put('/sociallinks-update/{id}', [SocialLinkController::class,'update'])->name('sociallinks.update');

            //---** Home page routes **---//
            Route::get('/homepage-banner', [HomePageBannerController::class,'index'])->name('homepage.banner');
            Route::put('/homebanner-update/{id}', [HomePageBannerController::class,'update'])->name('homebanner.update');
            Route::resource('homesection1', HomePageSection1Controller::class);
            Route::get('/homeSection2',[HomePageSection2Controller::class,'index'])->name('homesection2.index');
            Route::put('/homeSection2-update/{id}',[HomePageSection2Controller::class,'update'])->name('homesection2.update');
            Route::get('/homeSection3',[HomePageSection3Controller::class,'index'])->name('homesection3.index');
            Route::put('/homeSection3-update/{id}',[HomePageSection3Controller::class,'update'])->name('homesection3.update');
            Route::resource('homesection4', HomePageSection4Controller::class);
            Route::put('/homesection4-updation/{id}',[HomePageSection4Controller::class,'updation'])->name('homesection4.updataion');
            Route::resource('homesection5', HomePageSection5Controller::class);
            Route::put('/homesection5-updation/{id}',[HomePageSection5Controller::class,'updation'])->name('homesection5.updataion');
            Route::resource('homesection6', HomePageSection6Controller::class);
            Route::put('/homesection6-updation/{id}',[HomePageSection6Controller::class,'updation'])->name('homesection6.updataion');
            Route::get('/homeSection7', [HomePageSection7Controller::class,'index'])->name('homesection7.index');
            Route::put('/homeSection7-update/{id}', [HomePageSection7Controller::class,'update'])->name('homesection7.update');
            Route::resource('homesection8', HomePageSection8Controller::class);
            Route::put('/homesection8-updation/{id}',[HomePageSection8Controller::class,'updation'])->name('homesection8.updataion');
            Route::resource('homesection9', HomePageSection9Controller::class);
            Route::put('/homesection9-updation/{id}',[HomePageSection9Controller::class,'updation'])->name('homesection9.updataion');
            //---** End Home page routes **---//

            //---** About Page Routes Start **---//
            Route::get('/about-us-banner', [AboutPageController::class, 'index'])->name('aboutus.banner');
            Route::get('/about-us-section1', [AboutPageController::class, 'section1'])->name('aboutus.section1');
            Route::get('/about-us-section2', [AboutPageController::class, 'section2'])->name('aboutus.section2');
            Route::get('/about-us-section3', [AboutPageController::class, 'section3'])->name('aboutus.section3');
            //--- About Page Routes End -----
            
            // Privacy & policy routes start
            Route::get('/privacy-banner', [PrivacyController::class, 'index'])->name('privacy.banner');
            Route::get('/privacy-section1', [PrivacyController::class, 'section1'])->name('privacy.section1');
            Route::post('/privacy-section1Update', [PrivacyController::class, 'section1Update'])->name('privacy.section1Update');
            Route::get('/privacy-section2', [PrivacyController::class, 'section2'])->name('privacy.section2');
            // Privacy & policy routes end

            // terms and use routes start
            
            Route::get('/term-banner', [TermOfUseController::class, 'index'])->name('term.banner');
            Route::get('/term-section1', [TermOfUseController::class, 'section1'])->name('term.section1');
            Route::post('/term-sectionUpdate', [TermOfUseController::class, 'sectionUpdate'])->name('term.sectionUpdate');
            Route::get('/term-section2', [TermOfUseController::class, 'section2'])->name('term.section2');
            // terms and use routes end

            // --------- who_we_are Page Routes Start ------------
            Route::get('/whoweare-banner', [WhoWeArePageController::class, 'index'])->name('whoweare.banner');
            Route::get('/whoweare-section1', [WhoWeArePageController::class, 'section1'])->name('whoweare.section1');
            Route::get('/whoweare-section2', [WhoWeArePageController::class, 'section2'])->name('whoweare.section2');
            Route::put('/whoweare/{id}', [WhoWeArePageController::class, 'update'])->name('whoweare.update');
            // --------- who_we_are Page Routes End --------------

            //---** Our team routes **---//
            Route::resource('our-team', TeamSectionController::class);
            Route::get('/our-team-banner', [TeamSectionController::class, 'banner'])->name('our-team.banner');
            //--- End our team routes ---

            //---** Contact us page routes **---//
            Route::get('/contactus-banner', [ContactController::class, 'banner'])->name('contactus.banner');
            Route::get('/contactus-info', [ContactController::class, 'info'])->name('contactus.info');
            Route::put('/contactus-update/{id}', [ContactController::class, 'update'])->name('contactus.update');
            //--- End Contact us page routes ------

            //---** My Blog **---//
            Route::resource('my-blog', BlogController::class);
            Route::get('/my-blog-banner', [BlogController::class, 'banner'])->name('my-blog.banner');
            // ---------My blog Page Routes End --------------

            //---** Events **---//
            Route::get('/myEvent-banner', [EventSection1Controller::class, 'banner'])->name('myEvent.banner');
            Route::get('/myEvent-section1', [EventSection1Controller::class, 'section1'])->name('myEvent.section1');
            Route::get('/myEvent-section3', [EventSection1Controller::class, 'section3'])->name('myEvent.section3');
            Route::put('/myEvent-updation/{id}', [EventSection1Controller::class, 'updation'])->name('myEvent.updation');
            Route::resource('myEvent', OurEventController::class);

            Route::resource('event-calender', EventCalenderController::class);
            Route::get('/event-calender-banner', [EventCalenderController::class, 'banner'])->name('event-calender.banner');
           
            Route::resource('event_request', EventRequestController::class);
            Route::get('/event-request-banner', [EventRequestController::class, 'banner'])->name('event_request.banner');
            Route::post('/event-request-upt/{id}', [EventRequestController::class, 'updation']);
            Route::put('/event-category-update/{id}', [EventRequestController::class, 'updateCategory'])->name('event_request.update');

            Route::resource('international_events', InternationalEventsController::class);
            Route::get('/international_events-banner', [InternationalEventsController::class, 'banner'])->name('international_events.banner');
            // --------- Events Page Routes End --------------

            // ---- Membership page routes start ----
            Route::resource('membership', MembershipController::class);
            Route::get('/membership-banner', [MembershipController::class, 'banner'])->name('membership.banner');
            Route::get('/membership-section1', [MembershipController::class, 'section1'])->name('membership.section1');
            Route::get('/membership-section3', [MembershipController::class, 'section3'])->name('membership.section3');
            Route::put('/membership-updation/{id}', [MembershipController::class, 'updation'])->name('membership.updation');
            // ---- Membership page routes end ----

            // ---- Join page routes start ----
            Route::resource('join', JoinController::class);
            Route::get('/join-banner', [JoinController::class, 'banner'])->name('join.banner');
            Route::resource('join-form-setting', JoinFormSettingController::class);
            // ---- Join page routes end ----

            // ---- EVALUATION page routes start ----
            Route::get('/evaluation-section', [EvaluationController::class, 'section1'])->name('evaluation.section');
            Route::get('/evaluation-section3', [EvaluationController::class, 'section3'])->name('evaluation.section3');
            Route::get('/evaluation-section4', [EvaluationController::class, 'section4'])->name('evaluation.section4');
            Route::put('/evaluation-update/{id}', [EvaluationController::class, 'update'])->name('evaluation.update');
            Route::get('/evaluation-banner', [EvaluationController::class, 'banner'])->name('evaluation.banner');
            // ---- EVALUATION page routes end ----

            // ---- RULES OF ENGAGEMENT page routes start ----
            Route::resource('roe', RulesOfEngagementController::class);
            Route::get('/roe-section1', [RulesOfEngagementController::class, 'section1'])->name('roe.section1');
            Route::get('/roe-banner', [RulesOfEngagementController::class, 'banner'])->name('roe.banner');
            // ---- RULES OF ENGAGEMENT page routes end ----

            // ------- Widget work start --------
            Route::get('/joinWidget', [WidgetsController::class, 'index'])->name('joinWidget');
            Route::put('/joinWidget-update/{id}', [WidgetsController::class, 'udpateJoinWidget'])->name('joinWidget.update');
            Route::get('/eventWidget', [WidgetsController::class, 'commonEvent'])->name('eventWidget');
            Route::put('/eventWidget-update/{id}', [WidgetsController::class, 'updateEventWidget'])->name('eventWidget.update');
            // ------- Widget work end --------

            // ------- Sectors page work start --------
            Route::resource('sectors', SectorController::class);
            Route::get('/sectors-banner', [SectorController::class, 'banner'])->name('sectors.banner');
            // ------- Sectors page work end --------

            // ------- Construction page work start --------
            Route::get('/sector-c1cons-banner', [SectorsCommonSection1Controller::class, 'construction_banner'])->name('sector-c1cons.banner');
            Route::get('/sector-c1cons-section1', [SectorsCommonSection1Controller::class, 'construction'])->name('sector-c1cons.section1');
            Route::get('/sector-c2cons-section2', [SectorsCommonSection2Controller::class, 'construction'])->name('sector-c2cons.section2');
            // ------- Sectors page work end --------

            // ------- Agriculture page work start --------
            Route::get('/sector-c1agr-banner', [SectorsCommonSection1Controller::class, 'agriculture_banner'])->name('sector-c1agr.banner');
            Route::get('/sector-c1agr-section1', [SectorsCommonSection1Controller::class, 'agriculture'])->name('sector-c1agr.section1');
            Route::get('/sector-c2agr-section2', [SectorsCommonSection2Controller::class, 'agriculture'])->name('sector-c2agr.section2');
            // ------- Sectors page work end --------

            // ------- Supply Chain page work start --------
            Route::get('/sector-c1sc-banner', [SectorsCommonSection1Controller::class, 'supply_banner'])->name('sector-c1sc.banner');
            Route::get('/sector-c1sc-section1', [SectorsCommonSection1Controller::class, 'supply'])->name('sector-c1sc.section1');
            Route::get('/sector-c2sc-section2', [SectorsCommonSection2Controller::class, 'supply'])->name('sector-c2sc.section2');
            // ------- Supply Chain page work end --------

            // ------- Technology page work start --------
            Route::get('/sector-c1tec-banner', [SectorsCommonSection1Controller::class, 'technology_banner'])->name('sector-c1tec.banner');
            Route::get('/sector-c1tec-section1', [SectorsCommonSection1Controller::class, 'technology'])->name('sector-c1tec.section1');
            Route::get('/sector-c2tec-section2', [SectorsCommonSection2Controller::class, 'technology'])->name('sector-c2tec.section2');
            // ------- Technology page work end --------

            // ------- Natural Resources page work start --------
            Route::get('/sector-c1nat-banner', [SectorsCommonSection1Controller::class, 'natural_banner'])->name('sector-c1nat.banner');
            Route::get('/sector-c1nat-section1', [SectorsCommonSection1Controller::class, 'natural'])->name('sector-c1nat.section1');
            Route::get('/sector-c2nat-section2', [SectorsCommonSection2Controller::class, 'natural'])->name('sector-c2nat.section2');
            // ------- Natural Resources page work end --------

            // ------- Energy page work start --------
            Route::get('/sector-c1energy-banner', [SectorsCommonSection1Controller::class, 'energy_banner'])->name('sector-c1energy.banner');
            Route::get('/sector-c1energy-section1', [SectorsCommonSection1Controller::class, 'energy'])->name('sector-c1energy.section1');
            Route::get('/sector-c2energy-section2', [SectorsCommonSection2Controller::class, 'energy'])->name('sector-c2energy.section2');
            // ------- Energy page work end --------

            // ------- Natural Resources page work start --------
            Route::get('/sector-c1text-banner', [SectorsCommonSection1Controller::class, 'textiles_banner'])->name('sector-c1text.banner');
            Route::get('/sector-c1text-section1', [SectorsCommonSection1Controller::class, 'textiles'])->name('sector-c1text.section1');
            Route::get('/sector-c2text-section2', [SectorsCommonSection2Controller::class, 'textiles'])->name('sector-c2text.section2');
            // ------- Natural Resources page work end --------

            //**--- Common Functions --**//
            Route::put('/sector-c1-update/{id}', [SectorsCommonSection1Controller::class, 'update'])->name('sector-c1.update');
            Route::put('/c-section1/{id}', [AboutPageController::class, 'update'])->name('c-section1.update');
            Route::put('/banner-update/{id}', [BannerController::class, 'update'])->name('banner.update');
            Route::resource('sector-c2', SectorsCommonSection2Controller::class);
            Route::put('/sector-c2-updation/{id}', [SectorsCommonSection2Controller::class, 'updation'])->name('sector-c2.updation');
            //--- End common functions -----

            //**--- Benefits page routes --**//
            Route::resource('benefits', BenefitsController::class);
            Route::get('/benefits-section1',[BenefitsController::class,'section1'])->name('benefits.section1');
            Route::get('/benefits-section2',[BenefitsController::class,'section2'])->name('benefits.section2');
            Route::get('/benefits-banner',[BenefitsController::class,'banner'])->name('benefits.banner');
            Route::put('/benefits-updation/{id}',[BenefitsController::class,'updation'])->name('benefits.updation');
            //--- End benefits page routes -----

            //**--- ADVOCACY page routes ---**//
            Route::resource('advocacy', AdvocacyController::class);
            Route::get('/advocacy-banner', [AdvocacyController::class, 'banner'])->name('advocacy.banner');
            Route::get('/advocacy-section1', [AdvocacyController::class, 'section1'])->name('advocacy.section1');
            Route::get('/advocacy-section2', [AdvocacyController::class, 'section2'])->name('advocacy.section2');
            Route::get('/advocacy-section3', [AdvocacyController::class, 'section3'])->name('advocacy.section3');
            Route::get('/advocacy-section4', [AdvocacyController::class, 'section4'])->name('advocacy.section4');
            Route::put('/advocacy-updation/{id}', [AdvocacyController::class, 'updation'])->name('advocacy.updation');
            //--- End ADVOCACY page routes ----

            //Small Business routes start
            Route::get('/small_business-banner', [SmallBusinessController::class, 'banner'])->name('small_business.banner');
            Route::get('/small_business-section1', [SmallBusinessController::class, 'section1'])->name('small_business.section1');
            Route::get('/small_business-section2', [SmallBusinessController::class, 'section2'])->name('small_business.section2');
            Route::get('/small_business-section3', [SmallBusinessController::class, 'section3'])->name('small_business.section3');
            Route::get('/small_business-section4', [SmallBusinessController::class, 'section4'])->name('small_business.section4');
            Route::get('/small_business-section5', [SmallBusinessController::class, 'section5'])->name('small_business.section5');
            //Small Business routes end

            //WOMEN ADVOCACY page routes start
            Route::get('/women-banner', [WomenController::class, 'banner'])->name('women-banner');
            Route::get('/women-section1', [WomenController::class, 'section1'])->name('women.section1');
            Route::get('/women-section2', [WomenController::class, 'section2'])->name('women.section2');
            Route::get('/women-section3', [WomenController::class, 'section3'])->name('women.section3');
            Route::get('/women-section4', [WomenController::class, 'section4'])->name('women.section4');
            Route::get('/women-section5', [WomenController::class, 'section5'])->name('women.section5');
            Route::get('/women-section6', [WomenController::class, 'section6'])->name('women.section6');
            //WOMEN ADVOCACY page routes end

            //VETERANS ADVOCACY page routes start
            Route::get('/veterans-banner', [VeteransController::class, 'banner'])->name('veterans.banner');
            Route::get('/veterans-section1', [VeteransController::class, 'section1'])->name('veterans.section1');
            Route::get('/veterans-section2', [VeteransController::class, 'section2'])->name('veterans.section2');
            Route::get('/veterans-section3', [VeteransController::class, 'section3'])->name('veterans.section3');
            //VETERANS ADVOCACY page routes end

            //SUPPORT SERVICES page routes start
            Route::get('/supportser-banner', [SupportServicesController::class, 'banner'])->name('supportser.banner');
            Route::get('/supportser-section1', [SupportServicesController::class, 'section1'])->name('supportser.section1');
            Route::get('/supportser-section2', [SupportServicesController::class, 'section2'])->name('supportser.section2');
            Route::get('/supportser-section3', [SupportServicesController::class, 'section3'])->name('supportser.section3');
            //SUPPORT SERVICES page routes end

            Route::resource('programs', ProgramsController::class);
            Route::get('programs-banner',[ProgramsController::class,'banner'])->name('programs.banner');
            Route::put('/programs-updation/{id}',[ProgramsController::class,'updation'])->name('programs.updation');

            // ---- Outreach page routes start ----
            Route::get('/outreach-banner', [OutreachController::class, 'banner'])->name('outreach.banner');
            Route::get('/outreach-section1', [OutreachController::class, 'section1'])->name('outreach.section1');
            Route::get('/outreach-section2', [OutreachController::class, 'section2'])->name('outreach.section2');
            Route::get('/outreach-section3', [OutreachController::class, 'section3'])->name('outreach.section3');
            Route::put('/outreach-update/{id}', [OutreachController::class, 'update'])->name('outreach.update');
            // ---- Outreach page routes end ----

            // ---- Chad page routes start ----
            Route::get('/chad-banner', [ChadController::class, 'banner'])->name('chad.banner');
            Route::get('/chad-section1', [ChadController::class, 'section1'])->name('chad.section1');
            Route::get('/chad-section2', [ChadController::class, 'section2'])->name('chad.section2');
            // ---- Chad page routes end ----

            // ---- Ghana page routes start ----
            Route::get('/ghana-banner', [GhanaController::class, 'banner'])->name('ghana.banner');
            Route::get('/ghana-section1', [GhanaController::class, 'section1'])->name('ghana.section1');
            Route::get('/ghana-section2', [GhanaController::class, 'section2'])->name('ghana.section2');
            // ---- Ghana page routes end ----

            // ---- South Africa page routes start ----
            Route::get('/southafrica-banner', [SouthAfricaController::class, 'banner'])->name('southafrica.banner');
            Route::get('/southafrica-section1', [SouthAfricaController::class, 'section1'])->name('southafrica.section1');
            Route::get('/southafrica-section2', [SouthAfricaController::class, 'section2'])->name('southafrica.section2');
            // ---- South Africa page routes end ----

            // ---- Zimbabwe page routes start ----
            Route::get('/zimbabwe-banner', [ZimbabweController::class, 'banner'])->name('zimbabwe.banner');
            Route::get('/zimbabwe-section1', [ZimbabweController::class, 'section1'])->name('zimbabwe.section1');
            Route::get('/zimbabwe-section2', [ZimbabweController::class, 'section2'])->name('zimbabwe.section2');
            // ---- Zimbabwe page routes end ----

            // ---- Cameroon page routes start ----
            Route::get('/cameroon-banner', [CameroonController::class, 'banner'])->name('cameroon.banner');
            Route::get('/cameroon-section1', [CameroonController::class, 'section1'])->name('cameroon.section1');
            Route::get('/cameroon-section2', [CameroonController::class, 'section2'])->name('cameroon.section2');
            // ---- Cameroon page routes end ----

            // ---- DRC page routes start ----
            Route::get('/drc-banner', [DrcController::class, 'banner'])->name('drc.banner');
            Route::get('/drc-section1', [DrcController::class, 'section1'])->name('drc.section1');
            Route::get('/drc-section2', [DrcController::class, 'section2'])->name('drc.section2');
            // ---- DRC page routes end ----

            // ---- Cote Divoire page routes start ----
            Route::get('/cotedivoire-banner', [CotedController::class, 'banner'])->name('cotedivoire.banner');
            Route::get('/cotedivoire-section1', [CotedController::class, 'section1'])->name('cotedivoire.section1');
            Route::get('/cotedivoire-section2', [CotedController::class, 'section2'])->name('cotedivoire.section2');
            // ---- Cote Divoire page routes end ----

            // ---- USA page routes start ----
            Route::get('/usa-banner', [UsaController::class, 'banner'])->name('usa.banner');
            Route::get('/usa-section1', [UsaController::class, 'section1'])->name('usa.section1');
            Route::get('/usa-section2', [UsaController::class, 'section2'])->name('usa.section2');
            // ---- USA page routes end ----

            // ---- India page routes start ----
            Route::get('/india-banner', [IndiaController::class, 'banner'])->name('india.banner');
            Route::get('/india-section1', [IndiaController::class, 'section1'])->name('india.section1');
            Route::get('/india-section2', [IndiaController::class, 'section2'])->name('india.section2');
            // ---- India page routes end ----

            // ---- South america page routes start ----
            Route::get('/south_america-banner', [SouthAmericaController::class, 'banner'])->name('south_america.banner');
            Route::get('/south_america-section1', [SouthAmericaController::class, 'section1'])->name('south_america.section1');
            Route::get('/south_america-section2', [SouthAmericaController::class, 'section2'])->name('south_america.section2');
            // ---- South america page routes end ----

            // ---- Uganda page routes start ----
            Route::get('/uganda-banner', [UgandaController::class, 'banner'])->name('uganda.banner');
            Route::get('/uganda-section1', [UgandaController::class, 'section1'])->name('uganda.section1');
            Route::get('/uganda-section2', [UgandaController::class, 'section2'])->name('uganda.section2');
            // ---- Uganda page routes end ----

            // ---- Partners Sponsor page routes start ----
            Route::resource('partnersponsor', PartnerSponsorController::class);
            Route::get('/partnersponsor-banner', [PartnerSponsorController::class, 'banner'])->name('partnersponsor.banner');
            Route::get('/partnersponsor-section2', [PartnerSponsorController::class, 'section2'])->name('partnersponsor.section2');
            Route::post('/partnersponsor-title', [PartnerSponsorController::class, 'titleSave'])->name('partnersponsor.title');
            Route::get('/partnersponsor-fees', [PartnerSponsorController::class, 'fees'])->name('partnersponsor.fees');
            Route::post('/partnersponsorFee-update', [PartnerSponsorController::class, 'feesUpdate'])->name('partnersponsor.feeUpdate');
            // ---- Partners Sponsor page routes end ----

            // ---- Become Partner page routes start ----
            Route::resource('becomepartner', BecomePartnerController::class);
            Route::get('/becomepartner-banner', [BecomePartnerController::class, 'banner'])->name('becomepartner.banner');
            Route::get('/becomepartner-section2', [BecomePartnerController::class, 'section2'])->name('becomepartner.section2');
            Route::get('/becomepartner-section3', [BecomePartnerController::class, 'section3'])->name('becomepartner.section3');
            Route::put('/becomepartner-updation/{id}', [BecomePartnerController::class, 'updation'])->name('becomepartner.updation');
            // ---- Become Partner page routes end ----

            // ---- Become Sponsor page routes start ----
            Route::get('/becomesponsor-banner', [BecomeSponsorController::class, 'banner'])->name('becomesponsor.banner');
            Route::get('/becomesponsor-section1', [BecomeSponsorController::class, 'section1'])->name('becomesponsor.section1');
            Route::get('/becomesponsor-section2', [BecomeSponsorController::class, 'section2'])->name('becomesponsor.section2');
            // ---- Become Sponsor page routes end ----

            // ---- Opportunities page routes start ----
            Route::get('/opportunities-banner', [OpporController::class, 'banner'])->name('opportunities.banner');
            Route::get('/opportunities-section1', [OpporController::class, 'section1'])->name('opportunities.section1');
            Route::get('/opportunities-section2', [OpporController::class, 'section2'])->name('opportunities.section2');
            Route::put('/opportunities-update/{id}', [OpporController::class, 'update'])->name('opportunities.update');
            // ---- Opportunities page routes end ----

            // ---- Oppor Agriculture page routes start ----
            Route::get('/opporagr-banner', [OpporAgricultureController::class, 'banner'])->name('opporagr.banner');
            Route::get('/opporagr-section1', [OpporAgricultureController::class, 'section1'])->name('opporagr.section1');
            Route::get('/opporagr-section2', [OpporAgricultureController::class, 'section2'])->name('opporagr.section2');
            // ---- Oppor Agriculture page routes end ----

            // ---- Oppor Construction page routes start ----
            Route::get('/opporcons-banner', [OpporConstructionController::class, 'banner'])->name('opporcons.banner');
            Route::get('/opporcons-section1', [OpporConstructionController::class, 'section1'])->name('opporcons.section1');
            Route::get('/opporcons-section2', [OpporConstructionController::class, 'section2'])->name('opporcons.section2');
            // ---- Oppor Construction page routes end ----

            // ---- Oppor Mining page routes start ----
            Route::get('/oppormining-banner', [OpporMiningController::class, 'banner'])->name('oppormining.banner');
            Route::get('/oppormining-section1', [OpporMiningController::class, 'section1'])->name('oppormining.section1');
            Route::get('/oppormining-section2', [OpporMiningController::class, 'section2'])->name('oppormining.section2');
            // ---- Oppor Mining page routes end ----

            // ---- Oppor Rfx page routes start ----
            Route::get('/opporrfx-banner', [OpporRfxController::class, 'banner'])->name('opporrfx.banner');
            Route::get('/opporrfx-section1', [OpporRfxController::class, 'section1'])->name('opporrfx.section1');
            Route::get('/opporrfx-section2', [OpporRfxController::class, 'section2'])->name('opporrfx.section2');
            Route::get('/opporrfx-section3', [OpporRfxController::class, 'section3'])->name('opporrfx.section3');
            Route::put('/opporrfx-update/{id}', [OpporRfxController::class, 'update'])->name('opporrfx.update');
            // ---- Oppor Rfx page routes end ----

            // ---- Oppor Projects page routes start ----
            Route::resource('listofpro', ProjectController::class);
            Route::get('/listofpro-banner', [ProjectController::class, 'banner'])->name('listofpro.banner');
            Route::put('/listofpro-updation/{id}',[ProjectController::class,'updation'])->name('listofpro.updation');
            // ---- Oppor Projects page routes end ----

            // ---- Member directory page routes start ----
            Route::resource('memberdirectory', MemberDirectoryController::class);
            Route::get('/memberdirectory-banner', [MemberDirectoryController::class, 'banner'])->name('memberdirectory.banner');
            // ---- Member directory page routes end ----

            // ------------- FINANCIAL page routes start -----------------
            Route::resource('financial', FinancialController::class);
            Route::get('/financial-banner', [FinancialController::class, 'banner'])->name('financial.banner');
            Route::get('/financial-section1', [FinancialController::class, 'section1'])->name('financial.section1');
            Route::get('/financial-section2', [FinancialController::class, 'section2'])->name('financial.section2');
            Route::get('/financial-section3', [FinancialController::class, 'section3'])->name('financial.section3');
            Route::put('/financial-updation/{id}',[FinancialController::class,'updation'])->name('financial.updation');
            // ------------- FINANCIAL page routes end -------------------

            // --------------------- grants page routes start ---------------------------
            Route::get('/grants-banner', [GrantsController::class, 'banner'])->name('grants.banner');
            Route::get('/grants-section1', [GrantsController::class, 'section1'])->name('grants.section1');
            Route::get('/grants-section2', [GrantsController::class, 'section2'])->name('grants.section2');
            // --------------------- grants page routes end -----------------------------

            // --------------------- funding page routes start ---------------------------
            Route::get('/funding-banner', [FundingController::class, 'banner'])->name('funding.banner');
            Route::get('/funding-section1', [FundingController::class, 'section1'])->name('funding.section1');
            Route::get('/funding-section2', [FundingController::class, 'section2'])->name('funding.section2');
            // --------------------- funding page routes end -----------------------------

            // -------------------------- form routes start -------------------------------
            Route::get('/forms-banner', [FundingController::class, 'formBanner'])->name('forms.banner');
            // -------------------------- form routes end -------------------------------

            // ------------------------ careers page route start ---------------------------
            Route::resource('careers', CareersController::class);
            Route::get('/careers-banner', [CareersController::class, 'banner'])->name('careers.banner');
            Route::get('/careers-section1', [CareersController::class, 'section1'])->name('careers.section1');
            Route::put('/careers-updation/{id}',[CareersController::class,'updation'])->name('careers.updation');
            // ------------------------ careers page route end -------------------------------

            // ---------------------job opining route start----------------------
            Route::resource('jobs', JobOpeningController::class);
            Route::get('/jobs-banner', [JobOpeningController::class, 'banner'])->name('jobs.banner');
            Route::get('/jobs-section1', [JobOpeningController::class, 'section1'])->name('jobs.section1');
            Route::put('/jobs-updation/{id}',[JobOpeningController::class,'updation'])->name('jobs.updation');
            Route::post('/change-status',[JobOpeningController::class,'statusChange'])->name('jobs.status');
            Route::get('/job-applicants/{id}', [JobOpeningController::class, 'jobApplicants'])->name('job_applicants');
            Route::delete('/delete_application/{id}', [JobOpeningController::class, 'deleteApplicantion'])->name('delete_application');
            // ---------------------job opining route end-------------------------

            // --------------------Users Data route start----------------------
            Route::get('/contactus-data', [ContactController::class, 'contactUsData'])->name('contactus.data');
            Route::get('/contactus-detail/{id}', [ContactController::class, 'contactUsDetail'])->name('contactus.detail');
            Route::delete('/contact-delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');

            Route::get('/company-info', [UsersDataController::class, 'companyInfoData'])->name('company.Info');
            Route::get('/companyinfo.detail/{id}', [UsersDataController::class, 'companyInfoDetail'])->name('companyInfo.detail');
            Route::delete('/companyInfo-delete/{id}', [UsersDataController::class, 'destroyInfo'])->name('companyInfo.delete');

            Route::get('/event-request', [UsersDataController::class, 'eventData'])->name('event.request');
            Route::get('/eventRequest.detail/{id}', [UsersDataController::class, 'eventDetail'])->name('eventRequest.detail');
            Route::delete('/eventRequest-delete/{id}', [UsersDataController::class, 'destroyEvent'])->name('eventRequest.delete');

            Route::get('/subscribers', [UsersDataController::class, 'subscribers'])->name('subscribers');
            Route::delete('/subscribers-delete/{id}', [UsersDataController::class, 'destroysubscriber'])->name('subscribers.delete');


            Route::get('/experience', [UsersDataController::class, 'experience'])->name('experience');
            Route::get('/experience/{id}', [UsersDataController::class, 'experienceDetail'])->name('experience.detail');
            Route::delete('/experience-delete/{id}', [UsersDataController::class, 'destroyexperience'])->name('experience.delete');
            
            
            
            // Financial_forms_request routes start
            Route::get('/userfinancialforms', [UsersDataController::class, 'financialData'])->name('userfinancialforms.index');
            Route::get('/userfinancialforms-detail/{id}', [UsersDataController::class, 'financialDetail'])->name('userfinancialforms.detail');
            Route::delete('/userfinancialforms-delete/{id}', [UsersDataController::class, 'destroyfinancial'])->name('userfinancialforms.delete');
            // Financial_forms_request routes end

            // ---------------------Users Data route end-----------------------------
            
            
            // -------------------------------------------Users route start------------------------------------------------------
            Route::get('/user-index', [UsersDataController::class, 'userData'])->name('registerusers.index');
            Route::get('/user-detail/{id}', [UsersDataController::class, 'userDetail'])->name('registerusers.detail');

            Route::get('/member-feedback', [UsersDataController::class, 'satisfiedFeedback'])->name('member.feedback');
            Route::get('/memberFeedback/{id}', [UsersDataController::class, 'memberFeedbackDetail'])->name('memberFeedback.detail');
            Route::delete('/member-feedback/{id}', [UsersDataController::class, 'destroyeFeedback'])->name('memberFeedback.delete');
            
            Route::delete('/delete-membership/{id}', [UsersDataController::class, 'destroyMembership'])->name('delete.membership');
            Route::delete('/delete-partnership/{id}', [UsersDataController::class, 'destroyPartnership'])->name('delete.partnership');
            Route::delete('/delete-sponsorship/{id}', [UsersDataController::class, 'destroySponsorship'])->name('delete.sponsorship');
            
            Route::post('/sponsorship-status', [UsersDataController::class, 'sponsorshipStatus'])->name('sponsorship.status');
            Route::post('/partnership-status', [UsersDataController::class, 'partnershipStatus'])->name('partnership.status');
            Route::post('/membership-status', [UsersDataController::class, 'membershipStatus'])->name('membership.status');
            // -------------------------------------------Users route end--------------------------------------------------------
        });
    });
});
