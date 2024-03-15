<?php

namespace App\Http\Controllers\Admin\Job_openings;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\CareersModel;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use Illuminate\Support\Facades\File;


class JobOpeningController extends Controller
{
    public function banner(){
        $banner = PageBanner::where('type',50)->first();
        return view('admin.pages.banner',compact('banner'));
    }

    public function section1(){
        $section = CareersModel::where(['page'=>'job','section'=>1])->first();
        $page = "Job Openings";
        $sn = "Section 1";
        return view('admin.pages.careers.common_section',get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $section = Job::all();
        $page = "Job Openings";
        $sn = "Section 2";
        return view('admin.pages.job_openings.common_section1',get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $page = "Job Openings";
        $sn = "Section 2";
        return view('admin.pages.job_openings.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        Job::create([
            'job_title' => $request->title,
            'job_description' => $request->description,
            'duration_detail' => implode(",",$request->duration),
            'job_location' => $request->job_location,
        ]);
        return redirect()->route('jobs.index')->with('success', 'Data saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Job::where('id',$id)->first();
        if ($section == null) {
            return redirect()->back()->with('error', 'No records were found for editing.');
        }
        $decodedDetail = json_decode($section->duration_detail);
        $page = "Job Openings";
        $sn = "Section 2";
        return view('admin.pages.job_openings.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $job = Job::findOrFail($id);
        if ($job == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }

        $data = [
            'job_title' => $request->title,
            'job_description' => $request->description,
            'duration_detail' => implode(",",$request->duration),
            'job_location' => $request->job_location,
            'status' => $request->status,
        ];
        $job->update($data);
        return redirect('admin/jobs')->with('success', 'Data saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $path = Job::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        Job::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }
    public function deleteApplicantion($id){

        $path = Application::where('id',$id)->first()->file;
        if(isset($path)){
            $path = public_path().'/assets/web/applications/'.$path;
            File::delete($path);
        }
        Application::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Data deleted successfully.',
            'status' => 'success',
        ));
    }

    public function updation(Request $request,$id){
        $job = CareersModel::findOrFail($id);
        if ($job == null) {
            return redirect()->back()->with('error', 'No records were found for updation.');
        }

        if($request->image){
            $path = $job->image;
            if(isset($path)){
                $path = public_path().'/assets/web/images/'.$path;
                File::delete($path);
            }
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $job->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $file,
            'description' => $request->description,
        ];
        $job->update($data);

        return redirect()->route('jobs.section1')->with('success', "Data Updated Successfully.");
    }

    public function jobApplicants($id){
        $section = Application::where('job_id', $id)->get();
        $page = "Applicants";
        $sn = "Job";
        return view('admin.pages.job_openings.applicants',get_defined_vars());
    }



    public function statusChange(Request $request){
        $job = Job::findOrFail($request->id);
        if ($job == null) {
            return redirect()->back()->with('error', 'No records were found.');
        }
        $job->update(['status'=> $request->status]);

        return response()->json(array(
            'data' => true,
            'message' => 'The status has been changed.',
            'status' => 'success',
        ));
    }
}
