<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection4Detail;
use App\Models\HomeSection4;
class HomePageSection4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section4 = HomeSection4::first();
        $section4detail = HomeSection4Detail::get();
        return view('admin.pages.home_page.section4.index',compact('section4','section4detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home_page.section4.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HomeSection4Detail::create([
            'title' => $request->title,
            'features' => $request->features,
        ]);

        return redirect('admin/homesection4')->with('success', 'Data saved successfully!');
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
        $section4 = HomeSection4Detail::find($id);
        return view('admin.pages.home_page.section4.edit',compact('section4'));
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
        $item = HomeSection4Detail::findOrFail($id);
        if ($item == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }

        $data = [
            'title' => $request->title,
            'features' => $request->features,
        ];
        $item->update($data);

        return redirect('admin/homesection4')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeSection4Detail::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Item has been deleted.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request,$id){
        $item = HomeSection4::findOrFail($id);
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
            'image' => $file,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
        ];
        $item->update($data);

        return redirect()->back()->with('success', 'Item updated successfully.');
    }
}
