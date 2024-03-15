<?php

namespace App\Http\Controllers\Admin\South_america;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\OutreachCommonSectionModel;
class SouthAmericaController extends Controller
{
    public function section1(){
        $section = OutreachCommonSectionModel::where(['section'=>1,'page'=>'south_america'])->first();
        $page = "SOUTH AMERICA";
        $sn = "Section 1";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }

    public function section2(){
        $section = OutreachCommonSectionModel::where(['section'=>2,'page'=>'south_america'])->first();
        $page = "SOUTH AMERICA";
        $sn = "Section 2";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }
    
    public function banner(){
        $banner = PageBanner::where('type',52)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
