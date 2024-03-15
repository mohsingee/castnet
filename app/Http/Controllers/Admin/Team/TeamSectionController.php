<?php

namespace App\Http\Controllers\Admin\Team;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\OurTeam;
class TeamSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = OurTeam::all();
        return view('admin.pages.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.team.create');
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

        $teamData = [
            'image' => $file,
            'name' => $request->name,
            'linkedin' => $request->linkedin,
            'profession' => $request->profession,
            'type' => $request->type,
        ];
        OurTeam::create($teamData);
        $message = 'Team member added successfully';
        return redirect()->route('our-team.index')->with('success', $message);
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
        $team = OurTeam::findOrFail($id);
        return view('admin.pages.team.edit',compact('team'));
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
        $team = OurTeam::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $team->image;
        }
        $data = [
            'image' => $file,
            'name' => $request->name,
            'linkedin' => $request->linkedin,
            'profession' => $request->profession,
            'type' => $request->type,
        ];
        $team->update($data);

        return redirect()->route('our-team.index')->with('success', "Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = OurTeam::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        OurTeam::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Team member deleted successfully.',
            'status' => 'success',
        ));
    }

    public function banner(){
        $banner = PageBanner::where('type',3)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
