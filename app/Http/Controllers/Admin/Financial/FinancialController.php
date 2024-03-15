<?php

namespace App\Http\Controllers\Admin\Financial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\FinancialCommonModel1;
use App\Models\FinancialCommonModel;
use Illuminate\Support\Facades\File;

class FinancialController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',29)->first();
        return view('admin.pages.banner',compact('banner'));
    }
    public function section1(){
        $section = FinancialCommonModel1::where(['page'=>'financial','section'=>1])->get();
        $page = "Financial";
        $sn = "Section 1";
        return view('admin.pages.financial.common_section1',get_defined_vars());
    }
    public function section2(){
        $section = FinancialCommonModel::where(['page'=>'financial','section'=>2])->first();
        $page = "Financial";
        $sn = "Section 2";
        return view('admin.pages.financial.common_section',get_defined_vars());
    }
    public function section3(){
        $section = FinancialCommonModel1::where(['page'=>'financial','section'=>3])->get();
        $page = "Financial";
        $sn = "Section 3";
        return view('admin.pages.financial.common_section1',get_defined_vars());
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
    public function store(Request $request){
        if($request->page=='financial' && $request->section==1){
            $route = "financial.section1";
        }
        if($request->page=='financial' && $request->section==3){
            $route = "financial.section3";
        }
        elseif($request->page=='grants' && $request->section==2){
            $route = "grants.section2";
        }
        elseif($request->page=='funding' && $request->section==2){
            $route = "funding.section2";
        }elseif($request->page=='women' && $request->section==2){
            $route = "women.section2";
        }elseif($request->page=='veterans' && $request->section==2){
            $route = "veterans.section2";
        }elseif($request->page=='support_services' && $request->section==2){
            $route = "supportser.section2";
        }

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

        FinancialCommonModel1::create([
            'title' => $request->title,
            'image' => $file,
            'description' => $description,
            'page' => $request->page,
            'section' => $request->section,
        ]);

        return redirect()->route($route)->with('success', "Data added successfully.");
    }

    public function updation(Request $request,$id){

        $financial = FinancialCommonModel::findOrFail($id);
        if ($financial == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        if($financial->page=='financial' && $financial->section==2){
            $route = "financial.section2";
        }elseif($financial->page=='grants' && $financial->section==1){
            $route = "grants.section1";
        }elseif($financial->page=='funding' && $financial->section==1){
            $route = "funding.section1";
        }elseif($financial->page=='small_business' && $financial->section==3){
            $route = "small_business.section3";
        }elseif($financial->page=='small_business' && $financial->section==4){
            $route = "small_business.section4";
        }elseif($financial->page=='small_business' && $financial->section==5){
            $route = "small_business.section5";
        }elseif($financial->page=='women' && $financial->section==1){
            $route = "women.section1";
        }elseif($financial->page=='women' && $financial->section==3){
            $route = "women.section3";
        }elseif($financial->page=='women' && $financial->section==4){
            $route = "women.section4";
        }elseif($financial->page=='women' && $financial->section==5){
            $route = "women.section5";
        }elseif($financial->page=='women' && $financial->section==6){
            $route = "women.section6";
        }elseif($financial->page=='veterans' && $financial->section==1){
            $route = "veterans.section1";
        }elseif($financial->page=='veterans' && $financial->section==3){
            $route = "veterans.section3";
        }elseif($financial->page=='support_services' && $financial->section==1){
            $route = "supportser.section1";
        }elseif($financial->page=='support_services' && $financial->section==3){
            $route = "supportser.section3";
        }

        if($request->image){
            $path = $financial->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $financial->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $financial->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully.");
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
    public function edit($id){
        $section = FinancialCommonModel1::where('id',$id)->first();
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        $page = ucfirst($section->page);
        $sn = "Section ".$section->section;
        return view('admin.pages.financial.edit',get_defined_vars());
    }
    // admin.pages.financial.common_section1

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request,$id){
        // dd($id);
        $financial = FinancialCommonModel1::findOrFail($id);
        if ($financial == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        if($financial->page=='financial' && $financial->section==1){
            $route = "financial.section1";
        }elseif($financial->page=='financial' && $financial->section==3){
            $route = "financial.section3";
        }elseif($financial->page=='grants' && $financial->section==2){
            $route = "grants.section2";
        }elseif($financial->page=='funding' && $financial->section==2){
            $route = "funding.section2";
        }elseif($financial->page=='veterans' && $financial->section==2){
            $route = "veterans.section2";
        }elseif($financial->page=='support_services' && $financial->section==2){
            $route = "supportser.section2";
        }

        if($request->image){
            $path = $financial->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $financial->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $financial->update($data);

        return redirect()->route($route)->with('success', "Data Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $path = FinancialCommonModel1::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        FinancialCommonModel1::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }
}
