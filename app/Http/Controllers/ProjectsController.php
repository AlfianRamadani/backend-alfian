<?php

namespace App\Http\Controllers;

use App\Helpers\Handling;
use App\Helpers\ResponseFormatter;

use App\Models\projects;
use App\Http\Requests\StoreprojectsRequest;
use App\Http\Requests\UpdateprojectsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    protected $fileName;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = projects::all();
        foreach ($result as $key => $value) {
                $result[$key]["img_path"] = asset($value["img_path"]);
        }
        if ($result) {
            return ResponseFormatter::success($result);
        } elseif (!$result) {
            return ResponseFormatter::error("Error ketika mendapatkan data dari server");
        }
   

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreprojectsRequest $request)
    {
      

        $fileName = time() . '.' . $request->file("img")->extension();
        $path = Storage::putFileAs(
            'public/projects',
            $request->file('img'),
            $fileName
        );
        if (!$path) {
            return ResponseFormatter::error(NULL, "Error Uploading File", 400);
        }
        
        try {
            $projects = new projects();
            $projects->title = $request->title;
            $projects->subtitle = $request->subtitle;
            $projects->img_path = $path;
            $projects->information_id = $request->information_id;
            $projects->save();
            return ResponseFormatter::success("Data Added Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), "Error Inserting Data", 400);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = projects::findOrFail($id);
        return ResponseFormatter::success($result, "Successfully Getting Data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprojectsRequest $request)
    {
        try {
            $fileName = "";
            $selected = projects::findOrFail($request->id);
            if ($request->hasFile('projects')) {
                try {
                    storage::delete($request->img_path);
                } catch (\Throwable $th) {
                    return ResponseFormatter::error(NULL, "Error with File", 400);

                }
                $fileName = time() . '.' . $request->file("projects")->extension();
                $uploadingFile = Handling::Upload($fileName, $request->file("avatar"), 'public/projects');
                if (!$uploadingFile) {
                    return ResponseFormatter::error(NULL, "Error Uploading File", 400);
                }
            }
            $selected->title = $request->title;
            $selected->subtitle = $request->subtitle;
            $selected->img_path = $request->img_path;
            $selected->information_id = $request->information_id;
            $selected->save();
            return ResponseFormatter::success("Data Update Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), "Error Updating Data", 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $selected = projects::findOrFail($id);
            $selected->delete();
            return ResponseFormatter::success("Data Delete Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), "Error Deleting Data", 400);
        }    }
}
