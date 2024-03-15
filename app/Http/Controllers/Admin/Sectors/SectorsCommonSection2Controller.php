<?php

namespace App\Http\Controllers\Admin\Sectors;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\SectorCommonSection2;
use App\Models\SectorCommonSection2Details;

class SectorsCommonSection2Controller extends Controller
{
    public function construction(){
        $section2 = SectorCommonSection2::where('type',1)->with('details')->first();
        $page = "Construction";
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.index',get_defined_vars());
    }

    public function agriculture(){
        $section2 = SectorCommonSection2::where('type',2)->with('details')->first();
        $page = "Agriculture";
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.index',get_defined_vars());
    }

    public function supply(){
        $section2 = SectorCommonSection2::where('type',3)->with('details')->first();
        $page = "Supply Chain";
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.index',get_defined_vars());
    }

    public function technology(){
        $section2 = SectorCommonSection2::where('type',4)->with('details')->first();
        $page = "Technology";
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.index',get_defined_vars());
    }

    public function natural(){
        $section2 = SectorCommonSection2::where('type',5)->with('details')->first();
        $page = "Natural Resources";
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.index',get_defined_vars());
    }

    public function energy(){
        $section2 = SectorCommonSection2::where('type',6)->with('details')->first();
        $page = "Energy";
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.index',get_defined_vars());
    }

    public function textiles(){
        $section2 = SectorCommonSection2::where('type',7)->with('details')->first();
        $page = "Textiles";
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.index',get_defined_vars());
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
        $section2 = SectorCommonSection2::where('id',$request->id)->first();
        if ($section2 == null) {
            return redirect()->back()->with('error', 'No records were found for creating.');
        }
        if($section2->type==1){
            $route = "sector-c2cons.section2";
        }elseif($section2->type==2){
            $route = "sector-c2agr.section2";
        }elseif($section2->type==3){
            $route = "sector-c2sc.section2";
        }elseif($section2->type==4){
            $route = "sector-c2tec.section2";
        }elseif($section2->type==5){
            $route = "sector-c2nat.section2";
        }elseif($section2->type==6){
            $route = "sector-c2energy.section2";
        }else{
            $route = "sector-c2text.section2";
        }
        $file = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/web/images'), $file);

        SectorCommonSection2Details::create([
            'sector_id' => $section2->id,
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
            'type' => $section2->type,
        ]);
        return redirect()->route($route)->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section2 = SectorCommonSection2::where('id',$id)->first();
        if($section2->type==1){
            $page = "Construction";
        }elseif($section2->type==2){
            $page = "Agriculture";
        }elseif($section2->type==3){
            $page = "Supply Chain";
        }elseif($section2->type==4){
            $page = "Technology";
        }elseif($section2->type==5){
            $page = "Natural Resources";
        }elseif($section2->type==6){
            $page = "Energy";
        }else{
            $page = "Textiles";
        }
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.create',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section2 = SectorCommonSection2Details::where('id',$id)->first();
        if($section2->type==1){
            $page = "Construction";
        }elseif($section2->type==2){
            $page = "Agriculture";
        }elseif($section2->type==3){
            $page = "Supply Chain";
        }elseif($section2->type==4){
            $page = "Technology";
        }elseif($section2->type==5){
            $page = "Natural Resources";
        }elseif($section2->type==6){
            $page = "Energy";
        }else{
            $page = "Textiles";
        }
        $sn = "Section 2";
        return view('admin.pages.sectors_common_section2.edit',get_defined_vars());
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
        $section2 = SectorCommonSection2Details::findOrFail($id);
        if ($section2 == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        if($section2->type==1){
            $route = "sector-c2cons.section2";
        }elseif($section2->type==2){
            $route = "sector-c2agr.section2";
        }elseif($section2->type==3){
            $route = "sector-c2sc.section2";
        }elseif($section2->type==4){
            $route = "sector-c2tec.section2";
        }elseif($section2->type==5){
            $route = "sector-c2nat.section2";
        }elseif($section2->type==6){
            $route = "sector-c2energy.section2";
        }else{
            $route = "sector-c2text.section2";
        }
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $section2->image;
        }
        $data = [
            'image' => $file,
            'title' => $request->title,
            'description' => $request->description,
        ];
        $section2->update($data);

        return redirect()->route($route)->with('success', "Data updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = SectorCommonSection2Details::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        SectorCommonSection2Details::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request, $id)
    {
        $section2 = SectorCommonSection2::findOrFail($id);
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
            'image' => $file,
            'title' => $request->title,
            'description' => $request->description,
        ];
        $section2->update($data);

        return redirect()->back()->with('success', "Data Updated Successfully");
    }
}
