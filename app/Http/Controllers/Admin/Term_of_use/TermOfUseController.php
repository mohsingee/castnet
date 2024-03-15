<?php

namespace App\Http\Controllers\Admin\Term_of_use;

use App\Http\Controllers\Controller;
use App\Models\LegalDocument;
use App\Models\PageBanner;
use Illuminate\Http\Request;

class TermOfUseController extends Controller
{
    public function index(){
        $banner = PageBanner::where('type',57)->first();
        return view('admin.pages.banner',compact('banner'));
    }
    public function section1(){
        $section = LegalDocument::where('page', 'term of use')
        ->where('section', 'section1')
        ->value('text');
        $sectionType= "section1";
        $title = "Term Of Use Section 1";
        return view('admin.pages.term_of_use.index', compact('title','section','sectionType'));
    }
    public function sectionUpdate(Request $request){
        $requestData = $request->all();
    
        LegalDocument::where('section', $requestData['sectiontype'])
                    ->where('page', 'term of use')
                    ->update(['text' => $requestData['description']]);
    
                    return redirect()->back()->with('success', 'Record updated successfully');
    }
    public function section2(){
        $section = LegalDocument::where('page', 'term of use')
        ->where('section', 'section2')
        ->value('text');
        $sectionType= "section2";
        $title = "Term Of Use Section 2";
        return view('admin.pages.term_of_use.index', compact('title','section','sectionType'));
    }
}
