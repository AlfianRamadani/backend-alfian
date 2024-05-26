<?php

namespace App\Http\Controllers;

use App\Helpers\Handling;
use App\Helpers\ResponseFormatter;

use App\Models\Journey;
use App\Http\Requests\Storeexprerience_journeyRequest;
use App\Http\Requests\Updateexprerience_journeyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = journey::all();
        if ($result) {
            return ResponseFormatter::success($result);
        } elseif (!$result) {
            return ResponseFormatter::error("Error ketika mendapatkan data dari server");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeexprerience_journeyRequest $request)
    {
        $validator = validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'period' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), "Error Bad Request", 400);
        }

     
        try {
            $ExperienceJourney = new journey([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'period' => $request->period
            ]);

            $ExperienceJourney->save();
            return ResponseFormatter::success("Data Added Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), "Error Inserting Data", 400);
        }    }

    /**
     * Display the specified resource.
     */
    public function show(Updateexprerience_journeyRequest $request)
    {

        $result = journey::findOrFail($request->id);
        return ResponseFormatter::success($result, "Successfully Getting Data");
        }

 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $selected = Journey::findOrFail($request->id);
            $selected->fill($request->all());
            $selected->save();
            return ResponseFormatter::success(NULL, "Data Update Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error(NULL, "Error Updating Data", 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            $selected = journey::findOrFail($id);
            $selected->delete();
            return ResponseFormatter::success("Data Delete Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), "Error Deleting Data", 400);
        }    }
}
