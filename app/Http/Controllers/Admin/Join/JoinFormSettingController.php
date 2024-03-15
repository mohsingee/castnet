<?php

namespace App\Http\Controllers\Admin\Join;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfoFormSetting;
use App\Models\CompanyInformation;
use App\Models\Membership_Level;
use Illuminate\Http\Request;

class JoinFormSettingController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joins = CompanyInfoFormSetting::all();
        return view('admin.pages.join_form.index',compact('joins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.join_form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CompanyInfoFormSetting::create([
            'dropdowns'=>$request->title,
            'type'=>$request->dropdown_menu,
        ]);
        return redirect()->route('join-form-setting.index');
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
        $join = CompanyInfoFormSetting::find($id);
        return view('admin.pages.join_form.edit', compact('join'));
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
        $join = CompanyInfoFormSetting::find($id);
        if ($join == null) {
            return redirect()->back()->with('error', 'No records were found for updating.');
        }
        $data = [
            'dropdowns' => $request->title,
            'type' => $request->dropdown_menu,
        ];
        $join->update($data);
        return redirect()->route('join-form-setting.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CompanyInfoFormSetting::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data has been deleted.',
            'status' => 'success',
        ));
    }
}
