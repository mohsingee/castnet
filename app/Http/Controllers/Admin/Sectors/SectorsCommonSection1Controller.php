<?php

namespace App\Http\Controllers\Admin\Sectors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectorCommonSection1;
use App\Models\PageBanner;
class SectorsCommonSection1Controller extends Controller
{
    public function construction(){
        $section1 = SectorCommonSection1::where('type',1)->first();
        $page = "Construction";
        $sn = "Section 1";
        return view('admin.pages.sectors_common_section1.index',get_defined_vars());
    }

    public function construction_banner(){
        $banner = PageBanner::where('type',12)->first();
        $page = "Construction Banner";
        return view('admin.pages.banner',get_defined_vars());
    }

    public function agriculture(){
        $section1 = SectorCommonSection1::where('type',2)->first();
        $page = "Agriculture";
        $sn = "Section 1";
        return view('admin.pages.sectors_common_section1.index',get_defined_vars());
    }

    public function agriculture_banner(){
        $banner = PageBanner::where('type',13)->first();
        $page = "Agriculture Banner";
        return view('admin.pages.banner',get_defined_vars());
    }

    public function supply(){
        $section1 = SectorCommonSection1::where('type',3)->first();
        $page = "Supply Chain";
        $sn = "Section 1";
        return view('admin.pages.sectors_common_section1.index',get_defined_vars());
    }

    public function supply_banner(){
        $banner = PageBanner::where('type',14)->first();
        $page = "Supply Chain Banner";
        return view('admin.pages.banner',get_defined_vars());
    }

    public function technology(){
        $section1 = SectorCommonSection1::where('type',4)->first();
        $page = "Technology";
        $sn = "Section 1";
        return view('admin.pages.sectors_common_section1.index',get_defined_vars());
    }

    public function technology_banner(){
        $banner = PageBanner::where('type',15)->first();
        $page = "Technology Banner";
        return view('admin.pages.banner',get_defined_vars());
    }

    public function natural(){
        $section1 = SectorCommonSection1::where('type',5)->first();
        $page = "Natural Resources";
        $sn = "Section 1";
        return view('admin.pages.sectors_common_section1.index',get_defined_vars());
    }

    public function natural_banner(){
        $banner = PageBanner::where('type',16)->first();
        $page = "Natural Resources";
        return view('admin.pages.banner',get_defined_vars());
    }

    public function energy(){
        $section1 = SectorCommonSection1::where('type',6)->first();
        $page = "Energy";
        $sn = "Section 1";
        return view('admin.pages.sectors_common_section1.index',get_defined_vars());
    }

    public function energy_banner(){
        $banner = PageBanner::where('type',17)->first();
        $page = "Energy";
        return view('admin.pages.banner',get_defined_vars());
    }

    public function textiles(){
        $section1 = SectorCommonSection1::where('type',7)->first();
        $page = "Textiles";
        $sn = "Section 1";
        return view('admin.pages.sectors_common_section1.index',get_defined_vars());
    }

    public function textiles_banner(){
        $banner = PageBanner::where('type',18)->first();
        $page = "Textiles";
        return view('admin.pages.banner',get_defined_vars());
    }

    public function update(Request $request,$id){
        $section1 = SectorCommonSection1::findOrFail($id);
        if ($section1 == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        if($section1->type==1){
            $route = "sector-c1cons.section1";
        }
        elseif($section1->type==2){
            $route = "sector-c1agr.section1";
        }
        elseif($section1->type==3){
            $route = "sector-c1sc.section1";
        }
        elseif($section1->type==4){
            $route = "sector-c1tec.section1";
        }
        elseif($section1->type==5){
            $route = "sector-c1nat.section1";
        }
        elseif($section1->type==6){
            $route = "sector-c1energy.section1";
        }
        else{
            $route = "sector-c1text.section1";
        }
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $section1->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $section1->update($data);
        return redirect()->route($route)->with('success', 'Data updated successfully.');
    }
}