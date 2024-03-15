<?php

namespace App\Http\Controllers\Admin\HomePage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection3;
class HomePageSection3Controller extends Controller
{
    public function index(){
        $section3 = HomeSection3::first();
        return view('admin.pages.home_page.section3.index', compact('section3'));
    }

    public function update(Request $request,$id){
        $section3 = HomeSection3::findOrFail($id);
        if ($section3 == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }

        $data = [
            'title' => $request->title,
            'heading' => $request->heading,
            'subtitle1' => $request->subtitle1,
            'description1' => $request->description1,
            'subtitle2' => $request->subtitle2,
            'description2' => $request->description2,
            'subtitle3' => $request->subtitle3,
            'description3' => $request->description3,
        ];
        $section3->update($data);
        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
