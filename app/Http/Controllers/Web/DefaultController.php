<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\Experience;
use App\Models\MembersSatisfiedFeedback;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\NewsletterModel;
use App\Models\FinancialForm;
use App\Models\PartnerUser;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use App\Models\MemberDirectory;
use Egulias\EmailValidator\Parser\PartParser;

class DefaultController extends Controller
{
    public function subscribe(Request $request){
        if(NewsletterModel::where('email',$request->email)->count()>0){
            return response()->json(['status' => false,'message'=>'Email has already been taken!']);
        }
        NewsletterModel::create([
            'email'=>$request->email
        ]);
        return response()->json(['status' => true,'message'=>'You have successfully subscribed!']);
    }

    public function weclome(Request $request){
        $experienceInfo = [
            'organization' => $request->radioNumber1 === 'Other' ? $request->other_value : $request->radioNumber1,
            'castnet_visit' => $request->radioNumber2,
            'sector' => $request->radioNumber3,
            'challenge' => $request->radioNumber4,
            'membership_info' => $request->radioNumber5,
            'contact_info' => $request->name,
            'phone' => $request->phone,
            'company' => $request->company,
            'email' => $request->email,
        ];
        Experience::create($experienceInfo);
        Cookie::queue('user_ip', $request->ip(), 30 * 24 * 60);
        $message = 'Experience added successfully';
        return redirect()->back()->with('success',$message);
    }

    public function satisfiedMembers(Request $request){
        $memberExperiecne = [
            'user_id' => Auth::user()->id,
            'feedback' => $request->membership_experience_satisfaction,
            'member_events' => $request->member_events_participation,
            'feedback_responses' => $request->overall_experience,
            'demographic_feedback' => $request->demographics_feedback,
        ];
        MembersSatisfiedFeedback::create($memberExperiecne);
        $message = 'Experience added successfully';
        return redirect()->back()->with('success',$message);
    }

    public function jobApply(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'cv' => 'required|file|mimes:pdf,doc,docx,txt,rtf,html,jpg,png,odt,tex|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvFileName = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('assets/web/applications'), $cvFileName);
            $file = $cvFileName;
        }

        Application::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'job_id' => $id,
            'file' => $file,
        ]);
        return redirect()->route('web.job_openings')->with('success', 'Application submitted successfully.');
    }

    public function logged(){
        if(Auth::user()->type==0){
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('web.user-dashboard')->with('success','You have successfully login your account.');
        }
    }

    public function checkEmail(Request $request){
        $user = User::where('email',$request->email_check)->first();
        if($user) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function storeFinancial(Request $request){
        $file = time().'.'.$request->file->extension();
        $request->file->move(public_path('assets/web/images'), $file);
        FinancialForm::create([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'business_name' => $request->business_name,
            'business_address' => $request->business_address,
            'fund_purpose' => $request->fund_purpose,
            'fund_amount' => $request->fund_amount,
            'country' => $request->country, 
            'business_type' => $request->business_type,
            'net_worth' => $request->net_worth,
            'program' => $request->program,
            'recent_year_income' => $request->recent_year_income,
            'file' => $file,
        ]);
        return redirect()->back()->with('success','Congratulations! You have successfully sumbitted the financial request.');
    }

    public function storePartner(Request $request){
        if(isset(Auth::user()->id)){
            $user = Auth::user();
            User::where('id',$user->id)->update([
                'partner'=>1,
            ]);
        }else{
            $user = User::create([
                'first_name'=>$request->contact_person_name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'type'=>1,
                'partner'=>1,
            ]);
        }
        PartnerUser::create([
            'user_id' => $user->id,
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
        ]);
        return redirect()->back()->with('success','Congratulations! You have successfully joined the partnership.');
    }

    public function filterMembers(Request $request){
        if($request->data=="1"){
           $members = MemberDirectory::where('member_type','Industry Sector')->get();
        } elseif($request->data=="0"){
            $members = MemberDirectory::get();
        } else{
            $members = MemberDirectory::where('member_type','Advocacy')->get();
        }
        $html = view('web.ajax_load.member_filter', compact('members'))->render();
        return response()->json(['data' => $html]);
    }
}
