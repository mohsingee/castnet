<?php

namespace App\Http\Controllers\Admin\Outreach;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\OutreachCommonSectionModel;
use App\Models\PageBanner;
class OutreachController extends Controller
{
    public function section1(){
        $section = OutreachCommonSectionModel::where(['section'=>1,'page'=>'outreach'])->first();
        $page = "Outreach";
        $sn = "Section 1";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }

    public function section2(){
        $section = OutreachCommonSectionModel::where(['section'=>2,'page'=>'outreach'])->first();
        $page = "Outreach";
        $sn = "Section 2";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }

    public function section3(){
        $section = OutreachCommonSectionModel::where(['section'=>3,'page'=>'outreach'])->first();
        $page = "Outreach";
        $sn = "Section 3";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }
    
    public function banner(){
        $banner = PageBanner::where('type',35)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function update(Request $request,$id){
        $outreach = OutreachCommonSectionModel::findOrFail($id);
        if ($outreach == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        if($outreach->page=='outreach' && $outreach->section==1){
            $route = "outreach.section1";
        }elseif($outreach->page=='outreach' && $outreach->section==2){
            $route = "outreach.section2";
        }elseif($outreach->page=='outreach' && $outreach->section==3){
            $route = "outreach.section3";
        }elseif($outreach->page=='chad' && $outreach->section==1){
            $route = "chad.section1";
        }elseif($outreach->page=='chad' && $outreach->section==2){
            $route = "chad.section2";
        }elseif($outreach->page=='ghana' && $outreach->section==1){
            $route = "ghana.section1";
        }elseif($outreach->page=='ghana' && $outreach->section==2){
            $route = "ghana.section2";
        }elseif($outreach->page=='drc' && $outreach->section==1){
            $route = "drc.section1";
        }elseif($outreach->page=='drc' && $outreach->section==2){
            $route = "drc.section2";
        }elseif($outreach->page=='cameroon' && $outreach->section==1){
            $route = "cameroon.section1";
        }elseif($outreach->page=='cameroon' && $outreach->section==2){
            $route = "cameroon.section2";
        }elseif($outreach->page=='usa' && $outreach->section==1){
            $route = "usa.section1";
        }elseif($outreach->page=='usa' && $outreach->section==2){
            $route = "usa.section2";
        }elseif($outreach->page=='zimbabwe' && $outreach->section==1){
            $route = "zimbabwe.section1";
        }elseif($outreach->page=='zimbabwe' && $outreach->section==2){
            $route = "zimbabwe.section2";
        }elseif($outreach->page=='cotedivoire' && $outreach->section==1){
            $route = "cotedivoire.section1";
        }elseif($outreach->page=='cotedivoire' && $outreach->section==2){
            $route = "cotedivoire.section2";
        }elseif($outreach->page=='southafrica' && $outreach->section==1){
            $route = "southafrica.section1";
        }elseif($outreach->page=='southafrica' && $outreach->section==2){
            $route = "southafrica.section2";
        }elseif($outreach->page=='india' && $outreach->section==1){
            $route = "india.section1";
        }elseif($outreach->page=='india' && $outreach->section==2){
            $route = "india.section2";
        }elseif($outreach->page=='south_america' && $outreach->section==1){
            $route = "south_america.section1";
        }elseif($outreach->page=='south_america' && $outreach->section==2){
            $route = "south_america.section2";
        }elseif($outreach->page=='uganda' && $outreach->section==1){
            $route = "uganda.section1";
        }elseif($outreach->page=='uganda' && $outreach->section==2){
            $route = "uganda.section2";
        }
        if($request->image){
            $path = $outreach->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }

            $file = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $outreach->image;
        }
        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $outreach->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully.");
    }
}
