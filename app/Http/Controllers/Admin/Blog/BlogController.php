<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use App\Models\MyBlog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = MyBlog::all();
        return view('admin.pages.blog.section.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.section.create');
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

        $blog = [
            'image' => $file,
            'title' => $request->title,
            'date' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
        ];
        MyBlog::create($blog);
        $message = 'Blog added successfully';
        return redirect()->route('my-blog.index')->with('success', $message);
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
        $blog = MyBlog::findOrFail($id);
        return view('admin.pages.blog.section.edit',compact('blog'));
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
        $blog = MyBlog::findOrFail($id);
        if($request->image){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/web/images'), $file);
        }else{
            $file = $blog->image;
        }
        $data = [
            'image' => $file,
            'title' => $request->title,
            'date' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
        ];
        $blog->update($data);

        return redirect()->route('my-blog.index')->with('success', "Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = MyBlog::where('id',$id)->first()->image;
        if(isset($path)){
            $path = public_path().'/assets/web/images/'.$path;
            File::delete($path);
        }
        MyBlog::destroy($id);
        return response()->json(array(
            'data' => true,
            'message' => 'Blog deleted successfully.',
            'status' => 'success',
        ));
    }

    public function banner(){
        $banner = PageBanner::where('type',28)->first();
        return view('admin.pages.banner',compact('banner'));
    }
}
