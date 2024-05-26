<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Throwable;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = post::all()->load("categories");

     
  
        
        foreach ($result as $key => $value) {
            $result[$key]["featured_image"] = Asset($value["featured_image"]);
        }

        if ($result) {
            return ResponseFormatter::success($result);
        } elseif (!$result) {
            return ResponseFormatter::error(NULL,"Error ketika mendapatkan data dari server");
        }   
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'required|image|mimes:jpeg,jpg,png,svg,gif,webp|max:2048',
         

        ]);
        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), "Error Bad Request", 400);
        }
        $fileName = time() . '.' . $request->file("featured_image")->extension();
        $path = Storage::putFileAs(
            'public/post',
            $request->file('featured_image'),
            $fileName
        );

        try {
            $post = new post([
                'title' => $request->title,
                'content' => $request->content,
                'featured_image' => $path,

            ]);

            $post->save();
            $post->categories()->attach($request->category);

            return ResponseFormatter::success("Data Added Successfully");
        } catch (Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), "Error Inserting Data", 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $result = post::findOrFail($id);
        return ResponseFormatter::success($result, "Successfully Getting Data");
    
    }

 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function postBasedId(string $id){
         
                $post = Post::find($id)->load("categories");
                    $post["featured_image"] = Asset($post["featured_image"]);
        return ResponseFormatter::success($post, "Succesfully Getting Data");
                
      
    }
  
}
