<?php

namespace App\Http\Controllers\Admin\Who_we_are;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;
use App\Models\PageBanner;
class WhoWeArePageController extends Controller
{
    public function index(){
        $banner = PageBanner::where('type',2)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = AboutPage::where('section',4)->first();
        $section['who_section'] = 1;
        return view('admin.pages.who_we_are.index', compact('section'));
    }

    public function section2(){
        $section = AboutPage::where('section',5)->first();
        $section['who_section'] = 2;
        return view('admin.pages.who_we_are.index', compact('section'));
    }

    public function update(Request $request,$id){
        $about = AboutPage::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $about->image;
        }
        $data = [
            'image' => $file,
            'description' => $request->description,
            'section' => $about->section,
        ];
        $about->update($data);

        return redirect()->back()->with('success', "Data Updated Successfully");
    }
}
