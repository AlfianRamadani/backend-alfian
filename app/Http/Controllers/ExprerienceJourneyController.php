<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;

use App\Models\exprerience_journey;
use App\Http\Requests\Storeexprerience_journeyRequest;
use App\Http\Requests\Updateexprerience_journeyRequest;

class ExprerienceJourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = exprerience_journey::all();
        if ($result) {
           return ResponseFormatter::success($result);
        } elseif (!$result) {
           return  ResponseFormatter::error(NULL, "Error ketika mendapatkan data dari server");
        }    }

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
    public function store(Storeexprerience_journeyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(exprerience_journey $exprerience_journey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(exprerience_journey $exprerience_journey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateexprerience_journeyRequest $request, exprerience_journey $exprerience_journey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(exprerience_journey $exprerience_journey)
    {
        //
    }
}
