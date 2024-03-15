<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfoFormSetting;
use App\Models\CompanyInformation;
use App\Models\EventRequestForm;
use App\Models\Experience;
use App\Models\FinancialForm;
use App\Models\MembersSatisfiedFeedback;
use App\Models\NewsletterModel;
use App\Models\PartnerUser;
use App\Models\SponsorUser;
use App\Models\User;
use Illuminate\Http\Request;

class UsersDataController extends Controller
{
    public function satisfiedFeedback(){
        $data= MembersSatisfiedFeedback::all();

        return view('admin.pages.memberFeedback',compact('data'));
    }
    
    public function financialData(){
        $data= FinancialForm::all();
        return view('admin.pages.financialFormReq',compact('data'));
    }

    public function financialDetail($id){
        $financialData = FinancialForm::findOrFail($id);
        return view('admin.pages.financialDetail', compact('financialData'));
    }

    public function memberFeedbackDetail($id){
        $data = MembersSatisfiedFeedback::findOrFail($id);
        return view('admin.pages.memberFeedbackDetail', compact('data'));
    }

    public function companyInfoData(){
        $data= CompanyInformation::all();
        return view('admin.pages.companyInfoData',compact('data'));
    }

    public function userData(){
        $users= User::all();
        return view('admin.pages.users.index',compact('users'));
    }

    public function userDetail($id){
        $user= $id;
        $memberRecord = CompanyInformation::where('user_id', $user)->with('paymentdetail')->first();
        $partnerRecord = PartnerUser::where('user_id', $user)->first();
        $sponsorRecord = SponsorUser::where('user_id', $user)->with('paymentdetail')->first();           
        return view('admin.pages.users.user_detail',compact('memberRecord','partnerRecord','sponsorRecord'));
    }

    public function subscribers(){
        $data= NewsletterModel::all();
        return view('admin.pages.subscribers',compact('data'));
    }

    public function experience(){

        $data= Experience::all();

        return view('admin.pages.experiences',compact('data'));
    }

    public function companyInfoDetail($id){
        $companyInfo = CompanyInformation::findOrFail($id);
        return view('admin.pages.companyInfoDetail', compact('companyInfo'));
    }

    public function eventData(){
        $data= EventRequestForm::all();
        return view('admin.pages.eventData', compact('data'));
    }

    public function eventDetail($id){
        $eventInfo = EventRequestForm::findOrFail($id);
        return view('admin.pages.eventDetail', compact('eventInfo'));
    }

    public function experienceDetail($id){
        $eventInfo = Experience::findOrFail($id);
        return view('admin.pages.experienceDetail', compact('eventInfo'));
    }

    public function destroyEvent($id){
        EventRequestForm::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Team member deleted successfully.',
            'status' => 'success',
        ));
    }

    public function destroysubscriber($id){
        NewsletterModel::destroy($id);

        return response()->json(array(
            'data' => true,
            'message' => 'Team member deleted successfully.',
            'status' => 'success',
        ));
    }

    public function destroyexperience($id){
        Experience::destroy($id);

        return response()->json(array(
            'data' => true,
            'message' => 'Team member deleted successfully.',
            'status' => 'success',
        ));
    }

    public function destroyfinancial($id){
        FinancialForm::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Team member deleted successfully.',
            'status' => 'success',
        ));
    }

    public function destroyeFeedback($id)
    {
        MembersSatisfiedFeedback::destroy($id);

        return response()->json(array(
            'data' => true,
            'message' => 'Team member deleted successfully.',
            'status' => 'success',
        ));
    }

    public function destroyMembership($id){
        $member = CompanyInformation::find($id);
        User::where('id',$member->user_id)->update(['member'=>0]);
        $user = User::find($member->user_id);
        CompanyInformation::destroy($id);
        
        if($user->member==0 && $user->sponsor==0 && $user->partner==0){
            User::destroy($user->id);
        }
        return response()->json(array(
            'data' => true,
            'url' => true,
            'message' => 'Membership deleted successfully.',
            'status' => 'success',
        ));
    }

    public function destroyPartnership($id){
        $partner = PartnerUser::find($id);
        User::where('id',$partner->user_id)->update(['partner'=>0]);
        $user = User::find($partner->user_id);
        PartnerUser::destroy($id);
        if($user->member==0 && $user->sponsor==0 && $user->partner==0){
            User::destroy($user->id);
        }
        return response()->json(array(
            'data' => true,
            'url' => true,
            'message' => 'Partnership deleted successfully.',
            'status' => 'success',
        ));
    }

    public function destroySponsorship($id){
        $sponsor = SponsorUser::find($id);
        User::where('id',$sponsor->user_id)->update(['sponsor'=>0]);
        $user = User::find($sponsor->user_id);
        SponsorUser::destroy($id);
        if($user->member==0 && $user->sponsor==0 && $user->partner==0){
            User::destroy($user->id);
        }
        return response()->json(array(
            'data' => true,
            'url' => true,
            'message' => 'Sponsorhsip deleted successfully.',
            'status' => 'success',
        ));
    }

    public function sponsorshipStatus(Request $request){
        $sponsor = SponsorUser::find($request->id);
        SponsorUser::where('id',$request->id)->update(['status'=>$request->status]);
        User::where('id',$sponsor->user_id)->update(['sponsor_status'=>$request->status]);
        return response()->json(array(
            'data' => true,
            'message' => 'Sponsorhsip status changed successfully.',
            'status' => 'success',
        ));
    }

    public function partnershipStatus(Request $request){
        $partner = PartnerUser::find($request->id);
        PartnerUser::where('id',$request->id)->update(['status'=>$request->status]);
        User::where('id',$partner->user_id)->update(['partner_status'=>$request->status]);
        return response()->json(array(
            'data' => true,
            'message' => 'Partnership status changed successfully.',
            'status' => 'success',
        ));
    }

    public function membershipStatus(Request $request){
        $member = CompanyInformation::find($request->id);
        CompanyInformation::where('id',$request->id)->update(['status'=>$request->status]);
        User::where('id',$member->user_id)->update(['member_status'=>$request->status]);
        return response()->json(array(
            'data' => true,
            'message' => 'Membership status changed successfully.',
            'status' => 'success',
        ));
    }
}
