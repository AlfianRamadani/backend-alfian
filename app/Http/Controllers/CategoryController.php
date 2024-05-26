<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Category;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Models\Post;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();
            return ResponseFormatter::success($categories, "Successfully getting categories data");
        } catch (\Exception $e) {
            return ResponseFormatter::error(NULL, "Error retrieving categories data");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, String $id)
    {
        try {
            $validated = $request->safe->all();

            $selected = Category::findOrFail($id);
            $selected->fill($validated);
            $selected->save();
            return ResponseFormatter::success($selected, "Data Update Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error(NULL, "Error Updating Data", 400);
        }
    }
    public function store(StoreCategoriesRequest $request)
    {
        try {
            $validated = $request->safe()->all();
            $category = Category::create($validated);
            return ResponseFormatter::success($category, "Data Inserting Successfully");
        } catch (\Exception $e) {
            return ResponseFormatter::error(NULL, "Error Inserting Data", 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $category = Category::findOrFail($id);
            $category->delete();
            return ResponseFormatter::success($category, "Data Delete Successfully");
        } catch (\Exception $e) {
            return ResponseFormatter::error(NULL, "Error Deleting Data", 400);
        }
    }
    public function categoryPost(string $category)
    {
        try {
            $result = Category::with("posts")->where('category',$category)->firstOrFail();
            $posts = $result->posts;
                foreach ($posts as $key => $value) {
                    # code...
                    $posts[$key]["featured_image"] = Asset($value["featured_image"]);
                }
            return $posts->load("categories");
        } catch (\Throwable $th) {
            return "not found";
        }

     
        // return $value;
        // return $category;
    }
}
