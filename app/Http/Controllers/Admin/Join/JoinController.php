<?php

namespace App\Http\Controllers\Admin\Join;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership_Level;
use App\Models\PageBanner;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $joins = Membership_Level::all();
        return view('admin.pages.join.index',compact('joins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.pages.join.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        Membership_Level::create([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('join.index');

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
        $join = Membership_Level::find($id);
        return view('admin.pages.join.edit', compact('join'));
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
        $join = Membership_Level::find($id);
        if ($join == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        $join->update($data);
        return redirect()->route('join.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Membership_Level::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data has been deleted.',
            'status' => 'success',
        ));
    }

    public function banner(){
        $banner = PageBanner::where('type',6)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
