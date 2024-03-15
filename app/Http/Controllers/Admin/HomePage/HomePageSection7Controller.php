<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection7;
class HomePageSection7Controller extends Controller
{
    public function index(){
        $section7 = HomeSection7::first();
        return view('admin.pages.home_page.section7.index', compact('section7'));
    }

    public function update(Request $request,$id){
        $section7 = HomeSection7::findOrFail($id);
        if ($section7 == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        if($request->image){
            $file = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $section7->image;
        }
        
        $data = [
            'title' => $request->title,
            'heading' => $request->heading,
            'image' => $file,
            'description' => $request->description,
        ];
        $section7->update($data);
        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
