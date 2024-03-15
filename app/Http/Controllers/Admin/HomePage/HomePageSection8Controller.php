<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSectionFeature;
use App\Models\HomeSection8;
class HomePageSection8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section8 = HomeSection8::first();
        $features = HomeSectionFeature::get();
        return view('admin.pages.home_page.section8.index',compact('section8','features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home_page.section8.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HomeSectionFeature::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('admin/homesection8')->with('success', 'Data saved successfully!');
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
        $section8 = HomeSectionFeature::find($id);
        return view('admin.pages.home_page.section8.edit',compact('section8'));
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
        $item = HomeSectionFeature::findOrFail($id);
        if ($item == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        $item->update($data);

        return redirect('admin/homesection8')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeSectionFeature::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Feature has been deleted.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request,$id){
        $item = HomeSection8::findOrFail($id);
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
            'heading' => $request->heading,
            'image' => $file,
        ];
        $item->update($data);

        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
