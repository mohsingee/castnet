<?php

namespace App\Http\Controllers\Admin\Uganda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\OutreachCommonSectionModel;
class UgandaController extends Controller
{
    public function section1(){
        $section = OutreachCommonSectionModel::where(['section'=>1,'page'=>'uganda'])->first();
        $page = "UGANDA";
        $sn = "Section 1";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }

    public function section2(){
        $section = OutreachCommonSectionModel::where(['section'=>2,'page'=>'uganda'])->first();
        $page = "UGANDA";
        $sn = "Section 2";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }
    
    public function banner(){
        $banner = PageBanner::where('type',53)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
