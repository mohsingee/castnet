<?php

namespace App\Http\Controllers\Admin\India;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\OutreachCommonSectionModel;
class IndiaController extends Controller
{
    public function section1(){
        $section = OutreachCommonSectionModel::where(['section'=>1,'page'=>'india'])->first();
        $page = "INDIA";
        $sn = "Section 1";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }

    public function section2(){
        $section = OutreachCommonSectionModel::where(['section'=>2,'page'=>'india'])->first();
        $page = "INDIA";
        $sn = "Section 2";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }
    
    public function banner(){
        $banner = PageBanner::where('type',51)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
