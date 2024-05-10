<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\informationModel;


class informationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             $result = informationModel::all();
        if ($result) {
            return ResponseFormatter::success($result);
        } elseif (!$result) {
            return ResponseFormatter::error("Error ketika mendapatkan data dari server");
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $information = informationModel::with('projects')->find($request->id);
            $projects = $information->projects;
            return ResponseFormatter::success($projects);
        } catch (\Throwable $th) {
            return ResponseFormatter::error("Data Not Found", NULL);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
