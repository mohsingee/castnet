<?php

namespace App\Http\Controllers\Admin\Oppor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\OpportunitiesModel;
use Illuminate\Http\Request;
use App\Models\PageBanner;

class OpporController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',44)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = OpportunitiesModel::where(['section'=>1,'page'=>'oppor'])->first();
        $page = "Opportunities";
        $sn = "Section 1";
        return view('admin.pages.oppotunities.index',get_defined_vars());
    }

    public function section2(){
        $section = OpportunitiesModel::where(['page'=>'oppor','section'=>2])->first();
        $page = "Opportunities";
        $sn = "Section 2";
        return view('admin.pages.oppotunities.index',get_defined_vars());
    }

    public function update(Request $request, $id){
        $oppor = OpportunitiesModel::findOrFail($id);
        if ($oppor == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        if($oppor->section==1 && $oppor->page=='oppor'){
            $route = "opportunities.section1";
        }elseif($oppor->section==2 && $oppor->page=='oppor'){
            $route = "opportunities.section2";
        }elseif($oppor->section==1 && $oppor->page=='cons'){
            $route = "opporcons.section1";
        }elseif($oppor->section==2 && $oppor->page=='cons'){
            $route = "opporcons.section2";
        }elseif($oppor->section==1 && $oppor->page=='agri'){
            $route = "opporagr.section1";
        }elseif($oppor->section==2 && $oppor->page=='agri'){
            $route = "opporagr.section2";
        }elseif($oppor->section==1 && $oppor->page=='mining'){
            $route = "oppormining.section1";
        }elseif($oppor->section==2 && $oppor->page=='mining'){
            $route = "oppormining.section2";
        }elseif($oppor->section==1 && $oppor->page=='rfx'){
            $route = "opporrfx.section1";
        }elseif($oppor->section==2 && $oppor->page=='rfx'){
            $route = "opporrfx.section2";
        }

        if($request->image){
            $path = $oppor->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $oppor->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $oppor->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully.");
    }
}
