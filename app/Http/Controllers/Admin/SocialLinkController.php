<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialLinks;
class SocialLinkController extends Controller
{
    public function index(){
        $links = SocialLinks::first();
        return view('admin.pages.social_links',compact('links'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'facebook' => 'required|string|max:255',
            'pintrest' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
        ]);

        $links = SocialLinks::findOrFail($id);
        if ($links == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }

        $data = [
            'facebook' => $request->facebook,
            'pintrest' => $request->pintrest,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
        ];
        $links->update($data);
        return redirect()->back()->with('success','The social links have been updated.');
    }
}
