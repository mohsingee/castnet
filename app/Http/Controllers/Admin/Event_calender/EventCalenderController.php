<?php

namespace App\Http\Controllers\Admin\Event_calender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurEventCalenderModel;
use App\Models\PageBanner;
class EventCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = OurEventCalenderModel::all();
        return view('admin.pages.event_calender.section1.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.event_calender.section1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = [
            'title' => $request->title,
            'event_date' => $request->event_date,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
            'category' => $request->category,
            'location' => $request->location,
            'description' => $request->description,
        ];
        OurEventCalenderModel::create($event);
        $message = 'Event calender added successfully';
        return redirect()->route('event-calender.index')->with('success', $message);
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
        $event = OurEventCalenderModel::findOrFail($id);
        return view('admin.pages.event_calender.section1.edit',compact('event'));
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
        $event = OurEventCalenderModel::findOrFail($id);
        $data = [
            'title' => $request->title,
            'event_date' => $request->event_date,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
            'category' => $request->category,
            'location' => $request->location,
            'description' => $request->description,
        ];
        $event->update($data);

        return redirect()->route('event-calender.index')->with('success', "Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OurEventCalenderModel::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Event calender has been deleted successfully.',
            'status' => 'success',
        ));
    }

    public function banner(){
        $banner = PageBanner::where('type',25)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
