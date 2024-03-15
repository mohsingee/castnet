<?php

namespace App\Http\Controllers\Admin\Partners_sponsors;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\PartnerSponsorPageTitleModel;
use App\Models\PartnerCommonSection1;
use App\Models\PartnerCommonSection2;
use App\Models\PageBanner;

class BecomePartnerController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',33)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section2(){
        $section = PartnerCommonSection1::where(['section'=>2,'page'=>'become_partner'])->first();
        $page = "Become A Partner";
        $sn = "Section 2";
        return view('admin.pages.partners_sponsors.become.common_section',get_defined_vars());
    }

    public function section3(){
        $title = PartnerSponsorPageTitleModel::where(['page'=>'become_partner','section'=>3])->first();
        $section = PartnerCommonSection2::where(['section'=>3,'page'=>'become_partner'])->get();
        $page = "Become A Partner";
        $sn = "Section 3";
        return view('admin.pages.partners_sponsors.become.common_section1',get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $section1 = PartnerCommonSection1::where(['section'=>1,'page'=>'become_partner'])->first();
        $section2 = PartnerCommonSection2::where(['section'=>1,'page'=>'become_partner'])->get();
        $page = "Become A Partner";
        $sn = "Section 1";
        return view('admin.pages.partners_sponsors.become.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($request->section==2 && $request->page=='become_partner'){
            $route = "becomepartner.section2";
        }elseif($request->section==1 && $request->page=='become_partner'){
            $route = "becomepartner.index";
        }elseif($request->section==3 && $request->page=='become_partner'){
            $route = "becomepartner.section3";
        }elseif($request->section==2 && $request->page=='become_sponsor'){
            $route = "becomesponsor.section2";
        }

        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = null;
        }

        PartnerCommonSection2::create([
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
            'page' => $request->page,
            'section' => $request->section,
        ]);

        return redirect()->route($route)->with('success', "Data added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $section = PartnerCommonSection2::where('id',$id)->first();
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        $sn = "Section ".$section->section;
        return view('admin.pages.partners_sponsors.become.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partner = PartnerCommonSection2::findOrFail($id);
        if ($partner == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        if($partner->section==1 && $partner->page=='become_partner'){
            $route = "becomepartner.index";
        }elseif($partner->section==3 && $partner->page=='become_partner'){
            $route = "becomepartner.section3";
        }elseif($partner->section==2 && $partner->page=='become_sponsor'){
            $route = "becomesponsor.section2";
        }

        if($request->image){
            $path = $partner->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $partner->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $partner->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = PartnerCommonSection2::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        PartnerCommonSection2::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request,$id){
        $partner = PartnerCommonSection1::findOrFail($id);
        if ($partner == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        if($partner->section==1 && $partner->page=='become_partner'){
            $route = "becomepartner.index";
        }elseif($partner->section==2 && $partner->page=='become_partner'){
            $route = "becomepartner.section2";
        }elseif($partner->section==1 && $partner->page=='become_sponsor'){
            $route = "becomesponsor.section1";
        }

        if($request->image){
            $path = $partner->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $partner->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $partner->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully.");
    }
}
