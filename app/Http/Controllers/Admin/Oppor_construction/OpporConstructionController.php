<?php

namespace App\Http\Controllers\Admin\Oppor_construction;

use App\Http\Controllers\Controller;
use App\Models\OpportunitiesModel;
use Illuminate\Http\Request;
use App\Models\PageBanner;

class OpporConstructionController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',46)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = OpportunitiesModel::where(['section'=>1,'page'=>'cons'])->first();
        $page = "Construction";
        $sn = "Section 1";
        return view('admin.pages.oppotunities.index',get_defined_vars());
    }

    public function section2(){
        $section = OpportunitiesModel::where(['page'=>'cons','section'=>2])->first();
        $page = "Construction";
        $sn = "Section 2";
        return view('admin.pages.oppotunities.index',get_defined_vars());
    }
}
