<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection2;
class HomePageSection2Controller extends Controller
{
    public function index(){
        $section2 = HomeSection2::first();
        return view('admin.pages.home_page.section2.index', compact('section2'));
    }

    public function update(Request $request,$id){
        $section2 = HomeSection2::findOrFail($id);
        if ($section2 == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $section2->image;
        }

        $data = [
            'heading' => $request->heading,
            'image' => $file,
            'button' => $request->button,
            'buttonlink' => $request->buttonlink,
            'description' => $request->description,
        ];
        $section2->update($data);
        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
