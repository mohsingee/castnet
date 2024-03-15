<?php

namespace App\Http\Controllers\Admin\Partners_sponsors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartnerSponsorPageTitleModel;
use App\Models\PartnerCommonSection1;
use App\Models\PartnerCommonSection2;
use App\Models\PageBanner;

class BecomeSponsorController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',34)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = PartnerCommonSection1::where(['section'=>1,'page'=>'become_sponsor'])->first();
        $page = "Become A Sponsor";
        $sn = "Section 1";
        return view('admin.pages.partners_sponsors.become.common_section',get_defined_vars());
    }

    public function section2(){
        $title = PartnerSponsorPageTitleModel::where(['page'=>'become_sponsor','section'=>2])->first();
        $section = PartnerCommonSection2::where(['section'=>2,'page'=>'become_sponsor'])->get();
        $page = "Become A Sponsor";
        $sn = "Section 2";
        return view('admin.pages.partners_sponsors.become.common_section1',get_defined_vars());
    }
}
