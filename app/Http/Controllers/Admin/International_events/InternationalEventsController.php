<?php

namespace App\Http\Controllers\Admin\International_events;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\InternationalEvent;
use Illuminate\Http\Request;
use App\Models\PageBanner;
class InternationalEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = InternationalEvent::get();
        return view('admin.pages.international_events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.international_events.create');
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

        InternationalEvent::create([
            'title' => $request->title,
            'date' => $request->date,
            'image' => $file,
            'description' => $request->description,
        ]);

        return redirect()->route('international_events.index')->with('success', 'Data saved successfully!');
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
        $event = InternationalEvent::find($id);
        return view('admin.pages.international_events.edit',compact('event'));
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
        $item = InternationalEvent::findOrFail($id);
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

        return redirect()->route('international_events.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = InternationalEvent::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        InternationalEvent::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Event has been deleted.',
            'status' => 'success',
        ));
    }

    public function banner(){
        $banner = PageBanner::where('type',27)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
