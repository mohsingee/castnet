<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CompanyInformation;
use Illuminate\Http\Request;
use App\Models\SponsorUser;
use App\Models\PartnerUser;
use App\Models\Banner;
use App\Models\FinancialForm;
use App\Models\User;
class UserSettingController extends Controller
{
    public function index(Request $request){
        $setting = Auth::user();
        $banner = Banner::first();   
        return view('web.pages.users.index',get_defined_vars());
    }

    public function updatePassword(Request $request,$id){
        $user = Auth::user();
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:8|max:32',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            if ($request->password == $request->password_confirmation) {
                User::where('id', $user->id)->update(['password' => bcrypt($request->password)]);
                return redirect()->back()->with(['success' => 'The password has been changed.']);
            } else {
                return redirect()->back()->with(['error' => 'The new password and confirm password do not match.']);
            }
        } else {
            return redirect()->back()->with(['error' => 'The current password you provided is incorrect.']);
        }
    }

    public function member(Request $request){
        $setting = Auth::user();
        $member = CompanyInformation::where('user_id', $setting->id)->first();
        $financialForms = FinancialForm::where('user_id', $setting->id)->first();
        $banner = Banner::first();   
        return view('web.pages.users.member',get_defined_vars());
    }

    public function partner(Request $request){
        $setting = Auth::user();
        $partner = PartnerUser::where('user_id', $setting->id)->first();
        $financialForms = FinancialForm::where('user_id', $setting->id)->first();
        $banner = Banner::first();   
        return view('web.pages.users.partner',get_defined_vars());
    }

    public function sponsor(Request $request){
        $setting = Auth::user();
        $sponsor = SponsorUser::where('user_id', $setting->id)->first();
        $financialForms = FinancialForm::where('user_id', $setting->id);
        $banner = Banner::first();   
        return view('web.pages.users.sponsor',get_defined_vars());
    }
    public function financialForms(Request $request){
        $setting = Auth::user();
        $financialForms = FinancialForm::where('user_id', $setting->id)->get();
        $banner = Banner::first();  
        // dd($financialForms); 
        return view('web.pages.users.financialForms',get_defined_vars());
    }
    public function financialDetail($id,Request $request){
        $setting = Auth::user();
    $financialForm = FinancialForm::where('user_id', $setting->id)->findOrFail($id);
    $banner = Banner::first();  
    // dd($financialForm);
 
        return view('web.pages.users.financialDetail',get_defined_vars());
    }

}
