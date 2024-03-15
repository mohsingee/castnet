<?php

namespace App\Http\Controllers\Admin\Programs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\ProgramSection1;
use App\Models\ProgramSection2;
use App\Models\PageBanner;

class ProgramsController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',8)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $section1 = ProgramSection1::first();
        $section2 = ProgramSection2::all();
        return view('admin.pages.programs.index',compact('section1','section2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/web/images'), $file);

        ProgramSection2::create([
            'image' => $file,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('programs.index')->with('success', 'Data created successfully.');
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
        $section = ProgramSection2::findOrFail($id);
        return view('admin.pages.programs.edit',compact('section'));
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
        $item = ProgramSection2::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $item->image;
        }

        $data = [
            'image' => $file,
            'title' => $request->title,
            'description' => $request->description,
        ];
        $item->update($data);

        return redirect()->route('programs.index')->with('success', 'Data updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = ProgramSection2::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        ProgramSection2::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request, $id){
        $section = ProgramSection1::findOrFail($id);
        $section->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('success', 'Data updated successfully');
    }
}
