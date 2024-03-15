<?php

namespace App\Http\Controllers\Admin\Grants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\FinancialCommonModel1;
use App\Models\FinancialCommonModel;

class GrantsController extends Controller
{
    // GRANTS
    public function banner(){
        $banner = PageBanner::where('type',30)->first();
        return view('admin.pages.banner',compact('banner'));
    }
    public function section2(){
        $section = FinancialCommonModel1::where(['page'=>'grants','section'=>2])->get();
        $page = "Grants";
        $sn = "Section 2";
        return view('admin.pages.financial.common_section1',get_defined_vars());
    }
    // GRANTS
    public function section1(){
        $section = FinancialCommonModel::where(['page'=>'grants','section'=>1])->first();
        $page = "Grants";
        $sn = "Section 1";
        return view('admin.pages.financial.common_section',get_defined_vars());
    }
}
