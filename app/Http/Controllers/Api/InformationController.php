<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Handling;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\information;
use Illuminate\Support\Facades\Validator;
use App\Models\setactives;




class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = setactives::with('Information')->get()->pluck('information');
        if ($result) {
            return ResponseFormatter::success($result);
        } elseif (!$result) {
            return ResponseFormatter::error(NULL, "Error ketika mendapatkan data dari server");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'projects_done' => 'required|string|max:255',
            'impression' => 'required|string|max:255',
            'clients_satisfication' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), "Error Bad Request", 400);
        }

        $fileName = time() . '.' . $request->file("avatar")->extension();
        if (!$fileName) {
            return ResponseFormatter::error(NULL, "Error Uploading File", 400);
        }
        try {
            $information = new information();
            $information->name = "Alfian Ramadani";
            $information->position = "Fullstack Developer";
            $information->projects_done = 15;
            $information->impression = 2;
            $information->clients_satisfication = 90;
            $information->country = "Indonesia";
            $information->avatar = $fileName;
            $information->save();
            return ResponseFormatter::success(NULL,"Data Added Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error(NULL, "Error Inserting Data", 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
   
            $result = information::findOrFail($request->id);
            return ResponseFormatter::success($result, "Successfully Getting Data");
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $fileName = "";
            $selected = information::findOrFail($request->id);
            if ($request->hasFile('avatar')) {
                $fileName = time() . '.' . $request->file("avatar")->extension();
                $uploadingFile = Handling::Upload($fileName, $request->file("avatar"), 'public/avatar');
                if (!$uploadingFile) {
                    return ResponseFormatter::error(NULL, "Error Uploading File", 400);
                }
            }
            $selected->fill($request->all());
            $selected->save();
            
            return ResponseFormatter::success(NULL,"Data Update Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error(NULL, "Error Updating Data", 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $selected = information::findOrFail($id);
            $selected->delete();
            return ResponseFormatter::success(NULL,"Data Delete Successfully");

        } catch (\Throwable $th) {
            return ResponseFormatter::error(NULL, "Error Deleting Data", 400);

        }
    }
}
