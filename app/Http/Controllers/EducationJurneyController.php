<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\education_jurney;
use App\Http\Requests\Storeeducation_jurneyRequest;
use App\Http\Requests\Updateeducation_jurneyRequest;
use GuzzleHttp\Psr7\Response;

class EducationJurneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = education_jurney::all();
        if ($result) {
           return ResponseFormatter::success($result);
        }elseif (!$result) {
           return  ResponseFormatter::error(NULL, "Error ketika mendapatkan data dari server");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeeducation_jurneyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(education_jurney $education_jurney)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(education_jurney $education_jurney)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateeducation_jurneyRequest $request, education_jurney $education_jurney)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(education_jurney $education_jurney)
    {
        //
    }
}
