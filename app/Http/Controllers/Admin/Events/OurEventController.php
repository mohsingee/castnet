<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\OurEventModel;

class OurEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = OurEventModel::all();
        return view('admin.pages.events.section2.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.events.section2.create');
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

        $event = [
            'image' => $file,
            'title' => $request->title,
            'date' => $request->date,
        ];
        OurEventModel::create($event);
        $message = 'Event added successfully';
        return redirect()->route('myEvent.index')->with('success', $message);
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
        $event = OurEventModel::findOrFail($id);
        return view('admin.pages.events.section2.edit',compact('event'));
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
        $event = OurEventModel::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $event->image;
        }
        $data = [
            'image' => $file,
            'title' => $request->title,
            'date' => $request->date,
        ];
        $event->update($data);

        return redirect()->route('myEvent.index')->with('success', "Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = OurEventModel::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        OurEventModel::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Event has been deleted successfully.',
            'status' => 'success',
        ));
    }
}
