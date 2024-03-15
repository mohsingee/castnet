<?php

namespace App\Http\Controllers\Admin\Rules_of_engagement;

use App\Models\RulesOfEngagementModel;
use App\Models\MembershipCommonModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\PageBanner;


class RulesOfEngagementController extends Controller
{
    public function section1(){
        $section = MembershipCommonModel::where(['section'=>1,'page'=>'roe'])->first();
        $page = "Rules Of Engagement";
        $sn = "Section 1";
        return view('admin.pages.membership.common_section',get_defined_vars());
    }

    public function banner(){
        $banner = PageBanner::where('type',10)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function index(){
        $section2 = RulesOfEngagementModel::get();
        return view('admin.pages.rules_of_engagement.index', compact('section2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.pages.rules_of_engagement.create');
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
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
        ];
        RulesOfEngagementModel::create($data);
        return redirect()->route('roe.index')->with('success', 'Data created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembershipSection2  $membershipSection2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $section2 = RulesOfEngagementModel::findOrFail($id);
        return view('admin.pages.rules_of_engagement.edit',compact('section2'));
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
        $item = RulesOfEngagementModel::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $item->image;
        }
        $data = [
            'image' => $file,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
        ];
        $item->update($data);

        return redirect()->route('roe.index')->with('success', "Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembershipSection2  $membershipSection2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = RulesOfEngagementModel::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        RulesOfEngagementModel::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }
}
