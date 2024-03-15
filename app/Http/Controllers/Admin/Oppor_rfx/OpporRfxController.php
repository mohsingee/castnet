<?php

namespace App\Http\Controllers\Admin\Oppor_rfx;

use App\Http\Controllers\Controller;
use App\Models\OpportunitiesModel;
use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\PageBanner;

class OpporRfxController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',48)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = OpportunitiesModel::where(['section'=>1,'page'=>'rfx'])->first();
        $page = "Rfx";
        $sn = "Section 1";
        return view('admin.pages.oppotunities.index',get_defined_vars());
    }

    public function section2(){
        $section = OpportunitiesModel::where(['page'=>'rfx','section'=>2])->first();
        $page = "Rfx";
        $sn = "Section 2";
        return view('admin.pages.oppotunities.index',get_defined_vars());
    }

    public function section3(){
        $section = ProjectModel::where('page','rfx')->first();
        return view('admin.pages.oppotunities.section3',get_defined_vars());
    }

    public function update(Request $request,$id){
        ProjectModel::where(['id'=>$id])->update([
            'title' => $request->title,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'page' => 'rfx',
        ]);
        return redirect()->route('opporrfx.section3')->with('success', "Data Updated Successfully.");
    }
}
