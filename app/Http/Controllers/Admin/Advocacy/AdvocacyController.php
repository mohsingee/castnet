<?php

namespace App\Http\Controllers\Admin\Advocacy;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\AdvocacyCommonModel1;
use App\Models\AdvocacyCommonModel;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\PartnerSponsorPageTitleModel;

class AdvocacyController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',19)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = AdvocacyCommonModel::where(['page'=>'advocacy','section'=>1])->first();
        $page = "Advocacy";
        $sn = "Section 1";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section2(){
        $section = AdvocacyCommonModel1::where(['page'=>'advocacy','section'=>2])->get();
        $title = PartnerSponsorPageTitleModel::where(['page'=>'advocacy','section'=>2])->first();
        $page = "Advocacy";
        $sn = "Section 2";
        return view('admin.pages.advocacy.common_section1',get_defined_vars());
    }

    public function section3(){
        $section = AdvocacyCommonModel1::where(['page'=>'advocacy','section'=>3])->get();
        $title = PartnerSponsorPageTitleModel::where(['page'=>'advocacy','section'=>3])->first();
        $page = "Advocacy";
        $sn = "Section 3";
        return view('admin.pages.advocacy.common_section1',get_defined_vars());
    }

    public function store(Request $request){
        if($request->page=='advocacy' && $request->section==2){
            $route = "advocacy.section2";
        }elseif($request->page=='advocacy' && $request->section==3){
            $route = "advocacy.section3";
        }elseif($request->page=='women' && $request->section==2){
            $route = "women.section2";
        }elseif($request->page=='veterans' && $request->section==2){
            $route = "veterans.section2";
        }elseif($request->page=='support_services' && $request->section==2){
            $route = "supportser.section2";
        }

        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = null;
        }

        if($request->description){
            $description = $request->description;
        }else{
            $description = null;
        }

        AdvocacyCommonModel1::create([
            'title' => $request->title,
            'image' => $file,
            'description' => $description,
            'page' => $request->page,
            'section' => $request->section,
        ]);

        return redirect()->route($route)->with('success', "Data added successfully.");
    }

    public function edit($id){
        $section = AdvocacyCommonModel1::where('id',$id)->first();
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        $page = ucfirst($section->page);
        $sn = "Section ".$section->section;
        return view('admin.pages.advocacy.edit',get_defined_vars());
    }

    public function updation(Request $request,$id){
        $advocacy = AdvocacyCommonModel::findOrFail($id);
        if ($advocacy == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        if($advocacy->page=='advocacy' && $advocacy->section==1){
            $route = "advocacy.section1";
        }elseif($advocacy->page=='small_business' && $advocacy->section==1){
            $route = "small_business.section1";
        }elseif($advocacy->page=='small_business' && $advocacy->section==2){
            $route = "small_business.section2";
        }elseif($advocacy->page=='small_business' && $advocacy->section==3){
            $route = "small_business.section3";
        }elseif($advocacy->page=='small_business' && $advocacy->section==4){
            $route = "small_business.section4";
        }elseif($advocacy->page=='small_business' && $advocacy->section==5){
            $route = "small_business.section5";
        }elseif($advocacy->page=='women' && $advocacy->section==1){
            $route = "women.section1";
        }elseif($advocacy->page=='women' && $advocacy->section==3){
            $route = "women.section3";
        }elseif($advocacy->page=='women' && $advocacy->section==4){
            $route = "women.section4";
        }elseif($advocacy->page=='women' && $advocacy->section==5){
            $route = "women.section5";
        }elseif($advocacy->page=='women' && $advocacy->section==6){
            $route = "women.section6";
        }elseif($advocacy->page=='veterans' && $advocacy->section==1){
            $route = "veterans.section1";
        }elseif($advocacy->page=='veterans' && $advocacy->section==3){
            $route = "veterans.section3";
        }elseif($advocacy->page=='support_services' && $advocacy->section==1){
            $route = "supportser.section1";
        }elseif($advocacy->page=='support_services' && $advocacy->section==3){
            $route = "supportser.section3";
        }

        if($request->image){
            $path = $advocacy->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $advocacy->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $advocacy->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully.");
    }

    public function update(Request $request,$id){
        $advocacy = AdvocacyCommonModel1::findOrFail($id);
        if ($advocacy == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        if($advocacy->page=='advocacy' && $advocacy->section==2){
            $route = "advocacy.section2";
        }elseif($advocacy->page=='advocacy' && $advocacy->section==3){
            $route = "advocacy.section3";
        }elseif($advocacy->page=='women' && $advocacy->section==2){
            $route = "women.section2";
        }elseif($advocacy->page=='veterans' && $advocacy->section==2){
            $route = "veterans.section2";
        }elseif($advocacy->page=='support_services' && $advocacy->section==2){
            $route = "supportser.section2";
        }

        if($request->image){
            $path = $advocacy->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $advocacy->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $advocacy->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully.");
    }

    public function destroy($id){
        $path = AdvocacyCommonModel1::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        AdvocacyCommonModel1::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }
}