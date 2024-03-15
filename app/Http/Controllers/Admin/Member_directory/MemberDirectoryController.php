<?php

namespace App\Http\Controllers\Admin\Member_directory;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\MemberDirectory;
use Illuminate\Http\Request;
use App\Models\PageBanner;
class MemberDirectoryController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',55)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = MemberDirectory::get();
        return view('admin.pages.member_directory.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.member_directory.create');
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

        MemberDirectory::create([
            'name' => $request->name,
            'image' => $file,
            'company' => $request->company,
            'position' => $request->position,
            'member_type' =>$request->member_type,
            'linkedin' =>$request->linkedin,
        ]);
        return redirect('admin/memberdirectory')->with('success', 'Data saved successfully!');
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
        $member = MemberDirectory::find($id);
        return view('admin.pages.member_directory.edit',compact('member'));
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
        $item = MemberDirectory::findOrFail($id);
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
            'name' => $request->name,
            'image' => $file,
            'company' => $request->company,
            'position' => $request->position,
            'member_type' =>$request->member_type,
            'linkedin' =>$request->linkedin,
        ];
        $item->update($data);
        return redirect('admin/memberdirectory')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = MemberDirectory::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        MemberDirectory::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data has been deleted.',
            'status' => 'success',
        ));
    }
}
