<?php

namespace App\Http\Controllers\Admin\Usa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OutreachCommonSectionModel;
use App\Models\PageBanner;
class UsaController extends Controller
{
    public function section1(){
        $section = OutreachCommonSectionModel::where(['section'=>1,'page'=>'usa'])->first();
        $page = "USA";
        $sn = "Section 1";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }

    public function section2(){
        $section = OutreachCommonSectionModel::where(['section'=>2,'page'=>'usa'])->first();
        $page = "USA";
        $sn = "Section 2";
        return view('admin.pages.outreach.common_section',get_defined_vars());
    }
    
    public function banner(){
        $banner = PageBanner::where('type',43)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
