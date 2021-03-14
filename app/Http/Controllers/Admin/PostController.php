<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','user')->get();
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
        //
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
        //
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
