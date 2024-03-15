<?php

namespace App\Http\Controllers\Admin\Careers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\CareersCommonModel1;
use Illuminate\Http\Request;
use App\Models\CareersModel;
use App\Models\PageBanner;

class CareersController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',49)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = CareersModel::where(['page'=>'careers','section'=>1])->first();
        $page = "Careers";
        $sn = "Section 1";
        return view('admin.pages.careers.common_section',get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $section = CareersCommonModel1::get();
        $page = "Careers";
        $sn = "Section 2";
        return view('admin.pages.careers.index',get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = null;
        }

        if($request->description){
            $description = $request->description;
        }else{
            $description = null;
        }

        CareersCommonModel1::create([
            'title' => $request->title,
            'image' => $file,
            'description' => $description,
        ]);

        return redirect()->route('careers.index')->with('success', "Data added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = CareersCommonModel1::where('id',$id)->first();
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        $page = ucfirst($section->page);
        $sn = "Section ".$section->section;
        return view('admin.pages.careers.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $advocacy = CareersCommonModel1::findOrFail($id);
        if ($advocacy == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }

        if($request->image){
            $path = $advocacy->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $advocacy->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $advocacy->update($data);

        return redirect()->route('careers.index')->with('success', "Data Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = CareersCommonModel1::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        CareersCommonModel1::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request,$id){

        $careers = CareersModel::findOrFail($id);
        if ($careers == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }

        if($request->image){
            $path = $careers->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $careers->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $careers->update($data);

        return redirect()->route('careers.section1')->with('success', "Data Updated Successfully.");
    }
}
