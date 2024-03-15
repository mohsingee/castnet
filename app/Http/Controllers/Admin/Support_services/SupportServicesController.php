<?php

namespace App\Http\Controllers\Admin\Support_services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvocacyCommonModel1;
use App\Models\AdvocacyCommonModel;
use App\Models\PageBanner;

class SupportServicesController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',23)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = AdvocacyCommonModel::where(['page'=>'support_services','section'=>1])->first();
        $page = "Support Services";
        $sn = "Section 1";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }

    public function section2(){
        $section = AdvocacyCommonModel1::where(['page'=>'support_services','section'=>2])->get();
        $page = "Support Services";
        $sn = "Section 2";
        return view('admin.pages.advocacy.common_section1',get_defined_vars());
    }

    public function section3(){
        $section = AdvocacyCommonModel::where(['page'=>'support_services','section'=>3])->first();
        $page = "Support Services";
        $sn = "Section 3";
        return view('admin.pages.advocacy.common_section',get_defined_vars());
    }
}
