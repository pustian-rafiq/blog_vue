<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  Category::all();
        return response()->json([
            'categories' => $categories,
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
        //Check Validation
        $this->validate($request,[
            'name' => 'required|min:3|max:50|unique:categories',
            'status' => 'required',

     ]);
//Insert database
     Category::create([
        'name' => $request->name,
        'slug' => slugify($request->name),
        'status' => $request->status,
     ]);
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
        //get the getCategories
        $category = Category::where('slug',$slug)->first();
        return response()->json(['category' => $category],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         //Check Validation
         $this->validate($request,[
            'name' => 'required|min:3|max:50|unique:categories,name,'.$request->id,
            'status' => 'required',

     ]);
     //Update database
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = slugify($request->name);
        $category->status = $request->status;

        if($category->save()){

        $success = true;
        }else{
            $success = false;
        }

        return response()->json(['success' => $success],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //delete category using slug
        $category = Category::where('slug',$slug)->first();
        //return succes to the response thorugh which we can check the category is deleted or not.
        if($category->delete()){
            $success = true;
        }else{
            $success = false;
        }

        return response()->json(['success' => $success],200);
    }
}
