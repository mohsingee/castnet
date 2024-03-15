<?php

namespace App\Http\Controllers\Admin\Contact_us;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Models\ContactUsModel;
use App\Models\PageBanner;
class ContactController extends Controller
{
    public function info(){
        $contact = ContactUsModel::first();
        return view('admin.pages.contact_us.index',get_defined_vars());
    }

    public function banner(){
        $banner = PageBanner::where('type',4)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function contactUsData(){
        $data= ContactUs::all();

        return view('admin.pages.contactUsData',compact('data'));
    }

    public function contactUsDetail($id){
        $contact = ContactUs::findOrFail($id);

    return view('admin.pages.contactUsDetail', compact('contact'));
    }

    public function update(Request $request,$id){
        $contact = ContactUsModel::findOrFail($id);
        if ($contact == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }
        $data = [
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'address' => $request->address,
            'map' => $request->map,
        ];
        $contact->update($data);

        return redirect()->back()->with('success', "Data Updated Successfully.");
    }


    public function destroy($id)
    {
        ContactUs::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Team member deleted successfully.',
            'status' => 'success',
        ));
    }
}
