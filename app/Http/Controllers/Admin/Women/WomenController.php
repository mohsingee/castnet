<?php

namespace App\Http\Controllers\Admin\Women;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvocacyCommonModel1;
use App\Models\AdvocacyCommonModel;
use App\Models\PageBanner;

class WomenController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',21)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = AdvocacyCommonModel::where(['page'=>'women','section'=>1])->first();
        $page = "Women Advocacy";
        $sn = "Section 1";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section2(){
        $section = AdvocacyCommonModel1::where(['page'=>'women','section'=>2])->get();
        $page = "Women Advocacy";
        $sn = "Section 2";
        return view('admin.pages.advocacy.common_section1',get_defined_vars());
    }

    public function section3(){
        $section = AdvocacyCommonModel::where(['page'=>'women','section'=>3])->first();
        $page = "Women Advocacy";
        $sn = "Section 3";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section4(){
        $section = AdvocacyCommonModel::where(['page'=>'women','section'=>4])->first();
        $page = "Women Advocacy";
        $sn = "Section 4";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section5(){
        $section = AdvocacyCommonModel::where(['page'=>'women','section'=>5])->first();
        $page = "Women Advocacy";
        $sn = "Section 5";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section6(){
        $section = AdvocacyCommonModel::where(['page'=>'women','section'=>6])->first();
        $page = "Women Advocacy";
        $sn = "Section 6";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }
}
