<?php

namespace App\Http\Controllers\Admin\OpporProjects;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\ProjectDetail;
use App\Models\ProjectsModel;
use App\Models\PageBanner;

class ProjectController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',54)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section1 = ProjectsModel::where('section',1)->first();
        $section2 = ProjectsModel::where('section',2)->with('pro_detail')->get();
        return view('admin.pages.projects.index',compact('section1','section2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.projects.create');
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

        $pro = ProjectsModel::create([
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
            'section' => 2,
        ]);
        ProjectDetail::create([
            'project_id' => $pro->id,
            'pro_industry_sector' => $request->pro_industry_sector,
            'summary_of_scope' => $request->summary_of_scope,
            'pro_or_ser' => $request->pro_or_ser,
            'region_country' => $request->region_country,
            'funded' => $request->funded,
        ]);

        return redirect('admin/listofpro')->with('success', 'Data saved successfully!');
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
        $section = ProjectsModel::where('id',$id)->with('pro_detail')->first();
        return view('admin.pages.projects.edit',compact('section'));
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
        $item = ProjectsModel::findOrFail($id);
        if ($item == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }

        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $item->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
        ];
        $item->update($data);
        ProjectDetail::where(['project_id'=>$id])->update([
            'project_id' => $id,
            'pro_industry_sector' => $request->pro_industry_sector,
            'summary_of_scope' => $request->summary_of_scope,
            'pro_or_ser' => $request->pro_or_ser,
            'region_country' => $request->region_country,
            'funded' => $request->funded,
        ]);
        return redirect('admin/listofpro')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = ProjectsModel::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        ProjectsModel::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data has been deleted.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request,$id){
        $item = ProjectsModel::findOrFail($id);
        if ($item == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        $item->update($data);

        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
