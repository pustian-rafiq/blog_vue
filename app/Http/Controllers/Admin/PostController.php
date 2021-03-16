<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Image;
//use Intervention\Image\ImageManagerStatic as Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','user')->orderBy('id','DESC')->get();
        return response()->json([
            'posts' => $posts,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $success = false;
       //Check Validation
       $this->validate($request,[

        'category_id' => 'required',
        'title' => 'required|unique:posts|min:5',
        'content' => 'required|min:10',
        'status' => 'required',

    ]);
    // Get the extension of thumbanil
        $get_thumb = $request->thumbnail;
        $thumb_file = explode(';',$request->thumbnail);
        $thumb_file = explode('/',$thumb_file[0]);
        $thumb_file_ext = end($thumb_file);
        $slug = slugify($request->title);
        $file_name =  $slug.'.'.$thumb_file_ext;

        //Insert database
        $success = Post::create([
            'user_id' => Auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $file_name,
            'slug' => $slug,
            'status' => $request->status,
        ]);

        // if ($success) {
        //     //Image::make($post_image1)->resize(300,300)->save('public/media/post/'.$post_image_name);
        //      Image::make($get_thumb)->resize(400,200)->save('public/uploads/posts/'.$file_name);
        // }

        return response()->json(['success' => $success],200);
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
    public function edit($slug)
    {
        //get the getPosts
        $post = Post::where('slug',$slug)->first();
        return response()->json(['post' => $post],200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       //delete post using slug
       $post = Post::where('slug',$slug)->first();
       //return succes to the response thorugh which we can check the post is deleted or not.
       if($post->delete()){
           $filename = $post->thumbnail;
        //    if(public_path('uploads/posts/'.$filename)){
        //        unlink(public_path('uploads/posts/'.$filename);
        //    }
           $success = true;
       }else{
           $success = false;
       }

       return response()->json(['success' => $success],200);
   }
   public function removeItems(Request $request){
    $postIds = $request->dataForController;
    $sl = 0;
    foreach($postIds as $id){
        $post_id = Post::find($id);
        $post_id->delete();
        $sl++;
    }

    $success = $sl > 0? true: false;
    return response()->json(['success'=> $success, 'total' => $sl]);
}
//This function change the status of the category
public function changeStatus(Request $request){
    $postIds = $request->dataForController;
    $sl = 0;
    foreach($postIds as $id){
        $post_id = Post::find($id);
        $post_id->status = $request->status;
        $post_id->save();
        $sl++;
    }

    $success = $sl > 0;
    return response()->json(['success'=> $success, 'total' => $sl]);
}
}
