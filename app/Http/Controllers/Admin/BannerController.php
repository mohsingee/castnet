<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;
class BannerController extends Controller
{
    public function update(Request $request,$id){
        $banner = PageBanner::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $banner->image;
        }
        PageBanner::where('id',$banner->id)->update([
            'image' => $file,
            'title' => $request->title,
            'type' => $banner->type,
        ]);

        return redirect()->back()->with('success', 'Data updated successfully!');
    }
}
