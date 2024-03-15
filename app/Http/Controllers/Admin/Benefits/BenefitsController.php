<?php

namespace App\Http\Controllers\Admin\Benefits;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\BenefitsModel;
use App\Models\BenefitsDetailModel;
use App\Models\PageBanner;
class BenefitsController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',7)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = BenefitsModel::where('type',1)->with('details')->first();
        $page = "Benefits";
        $sn = "Section 1";
        return view('admin.pages.benefits.index',get_defined_vars());
    }

    public function section2(){
        $section = BenefitsModel::where('type',2)->with('details')->first();
        $page = "Benefits";
        $sn = "Section 2";
        return view('admin.pages.benefits.index',get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $section = BenefitsModel::where('id',$request->id)->first();
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for creating.');
        }
        $file = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/web/images'), $file);

        BenefitsDetailModel::create([
            'benefit_id' => $section->id,
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
            'type' => $section->type,
        ]);
        if($section->type==1){
            $route = "benefits.section1";
        }else{
            $route = "benefits.section2";
        }
        return redirect()->route($route)->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = BenefitsModel::where('id',$id)->first();
        if($section->type==1){
            $sn = "Section 1";
        }else{
            $sn = "Section 2";
        }
        return view('admin.pages.benefits.create',compact('section','sn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = BenefitsDetailModel::findOrFail($id);
        if($section->type==1){
            $sn = "Section 1";
        }else{
            $sn = "Section 2";
        }
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        return view('admin.pages.benefits.edit',compact('section','sn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section = BenefitsDetailModel::findOrFail($id);
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for creating.');
        }
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $section->image;
        }
        $section->update([
            'image' => $file,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $section->type,
        ]);
        if($section->type==1){
            $route = "benefits.section1";
        }else{
            $route = "benefits.section2";
        }
        return redirect()->route($route)->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = BenefitsDetailModel::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        BenefitsDetailModel::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request, $id){
        $section = BenefitsModel::findOrFail($id);
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for creating.');
        }
        $section->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $section->type,
        ]);
        if($section->type==1){
            $route = "benefits.section1";
        }else{
            $route = "benefits.section2";
        }
        return redirect()->route($route)->with('success', 'Data updated successfully.');
    }
}
