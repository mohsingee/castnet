<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class HomePageBannerController extends Controller
{
    public function index(){
        $banner = Banner::first();
        return view('admin.pages.home_page.banner.index', compact('banner'));
    }

    public function update(Request $request,$id){
        $banner = Banner::findOrFail($id);
        if ($banner == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        if($request->banner){
            $file = time().'.'.$request->banner->extension();  
            $request->banner->move(public_path('assets/web/images'), $file);
        }else{
            $file = $banner->banner;
        }
        
        $data = [
            'heading' => $request->heading,
            'short_heading' => $request->short_heading,
            'banner' => $file,
            'button1' => $request->button1,
            'button1link' => $request->button1link,
            'button2' => $request->button2,
            'button2link' => $request->button2link,
            'description' => $request->description,
        ];
        $banner->update($data);
        return redirect()->back()->with('success', 'Home page banner updated successfully.');
    }
}
