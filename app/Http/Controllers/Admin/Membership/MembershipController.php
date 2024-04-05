<?php

namespace App\Http\Controllers\Admin\Membership;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\MembershipCommonModel;
use App\Models\CompanyInformation;
use App\Models\MembershipSection2;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\User;

class MembershipController extends Controller
{
    public function section1(){
        $section = MembershipCommonModel::where(['section'=>1,'page'=>'membership'])->first();
        $page = "Membership";
        $sn = "Section 1";
        return view('admin.pages.membership.common_section',get_defined_vars());
    }

    public function section3(){
        $section = MembershipCommonModel::where(['section'=>3,'page'=>'membership'])->first();
        $page = "Membership";
        $sn = "Section 3";
        return view('admin.pages.membership.common_section',get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $section2 = MembershipSection2::get();
        return view('admin.pages.membership.section2.index', compact('section2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.pages.membership.section2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/web/images'), $file);

        $data = [
            'image' => $file,
            'heading' => $request->heading,
        ];
        MembershipSection2::create($data);
        return redirect()->route('membership.index')->with('success', 'Data created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembershipSection2  $membershipSection2
     * @return \Illuminate\Http\Response
     */
    public function show(MembershipSection2 $membershipSection2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MembershipSection2  $membershipSection2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section2 = MembershipSection2::findOrFail($id);
        return view('admin.pages.membership.section2.edit',compact('section2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembershipSection2  $membershipSection2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = MembershipSection2::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $item->image;
        }
        $data = [
            'image' => $file,
            'heading' => $request->heading,
        ];
        $item->update($data);

        return redirect()->route('membership.index')->with('success', "Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembershipSection2  $membershipSection2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = MembershipSection2::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        MembershipSection2::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }

    public function banner(){
        $banner = PageBanner::where('type',5)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function updation(Request $request,$id){
        $membership = MembershipCommonModel::findOrFail($id);
        if ($membership == null) {
            return redirect()->back()->with('error', 'No records were found for creating.');
        }
        if($membership->page=='membership' && $membership->section==1){
            $route = "membership.section1";
        }elseif($membership->page=='membership' && $membership->section==3){
            $route = "membership.section3";
        }elseif($membership->page=='evaluation' && $membership->section==1){
            $route = "evaluation.section";
        }elseif($membership->page=='evaluation' && $membership->section==3){
            $route = "evaluation.section3";
        }elseif($membership->page=='evaluation' && $membership->section==4){
            $route = "evaluation.section4";
        }elseif($membership->page=='roe' && $membership->section==1){
            $route = "roe.section1";
        }

        if($request->image){
            $file = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $membership->image;
        }
        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $membership->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully");
    }

    public function createMember(){
        return view('admin.pages.users.create_member');
    }

    public function storeMember(Request $request){
        $user = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'type'=>1,
            'member'=>1,
        ]);
        CompanyInformation::create([
            'user_id' => $user->id,
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
            'billing_address_check' => $request->address_check,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'primary_phone' => $request->primary_phone,
            'email' => $request->email,
            'membership_level' => $request->membership_level,
            'about_organization' => $request->about_organization,
            'ownership_structure' => $request->ownership_structure,
            'reason_joining' => $request->reason_joining,
        ]);
        PaymentModel::create([
            'user_id'=>$user->id,
            'trx_id'=>rand(1111111,9999999),
            'amount'=>0,
            'type'=>1,
            'status'=>1,
        ]);
        return redirect()->route('registerusers.index')->with('success','Congratulations! Member Created Successfully');
    }
}