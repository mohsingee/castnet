<?php

namespace App\Http\Controllers\Admin\Evaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipCommonModel;
use App\Models\PageBanner;

class EvaluationController extends Controller
{
    public function section1(){
        $section = MembershipCommonModel::where(['section'=>1,'page'=>'evaluation'])->first();
        $page = "Evaluation";
        $sn = "Section 1";
        return view('admin.pages.membership.common_section',get_defined_vars());
    }

    public function section3(){
        $section = MembershipCommonModel::where(['section'=>3,'page'=>'evaluation'])->first();
        $page = "Evaluation";
        $sn = "Section 3";
        return view('admin.pages.membership.common_section',get_defined_vars());
    }

    public function section4(){
        $section = MembershipCommonModel::where(['section'=>4,'page'=>'evaluation'])->first();
        $page = "Evaluation";
        $sn = "Section 4";
        return view('admin.pages.membership.common_section',get_defined_vars());
    }

    public function banner(){
        $banner = PageBanner::where('type',9)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
