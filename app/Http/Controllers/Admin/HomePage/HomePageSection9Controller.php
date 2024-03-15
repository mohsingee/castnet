<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection9Feature;
use App\Models\HomeSection9;
class HomePageSection9Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section9 = HomeSection9::first();
        $features = HomeSection9Feature::get();
        return view('admin.pages.home_page.section9.index',compact('section9','features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home_page.section9.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HomeSection9Feature::create([
            'title' => $request->title,
            'heading' => $request->heading,
            'description' => $request->description,
        ]);

        return redirect('admin/homesection9')->with('success', 'Data saved successfully!');
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
        $section9 = HomeSection9Feature::find($id);
        return view('admin.pages.home_page.section9.edit',compact('section9'));
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
        $item = HomeSection9Feature::findOrFail($id);
        if ($item == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }

        $data = [
            'title' => $request->title,
            'heading' => $request->heading,
            'description' => $request->description,
        ];
        $item->update($data);

        return redirect('admin/homesection9')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeSection9Feature::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Feature has been deleted.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request,$id){
        $item = HomeSection9::findOrFail($id);
        if ($item == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }

        $data = [
            'title' => $request->title,
            'heading' => $request->heading,
            'description' => $request->description,
        ];
        $item->update($data);

        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
