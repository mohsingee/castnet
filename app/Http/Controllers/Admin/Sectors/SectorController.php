<?php

namespace App\Http\Controllers\Admin\Sectors;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\SectorModel;
use App\Models\PageBanner;
class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = SectorModel::all();
        return view('admin.pages.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sectors.create');
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

        $data = [
            'title' => $request->title,
            'image' => $file,
            'link' => $request->link,
        ];
        SectorModel::create($data);
        $message = 'Sector added successfully';
        return redirect()->route('sectors.index')->with('success', $message);
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
        $sector = SectorModel::findOrFail($id);
        return view('admin.pages.sectors.edit',compact('sector'));
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
        $sector = SectorModel::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $sector->image;
        }
        $data = [
            'title' => $request->title,
            'image' => $file,
            'link' => $request->link,
        ];
        $sector->update($data);
        return redirect()->route('sectors.index')->with('success', "Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = SectorModel::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        SectorModel::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Sector deleted successfully.',
            'status' => 'success',
        ));
    }

    public function banner(){
        $banner = PageBanner::where('type',11)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
