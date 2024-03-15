<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\HomeSectionEvent;
use App\Models\HomeSection5;
class HomePageSection5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section5 = HomeSection5::first();
        $event = HomeSectionEvent::get();
        return view('admin.pages.home_page.section5.index',compact('section5','event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home_page.section5.create');
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

        HomeSectionEvent::create([
            'title' => $request->title,
            'date' => $request->date,
            'image' => $file,
            'description' => $request->description,
        ]);

        return redirect('admin/homesection5')->with('success', 'Data saved successfully!');
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
        $event = HomeSectionEvent::find($id);
        return view('admin.pages.home_page.section5.edit',compact('event'));
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
        $item = HomeSectionEvent::findOrFail($id);
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
            'date' => $request->date,
            'image' => $file,
            'description' => $request->description,
        ];
        $item->update($data);

        return redirect('admin/homesection5')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = HomeSectionEvent::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        HomeSectionEvent::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Event has been deleted.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request,$id){
        $item = HomeSection5::findOrFail($id);
        if ($item == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }

        $data = [
            'title' => $request->title,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'description' => $request->description,
        ];
        $item->update($data);

        return redirect()->back()->with('success', 'Item updated successfully.');
    }
}
