<?php

namespace App\Http\Controllers\Admin\Privacy;

use App\Http\Controllers\Controller;
use App\Models\LegalDocument;
use App\Models\PageBanner;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index(){
        $banner = PageBanner::where('type',56)->first();
        return view('admin.pages.banner',compact('banner'));
    }
    public function section1(){
        $section = LegalDocument::where('page', 'privacy policy')
    ->where('section', 'section1')
    ->value('text');
        $sectionType= "section1";
        $title = "Privacy & Policy Section 1";
        return view('admin.pages.privacy_policy.index', compact('title','section','sectionType'));
    }
    public function section1Update(Request $request){
    $requestData = $request->all();
    
    LegalDocument::where('section', $requestData['sectiontype'])
                ->where('page', 'privacy policy')
                ->update(['text' => $requestData['description']]);

                return redirect()->back()->with('success', 'Record updated successfully');
    }
    public function section2(){
        $section = LegalDocument::where('page', 'privacy policy')
        ->where('section', 'section2')
        ->value('text');
        $sectionType= "section2";
        $sectionType= "section2";
        $title = "Privacy & Policy Section 2";
        return view('admin.pages.privacy_policy.index', compact('title','section','sectionType'));
    }
}
