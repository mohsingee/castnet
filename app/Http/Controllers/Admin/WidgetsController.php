<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommonEventSection;
use App\Models\JoinWidget;

class WidgetsController extends Controller
{
    public function index(){
        $joinWidgetData = JoinWidget::first();
        return view('admin.pages.joinWidget',compact('joinWidgetData'));
    }

    public function udpateJoinWidget(Request $request, $id){
        $joinWidget = JoinWidget::findOrFail($id);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'button1' => $request->button1,
            'button1_link' => $request->button1_link,
            'button2' => $request->button2,
            'button2_link' => $request->button2_link,
        ];
        $joinWidget->update($data);
        return redirect()->back()->with('success', "Data Updated Successfully");
    }

    public function commonEvent(){
        $event = CommonEventSection::first();
        return view('admin.pages.eventWidget', compact('event'));
    }

    public function updateEventWidget(Request $request,$id){
        $event = CommonEventSection::findOrFail($id);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'button1' => $request->button1,
            'button1_link' => $request->button1_link,
            'button2' => $request->button2,
            'button2_link' => $request->button2_link,
        ];
        $event->update($data);
        return redirect()->back()->with('success', "Data Updated Successfully");
    }
}
