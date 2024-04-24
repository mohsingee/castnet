<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\PartnerSponsorPageTitleModel;
use App\Models\OutreachCommonSectionModel;
use Illuminate\Support\Facades\Validator;
use App\Models\RulesOfEngagementModel;
use App\Models\CompanyInfoFormSetting;
use App\Models\PartnerCommonSection1;
use App\Models\PartnerCommonSection2;
use App\Models\FinancialCommonModel1;
use App\Models\OurEventCalenderModel;
use App\Models\MembershipCommonModel;
use App\Models\SectorCommonSection1;
use App\Models\SectorCommonSection2;
use App\Models\FinancialCommonModel;
use App\Models\AdvocacyCommonModel1;
use Illuminate\Support\Facades\Mail;
use App\Models\HomeSection9Feature;
use App\Models\BenefitsDetailModel;
use App\Models\AdvocacyCommonModel;
use App\Models\CareersCommonModel1;
use App\Models\MembershipSection2;
use App\Models\CommonEventSection;
use App\Models\OpportunitiesModel;
use App\Models\CompanyInformation;
use App\Models\HomeSection4Detail;
use App\Models\HomeSectionSponser;
use App\Models\HomeSectionFeature;
use App\Models\InternationalEvent;
use App\Models\Event_Request_Type;
use App\Models\HomeSectionEvent;
use App\Models\Membership_Level;
use App\Models\MemberDirectory;
use App\Models\ProgramSection1;
use App\Models\ProgramSection2;
use App\Models\ContactUsModel;
use App\Models\BenefitsModel;
use App\Models\OurEventModel;
use App\Models\ProjectsModel;
use App\Models\LegalDocument;
use App\Models\PartnersModel;
use App\Models\CareersModel;
use App\Models\HomeSection1;
use App\Models\HomeSection2;
use App\Models\HomeSection3;
use App\Models\HomeSection4;
use App\Models\HomeSection5;
use App\Models\HomeSection6;
use App\Models\HomeSection7;
use App\Models\HomeSection8;
use App\Models\HomeSection9;
use App\Models\ProjectModel;
use App\Models\SectorModel;
use App\Models\PageBanner;
use App\Models\JoinWidget;
use App\Models\EventModel;
use App\Models\AboutPage;
use App\Models\ContactUs;
use App\Models\OurTeam;
use App\Models\Banner;
use App\Models\MyBlog;
use App\Models\User;
use App\Models\Job;
use App\Models\PartnerUser;
use App\Models\SponsorUser;

class PagesController extends Controller
{
    public function index(Request $request){
        $keywords = "CASTNET,Global markets,International business,Global networking,Economic trends,Market trends,Global commerce,Business opportunities,Global economy,International markets,Global Sourcing";
        $banner = Banner::first();
        $section1 = HomeSection1::all();
        $section2 = HomeSection2::first();
        $section3 = HomeSection3::first();
        $section4 = HomeSection4::first();
        $section5 = HomeSection5::first();
        $section6 = HomeSection6::first();
        $section7 = HomeSection7::first();
        $section8 = HomeSection8::first();
        $section9 = HomeSection9::first();
        $section4detail = HomeSection4Detail::get();
        $section5event = HomeSectionEvent::get();
        $section6sponsor = HomeSectionSponser::get();
        $section8feature1 = HomeSectionFeature::take(3)->get();
        $section8feature2 = HomeSectionFeature::skip(3)->take(3)->get();
        $section9feature = HomeSection9Feature::get();
        return view('web.pages.home',get_defined_vars());
    }

    public function updateSponser(Request $request){
        $sponsor = SponsorUser::findOrFail($request->input('sponsor_id'));
        $data = [
            'sponsor_name' => $request->sponsor_name,
            'contact_person_name' => $request->contact_person_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'website_url' => $request->website_url,
            'industry_sector' => $request->industry_sector,
            'specific_interest' => $request->specific_interest,
            'geographic_focus' => $request->geographic_focus,
            'sponsorship_level' => $request->sponsorship_level,
            'sponsorship_goals' => $request->sponsorship_goals,
            'sponsorship_experiences' => $request->sponsorship_experiences,
            'sponsorship_preferences' => $request->sponsorship_preferences,
            'sponsorship_budget' => $request->sponsorship_budget,
            'payment_schedule' => $request->payment_schedule,
            'additional_support' => $request->additional_support,
            'hear_about' => $request->hear_about,
            'data_protection_consent' => $request->data_protection_consent,
        ];

        $sponsor->update($data);
        return redirect()->back()->with('success', 'Sponsor information updated successfully!');
    }

    public function updatePartner(Request $request){
        $partner = PartnerUser::findOrFail($request->input('partner_id'));
        $data = [
            'organization_name' => $request->organization_name,
            'contact_person_name' => $request->contact_person_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'organization_website' => $request->organization_website,
            'industry_sector' => $request->industry_sector,
            'partnership_dur' => $request->partnership_dur,
            'partnership_interest' => $request->partnership_interest,
            'previous_partnership' => $request->previous_partnership,
            'past_partnership_details' => $request->past_partnership_details,
            'target_geographic_regions' => $request->target_geographic_regions,
            'project_opportunities' => $request->project_opportunities,
            'non_monetary_support' => $request->non_monetary_support,
            'partnering_goals' => $request->partnering_goals,
            'expected_outcomes' => $request->expected_outcomes,
            'non_monetary_support_offered' => $request->non_monetary_support_offered,
            'legal_compliance_agree' => $request->legal_compliance_agree,
            'legal_compliance_understanding' => $request->legal_compliance_understanding,
            'hear_about' => $request->hear_about,
            'additional_information' => $request->additional_information,
            'data_protection_consent' => $request->data_protection_consent,
        ];

        $partner->update($data);

        return redirect()->back()->with('success', 'Partner information updated successfully!');
    }

    public function updateMember(Request $request){
        $member = CompanyInformation::findOrFail($request->input('member_id'));
        $data = [
            'organization_name' => $request->organization_name,
            'phone_number' => $request->phone_number,
            'website_address' => $request->website_address,
            'number_of_employees' => $request->number_of_employees,
            'billing_email' => $request->billing_email,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_state' => $request->billing_state,
            'billing_zip' => $request->billing_zip,
            'billing_country' => $request->billing_country,
            'billing_address_check' => $request->billing_address_check,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'primary_phone' => $request->primary_phone,
            'email' => $request->email,
            'membership_level' => $request->membership_level,
            'about_organization' => $request->about_organization,
            'ownership_structure' => $request->ownership_structure,
            'reason_joining' => $request->reason_joining,
        ];

        $member->update($data);

        return redirect()->back()->with('success', 'Member information updated successfully!');
    }

    public function aboutUs(){
        $keywords = "About CASTNET,International partnerships,Business collaboration,Global investment,International business strategy,Chamber of commerce";
        $banner = PageBanner::where('type',1)->first();
        $section1 = AboutPage::where('section',1)->first();
        $section2 = AboutPage::where('section',2)->first();
        $section3 = AboutPage::where('section',3)->first();
        return view('web.pages.about',get_defined_vars());
    }

    public function benefits(){
        $keywords = "Economic strategies,Global entrepreneurship";
        $banner = PageBanner::where('type',7)->first();
        $section1 = BenefitsModel::where('type',1)->with('details')->first();
        $section2 = BenefitsModel::where('type',2)->with('details')->first();
        return view('web.pages.benefits',get_defined_vars());
    }

    public function contactUs(){
        $keywords = "Trade support,International contracts";
        $banner = PageBanner::where('type',4)->first();
        $contact = ContactUsModel::first();
        return view('web.pages.contact_us',get_defined_vars());
    }

    public function blog(){
        $keywords = "Market trends,Economic trends,Global market analysis";
        $banner = PageBanner::where('type',28)->first();
        $blogs = MyBlog::all();
        return view('web.pages.blog',get_defined_vars());
    }

    public function events(){
        $keywords = "International events,Business conferences";
        $banner = PageBanner::where('type',24)->first();
        $section1 = EventModel::where('section',1)->first();
        $section3 = EventModel::where('section',3)->first();
        $events = OurEventModel::all();
        return view('web.pages.events',get_defined_vars());
    }

    public function evaluation(){
        $keywords = "Economic development,Business development";
        $banner = PageBanner::where('type',9)->first();
        $section1 = MembershipCommonModel::where(['page'=>'evaluation','section'=>1])->first();
        $section3 = MembershipCommonModel::where(['page'=>'evaluation','section'=>3])->first();
        $section4 = MembershipCommonModel::where(['page'=>'evaluation','section'=>4])->first();
        return view('web.pages.evaluation',get_defined_vars());
    }

    public function rules_of_engagement(){
        $keywords = "Economic development,Business development";
        $banner = PageBanner::where('type',10)->first();
        $section1 = MembershipCommonModel::where(['section'=>1,'page'=>'roe'])->first();
        $section2 = RulesOfEngagementModel::get();
        return view('web.pages.rules_of_engagement',get_defined_vars());
    }

    public function sectors(){
        $keywords = "International construction,Africa commerce,International Energy,Natural resources,Renewable energy,International textiles,International technology";
        $banner = PageBanner::where('type', 11)->first();
        $sectors = SectorModel::get();
        return view('web.pages.sectors',get_defined_vars());
    }

    public function construction(){
        $keywords = "International construction,Africa commerce,International Energy,Natural resources,Renewable energy,International textiles,International technology";
        $banner = PageBanner::where('type', 12)->first();
        $section1 = SectorCommonSection1::where('type',1)->first();
        $section2 = SectorCommonSection2::where('type',1)->first();
        return view('web.pages.construction',get_defined_vars());
    }

    public function agriculture(){
        $keywords = "International construction,Africa commerce,International Energy,Natural resources,Renewable energy,International textiles,International technology";
        $banner = PageBanner::where('type', 13)->first();
        $section1 = SectorCommonSection1::where('type',2)->first();
        $section2 = SectorCommonSection2::where('type',2)->first();
        return view('web.pages.agriculture',get_defined_vars());
    }

    public function supply_chain(){
        $keywords = "International construction,Africa commerce,International Energy,Natural resources,Renewable energy,International textiles,International technology";
        $banner = PageBanner::where('type', 14)->first();
        $section1 = SectorCommonSection1::where('type',3)->first();
        $section2 = SectorCommonSection2::where('type',3)->first();
        return view('web.pages.supply_chain',get_defined_vars());
    }

    public function technology(){
        $keywords = "International construction,Africa commerce,International Energy,Natural resources,Renewable energy,International textiles,International technology";
        $banner = PageBanner::where('type', 15)->first();
        $section1 = SectorCommonSection1::where('type',4)->first();
        $section2 = SectorCommonSection2::where('type',4)->first();
        return view('web.pages.technology',get_defined_vars());
    }

    public function natural_resources(){
        $keywords = "International construction,Africa commerce,International Energy,Natural resources,Renewable energy,International textiles,International technology";
        $banner = PageBanner::where('type', 16)->first();
        $section1 = SectorCommonSection1::where('type',5)->first();
        $section2 = SectorCommonSection2::where('type',5)->first();
        return view('web.pages.natural_resources',get_defined_vars());
    }

    public function energy(){
        $keywords = "International construction,Africa commerce,International Energy,Natural resources,Renewable energy,International textiles,International technology";
        $banner = PageBanner::where('type', 17)->first();
        $section1 = SectorCommonSection1::where('type',6)->first();
        $section2 = SectorCommonSection2::where('type',6)->first();
        return view('web.pages.energy',get_defined_vars());
    }

    public function textiles(){
        $keywords = "International construction,Africa commerce,International Energy,Natural resources,Renewable energy,International textiles,International technology";
        $banner = PageBanner::where('type', 18)->first();
        $section1 = SectorCommonSection1::where('type',7)->first();
        $section2 = SectorCommonSection2::where('type',7)->first();
        return view('web.pages.textiles',get_defined_vars());
    }

    public function advocacy(){
        $keywords = "Advocacy women,Climate Change";
        $banner = PageBanner::where('type',19)->first();
        $title2 = PartnerSponsorPageTitleModel::where(['page'=>'advocacy','section'=>2])->first();
        $title3 = PartnerSponsorPageTitleModel::where(['page'=>'advocacy','section'=>3])->first();
        $section1 = AdvocacyCommonModel::where(['page'=>'advocacy','section'=>1])->first();
        $section2 = AdvocacyCommonModel1::where(['page'=>'advocacy','section'=>2])->get();
        $section3 = AdvocacyCommonModel1::where(['page'=>'advocacy','section'=>3])->get();
        return view('web.pages.advocacy',get_defined_vars());
    }

    public function small_businesses(){
        $keywords = "Advocacy women,Climate Change";
        $banner = PageBanner::where('type',20)->first();
        $section1 = AdvocacyCommonModel::where(['page'=>'small_business','section'=>1])->first();
        $section2 = AdvocacyCommonModel::where(['page'=>'small_business','section'=>2])->first();
        $section3 = AdvocacyCommonModel::where(['page'=>'small_business','section'=>3])->first();
        $section4 = AdvocacyCommonModel::where(['page'=>'small_business','section'=>4])->first();
        $section5 = AdvocacyCommonModel::where(['page'=>'small_business','section'=>5])->first();
        return view('web.pages.small_businesses',get_defined_vars());
    }

    public function women(){
        $keywords = "Advocacy women,Climate Change";
        $banner = PageBanner::where('type',21)->first();
        $section1 = AdvocacyCommonModel::where(['page'=>'women','section'=>1])->first();
        $section2 = AdvocacyCommonModel1::where(['page'=>'women','section'=>2])->get();
        $section3 = AdvocacyCommonModel::where(['page'=>'women','section'=>3])->first();
        $section4 = AdvocacyCommonModel::where(['page'=>'women','section'=>4])->first();
        $section5 = AdvocacyCommonModel::where(['page'=>'women','section'=>5])->first();
        $section6 = AdvocacyCommonModel::where(['page'=>'women','section'=>6])->first();
        return view('web.pages.women',get_defined_vars());
    }

    public function veterans(){
        $keywords = "Advocacy women,Climate Change";
        $banner = PageBanner::where('type',22)->first();
        $section1 = AdvocacyCommonModel::where(['page'=>'veterans','section'=>1])->first();
        $section2 = AdvocacyCommonModel1::where(['page'=>'veterans','section'=>2])->get();
        $section3 = AdvocacyCommonModel::where(['page'=>'veterans','section'=>3])->first();
        return view('web.pages.veterans',get_defined_vars());
    }

    public function support_services(){
        $keywords = "Trade barriers,International trade finance,Global economic policies";
        $banner = PageBanner::where('type',23)->first();
        $section1 = AdvocacyCommonModel::where(['page'=>'support_services','section'=>1])->first();
        $section2 = AdvocacyCommonModel1::where(['page'=>'support_services','section'=>2])->get();
        $section3 = AdvocacyCommonModel::where(['page'=>'support_services','section'=>3])->first();
        return view('web.pages.support_services',get_defined_vars());
    }

    public function international_events(){
        $keywords = "International events,Business conferences";
        $banner = PageBanner::where('type', 27)->first();
        $events = InternationalEvent::get();
        $widget = CommonEventSection::first();
        return view('web.pages.international_events',get_defined_vars());
    }

    public function contactUsData(Request $request){
        $contactUs = [
            'first_name' => $request->fName,
            'last_name' => $request->lName,
            'email' => $request->email,
            'telephone' => $request->phone,
            'message' => $request->message,
        ];
        ContactUs::create($contactUs);

        $message = 'Event Request added successfully';
        return redirect()->back()->with('message', $message);
    }
    
    public function event_request(){
        $keywords = "International events,Business conferences";
        if (auth()->check()) {
            if (auth()->user()->member==1 && auth()->user()->member_status==0 || auth()->user()->sponsor==1 && auth()->user()->sponsor_status==0 || auth()->user()->partner==1 && auth()->user()->partner_status==0) {
                $banner = PageBanner::where('type', 26)->first();
                $title = PartnerSponsorPageTitleModel::where(['page' => 'event_request', 'section' => 1])->first();
                $eventCategory = CompanyInfoFormSetting::where('type', 'event_category')->get();
                $eventReqType = Event_Request_Type::first();
                $secondEventReqType = Event_Request_Type::skip(1)->first();
                return view('web.pages.event_request', get_defined_vars());
            } else {
                return redirect()->back()->with('error', 'Oops! Your account has been deactivated by the administrator.');
            }
        } else {
            return redirect()->back()->with('error', 'Access to this page is restricted to members, partners, and sponsors only.');
        }
    }

    public function event_calendar(){
        $keywords = "International events,Business conferences";
        $banner = PageBanner::where('type', 25)->first();
        $items = OurEventCalenderModel::get();
        return view('web.pages.event_calendar',get_defined_vars());
    }

    public function financial(){
        $keywords = "Small business financing,Trade finance,Financing";
        $banner = PageBanner::where('type', 29)->first();
        $section1 = FinancialCommonModel1::where(['page'=>'financial','section'=>1])->get();
        $section2 = FinancialCommonModel::where(['page'=>'financial','section'=>2])->first();
        $section3 = FinancialCommonModel1::where(['page'=>'financial','section'=>3])->get();
        return view('web.pages.financial',get_defined_vars());  
    }

    public function grants(){
        $keywords = "Small business financing,Trade finance,Financing";
        $banner = PageBanner::where('type', 30)->first();
        $section1 = FinancialCommonModel::where(['page'=>'grants','section'=>1])->first();
        $section2 = FinancialCommonModel1::where(['page'=>'grants','section'=>2])->get();
        return view('web.pages.grants',get_defined_vars());
    }

    public function funding(){
        $keywords = "Small business financing,Trade finance,Financing";
        $banner = PageBanner::where('type', 31)->first();
        $section1 = FinancialCommonModel::where(['page'=>'funding','section'=>1])->first();
        $section2 = FinancialCommonModel1::where(['page'=>'funding','section'=>2])->get();
        return view('web.pages.funding',get_defined_vars());
    }

    public function forms(){
        $keywords = "Small business financing,Trade finance,Financing";
        if (auth()->check()) {
            if (auth()->user()->member==1 && auth()->user()->member_status==0 || auth()->user()->sponsor==1 && auth()->user()->sponsor_status==0) {
                $banner = PageBanner::where('type', 58)->first();
                return view('web.pages.forms',get_defined_vars());
            } else {
                return redirect()->back()->with('error', 'Oops! Your account has been deactivated by the administrator.');
            }
        } else {
            return redirect()->back()->with('error', 'Access to this page is restricted to members and sponsors only.');
        }
    }

    public function partners_sponsors(){
        $keywords = "International partnerships,Investors";
        $banner = PageBanner::where('type', 32)->first();
        $section1 = PartnersModel::where('section',1)->get();
        $title1 = PartnerSponsorPageTitleModel::where(['page'=>'partners_sponsors','section'=>1])->first();
        $section2 = PartnersModel::where('section',2)->get();
        $title2 = PartnerSponsorPageTitleModel::where(['page'=>'partners_sponsors','section'=>2])->first();
        return view('web.pages.partners_sponsors',get_defined_vars());
    }

    public function become_partner(){
        $keywords = "International partnerships,Investors";
        if(Auth::user()){
            if(auth()->user()->partner==1){
                return redirect()->back()->with('error','Oops! You cannot access this page because you are already a partner.');
            }
        }
        $banner = PageBanner::where('type', 33)->first();
        $amount = Event_Request_Type::where('id',3)->first('fee');
        $section1 = PartnerCommonSection1::where(['section'=>1,'page'=>'become_partner'])->first();
        $section1s = PartnerCommonSection2::where(['section'=>1,'page'=>'become_partner'])->get();
        $section2 = PartnerCommonSection1::where(['section'=>2,'page'=>'become_partner'])->first();
        $title = PartnerSponsorPageTitleModel::where(['page'=>'become_partner','section'=>3])->first();
        $section3 = PartnerCommonSection2::where(['section'=>3,'page'=>'become_partner'])->get();
        $partners = PartnersModel::where('section',1)->get();
        return view('web.pages.become_partner',get_defined_vars());
    }

    public function become_sponsor(){
        $keywords = "International partnerships,Investors";
        if(Auth::user()){
            if(auth()->user()->sponsor==1){
                return redirect()->back()->with('error','Oops! You cannot access this page because you are already a sponsor.');
            }
        }
        $banner = PageBanner::where('type', 34)->first();
        $amount = Event_Request_Type::where('id',4)->first('fee');
        $section1 = PartnerCommonSection1::where(['section'=>1,'page'=>'become_sponsor'])->first();
        $title = PartnerSponsorPageTitleModel::where(['page'=>'become_sponsor','section'=>2])->first();
        $title2 = PartnerSponsorPageTitleModel::where(['page'=>'partners_sponsors','section'=>2])->first();
        $section2 = PartnerCommonSection2::where(['section'=>2,'page'=>'become_sponsor'])->get();
        $partners = PartnersModel::where('section',2)->get();
        return view('web.pages.become_sponsor',get_defined_vars());
    }

    public function outreach(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 35)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'outreach','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'outreach','section'=>2])->first();
        $section3 = OutreachCommonSectionModel::where(['page'=>'outreach','section'=>3])->first();
        return view('web.pages.outreach',get_defined_vars());
    }

    public function chad(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 36)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'chad','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'chad','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function ghana(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 37)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'ghana','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'ghana','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function south_africa(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 38)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'southafrica','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'southafrica','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function zimbabwe(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 39)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'zimbabwe','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'zimbabwe','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function cameroon(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 40)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'cameroon','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'cameroon','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function drc(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 41)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'drc','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'drc','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function cote_divoire(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 42)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'cotedivoire','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'cotedivoire','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function usa(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 43)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'usa','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'usa','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function india(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 51)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'india','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'india','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function south_america(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 52)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'south_america','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'south_america','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function uganda(){
        $keywords = "Uganda,Zimbabwe,Ghana,DRC,South Africa,Cote d’Ivoire,Chad,Cameroon,Brazil";
        $banner = PageBanner::where('type', 53)->first();
        $section1 = OutreachCommonSectionModel::where(['page'=>'uganda','section'=>1])->first();
        $section2 = OutreachCommonSectionModel::where(['page'=>'uganda','section'=>2])->first();
        return view('web.pages.outreach_pages',get_defined_vars());
    }

    public function opportunities(){
        $keywords = "International mining,Business opportunities,Trade opportunities,Job openings";
        $banner = PageBanner::where('type',44)->first();
        $section1 = OpportunitiesModel::where(['section'=>1,'page'=>'oppor'])->first();
        $section2 = OpportunitiesModel::where(['section'=>2,'page'=>'oppor'])->first();
        return view('web.pages.opportunities',get_defined_vars());
    }

    public function opportunities_agriculture(){
        $keywords = "International mining,Business opportunities,Trade opportunities,Job openings";
        $banner = PageBanner::where('type',45)->first();
        $section1 = OpportunitiesModel::where(['section'=>1,'page'=>'agri'])->first();
        $section2 = OpportunitiesModel::where(['section'=>2,'page'=>'agri'])->first();
        return view('web.pages.opportunities_agriculture',get_defined_vars());
    }

    public function opportunities_construction(){
        $keywords = "International mining,Business opportunities,Trade opportunities,Job openings";
        $banner = PageBanner::where('type',46)->first();
        $section1 = OpportunitiesModel::where(['section'=>1,'page'=>'cons'])->first();
        $section2 = OpportunitiesModel::where(['section'=>2,'page'=>'cons'])->first();
        return view('web.pages.opportunities_construction',get_defined_vars());
    }

    public function mining(){
        $keywords = "International mining,Business opportunities,Trade opportunities,Job openings";
        $banner = PageBanner::where('type',47)->first();
        $section1 = OpportunitiesModel::where(['section'=>1,'page'=>'mining'])->first();
        $section2 = OpportunitiesModel::where(['section'=>2,'page'=>'mining'])->first();
        return view('web.pages.mining',get_defined_vars());
    }

    public function rfx(){
        $keywords = "International mining,Business opportunities,Trade opportunities,Job openings";
        $banner = PageBanner::where('type',48)->first();
        $section1 = OpportunitiesModel::where(['section'=>1,'page'=>'rfx'])->first();
        $section2 = OpportunitiesModel::where(['section'=>2,'page'=>'rfx'])->first();
        $project = ProjectModel::where('page','rfx')->first();
        return view('web.pages.rfx',get_defined_vars());
    }

    public function job_openings(){
        $keywords = "International mining,Business opportunities,Trade opportunities,Job openings";
        $banner = PageBanner::where('type',50)->first();
        $section1 = CareersModel::where(['page'=>'job','section'=>1])->first();
        $section2 = Job::all();
        return view('web.pages.job_openings',get_defined_vars());
    }

    public function job_detail($id){
        $keywords = "International mining,Business opportunities,Trade opportunities,Job openings";
        $banner = PageBanner::where('type',50)->first();
        $selectedJob = Job::findOrFail($id);
        return view('web.pages.job_detail',get_defined_vars());
    }

    public function careers(){
        $keywords = "International mining,Business opportunities,Trade opportunities,Job openings";
        $banner = PageBanner::where('type',49)->first();
        $section1 = CareersModel::where(['page'=>'careers','section'=>1])->first();
        $section2 = CareersCommonModel1::get();
        return view('web.pages.careers',get_defined_vars());
    }

    public function join(){
        $keywords = "Small businesses,Small business financing,Investors";
        if(Auth::user()){
            if(auth()->user()->member==1){
                return redirect()->back()->with('error','Oops! You cannot access this page because you are already a member.');
            }
        }
        $banner = PageBanner::where('type',6)->first();
        $joins =  Membership_Level::all();
        $reasonsForJoining = CompanyInfoFormSetting::where('type', 'reason_for_joining')->get();
        $ownershipStructure = CompanyInfoFormSetting::where('type', 'ownership_structure')->get();
        $businessDescription = CompanyInfoFormSetting::where('type', 'business_description')->get();
        $memberLevel = CompanyInfoFormSetting::where('type', 'member_level')->get();
        return view('web.pages.join',get_defined_vars());
    }

    public function membership(){
        $keywords = "Small businesses,Small business financing,Investors";
        $banner = PageBanner::where('type',5)->first();
        $section1 = MembershipCommonModel::where(['page'=>'membership','section'=>1])->first();
        $section2 = MembershipSection2::get();
        $section3 = MembershipCommonModel::where(['page'=>'membership','section'=>3])->first();
        return view('web.pages.membership',get_defined_vars());
    }

    public function programs(){
        $keywords = "International advocacy,Trade education,Business conferences";
        $banner = PageBanner::where('type',8)->first();
        $section1 = ProgramSection1::first();
        $section2 = ProgramSection2::get();
        return view('web.pages.programs',get_defined_vars());
    }

    public function team(){
        $keywords = "Multinational networking,International business strategy";
        $banner = PageBanner::where('type',3)->first();
        $founder = OurTeam::where('type', 1)->get();
        $boardd = OurTeam::where('type', 2)->get();
        $management = OurTeam::where('type', 3)->get();
        $councilc = OurTeam::where('type', 4)->get();
        $councili = OurTeam::where('type', 5)->get();
        $program = OurTeam::where('type', 6)->get();
        $staff = OurTeam::where('type', 7)->get();
        return view('web.pages.team',get_defined_vars());
    }

    public function whoweare(){
        $keywords = "Who We Are";
        $banner = PageBanner::where('type',2)->first();
        $section4 = AboutPage::where('section',4)->first();
        $section5 = AboutPage::where('section',5)->first();
        $section6 = HomeSection3::first();
        return view('web.pages.whoweare',get_defined_vars());
    }

    public function privacypolicy(){
        $keywords = "Castnet privacy & policy";
        $banner = PageBanner::where('type',56)->first();
        $section1 = LegalDocument::where(['page'=>'privacy policy','section'=>'section1'])->first();
        $section2 = LegalDocument::where(['page'=>'privacy policy','section'=>'section2'])->first();
        return view('web.pages.privacypolicy',get_defined_vars());
    }

    public function termsuse(){
        $keywords = "Castnet term of use";
        $banner = PageBanner::where('type',57)->first();
        $section1 = LegalDocument::where(['page'=>'term of use','section'=>'section1'])->first();
        $section2 = LegalDocument::where(['page'=>'term of use','section'=>'section2'])->first();
        return view('web.pages.termsuse',get_defined_vars());
    }

    public function login(){
        $keywords = "Login to Castnet";
        return view('web.pages.login',get_defined_vars());
    }

    public function register(){
        $keywords = "Register to Castnet";
        return view('web.pages.register',get_defined_vars());
    }

    public function listProject(){
        if (auth()->check()) {
            if (auth()->user()->member==1 && auth()->user()->member_status==0 || auth()->user()->sponsor==1 && auth()->user()->sponsor_status==0) {
                $banner = PageBanner::where('type', 54)->first();
                $section1 = ProjectsModel::where('section',1)->first();
                $section2 = ProjectsModel::where('section',2)->get();
                return view('web.pages.list_project',get_defined_vars());
            } else {
                return redirect()->route('web.rfx')->with('error', 'Oops! Your account has been deactivated by the administrator.');
            }
        } else {
            return redirect()->route('web.rfx')->with('error', 'Access to this page is restricted to members and sponsors only.');
        }
    }

    public function member_directory(){
        $keywords = "Castnet,Member directory";
        $banner = PageBanner::where('type', 55)->first();
        $members = MemberDirectory::get();
        return view('web.pages.member_directory',get_defined_vars());
    }
}
