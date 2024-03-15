<?php

namespace App\Http\Controllers\Admin\AboutPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\AboutPage;
class AboutPageController extends Controller
{
    public function index(){
        $banner = PageBanner::where('type',1)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = AboutPage::where('section',1)->first();
        $title = "About Us Section 1";
        return view('admin.pages.about_page.index', compact('section','title'));
    }

    public function section2(){
        $section = AboutPage::where('section',2)->first();
        $title = "About Us Section 2";
        return view('admin.pages.about_page.index', compact('section','title'));
    }

    public function section3(){
        $section = AboutPage::where('section',3)->first();
        $title = "About Us Section 3";
        return view('admin.pages.about_page.index', compact('section','title'));
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
