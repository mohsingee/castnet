<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\HomeSection1;
class HomePageSection1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section1 = HomeSection1::all();
        return view('admin.pages.home_page.section1.index',compact('section1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home_page.section1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,jpeg,png',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $file = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/web/images'), $file);

        HomeSection1::create([
            'image' => $file,
            'heading' => $request->heading,
            'description' => $request->description,
            'button' => $request->button,
            'buttonlink' => $request->buttonlink,
        ]);

        return redirect('admin/homesection1')->with('success', 'Data saved successfully!');
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
        $section1 = HomeSection1::findOrFail($id);
        if ($section1 == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        return view('admin.pages.home_page.section1.edit',compact('section1'));
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
        $item = HomeSection1::findOrFail($id);
        if ($item == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }

        $request->validate([
            'image' => 'image|mimes:jpg,jpeg,png',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $item->image;
        }

        $data = [
            'heading' => $request->heading,
            'button' => $request->button,
            'buttonlink' => $request->buttonlink,
            'description' => $request->description,
            'image' => $file,
        ];
        $item->update($data);

        return redirect('admin/homesection1')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = HomeSection1::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        HomeSection1::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Item has been deleted.',
            'status' => 'success',
        ));
    }
}
