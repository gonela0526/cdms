<?php

namespace App\Http\Controllers;

use App\Blogs;
use Illuminate\Http\Request;
use Auth;
use Storage;

class BlogsController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin',['except'=>['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blogs::orderBy('created_at','desc')->paginate(10);
        return view('blog.index')->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required' ,
            'tags' => 'required'
        ]);

         //Handle File Upload
         if ($request->hasFile('body_file')) {
            //Get FIlename With extension
            $fileNameWithExt = $request->file('body_file')->getClientOriginalName();
            //Get Just Filename
            $filename = $request->input('title');
            //Get Just Ext
            $extension = $request->file('body_file')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('body_file')->storeAs('public/blog_files',$fileNameToStore);
        } else{
            $fileNameToStore = 'no_file.html';
        }

        // print_r($fileNameToStore); die();
 
        $blog = new Blogs;
        $blog->title = $request->input('title');
        $blog->tags = $request->input('tags');
        $blog->admin_id = auth()->user()->id;
        $blog->body_file_name = $fileNameToStore;
        $blog->save();
        return redirect('/admin/blogs/')->with('success','Blog Created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog =  Blogs::find($id);
        return view('blog.show')->with('blog',$blog);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $blog = Blogs::find($id);
        return view('blog.edit')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $this->validate($request,[
            'title' => 'required' ,
            'tags' =>   'required'
        ]);


        $contents  = $request->input('contents');
        $blog = Blogs::find($id);
        Storage::put('public/blog_files/'.$blog->body_file_name, $contents);
        $blog->title = $request->input('title');
        $blog->tags = $request->input('tags');
        $blog->update();
        return redirect('/admin/blogs/')->with('success','Blog Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blogs::find($id);
        // Storage::deleteDirectory($directory);
        if (Auth::guard('admin')->check()) {
            Storage::delete('public/blog_files/'.$blog->body_file_name);
            $blog->delete();   
        }
        return redirect('/admin/blogs')->with('success','Blog Removed');
    }
}
