<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
class SettingController extends Controller
{ 
    public function index(){
        $setting = Setting::first();
        return view('admin.pages.setting', compact('setting'));
    }

    public function update(Request $request,$id){
        $setting = Setting::findOrFail($id);
        if ($setting == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        if($request->header_logo){
            $header_logo = time().'.'.$request->header_logo->extension();
            $request->header_logo->move(public_path('assets/web/images'), $header_logo);
        }else{
            $header_logo = $setting->header_logo;
        }
        if($request->popup_logo){
            $popup_logo = time().'.'.$request->popup_logo->extension();
            $request->popup_logo->move(public_path('assets/web/images'), $popup_logo);
        }
        else{
            $popup_logo = $setting->popup_logo;
        }
        if($request->footer_logo){
            $footer_logo = time().'.'.$request->footer_logo->extension();
            $request->footer_logo->move(public_path('assets/web/images'), $footer_logo);
        }
        else{
            $footer_logo = $setting->footer_logo;
        }

        $data = [
            'title' => $request->title,
            'header_logo' => $header_logo,
            'popup_logo' => $popup_logo,
            'popup_description' => $request->description,
            'footer_description' => $request->footerDescription,
            'footer_logo' => $footer_logo,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $setting->update($data);
        return redirect()->route('admin.setting')->with('success', 'Website setting updated successfully.');
    }

    public function setting(){
        $setting = Auth::user()->first();
        return view('admin.pages.account_setting',compact('setting'));
    }

    public function updateSetting(Request $request,$id){
        $user = Auth::user();
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:8|max:32',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            if ($request->password == $request->password_confirmation) {
                User::where('id', $user->id)->update(['password' => bcrypt($request->password),'email'=>$request->email]);
                return redirect()->back()->with(['success' => 'The password has been changed.']);
            } else {
                return redirect()->back()->with(['error' => 'The new password and confirm password do not match.']);
            }
        } else {
            return redirect()->back()->with(['error' => 'The current password you provided is incorrect.']);
        }
    }

    public function checkPassword(Request $request){
        $user = Auth::user();
        $data = $request->all();
        if (Hash::check($data['current_password'], $user->password)) {
            echo "true";
        } else {
            echo "false";
        }
    }
}
