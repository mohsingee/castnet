<?php

namespace App\Http\Controllers\Admin\Small_businesses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvocacyCommonModel;
use App\Models\PageBanner;

class SmallBusinessController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',20)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = AdvocacyCommonModel::where(['page'=>'small_business','section'=>1])->first();
        $page = "Small Business";
        $sn = "Section 1";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section2(){
        $section = AdvocacyCommonModel::where(['page'=>'small_business','section'=>2])->first();
        $page = "Small Business";
        $sn = "Section 2";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section3(){
        $section = AdvocacyCommonModel::where(['page'=>'small_business','section'=>3])->first();
        $page = "Small Business";
        $sn = "Section 3";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section4(){
        $section = AdvocacyCommonModel::where(['page'=>'small_business','section'=>4])->first();
        $page = "Small Business";
        $sn = "Section 4";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section5(){
        $section = AdvocacyCommonModel::where(['page'=>'small_business','section'=>5])->first();
        $page = "Small Business";
        $sn = "Section 5";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }
}
