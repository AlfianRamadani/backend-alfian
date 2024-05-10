<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;

use App\Models\socialMediaModel;
use App\Http\Requests\Storesocial_mediaRequest;
use App\Http\Requests\Updatesocial_mediaRequest;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = socialMediaModel::get();
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
    public function store(Storesocial_mediaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
  
}
