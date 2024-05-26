<?php

namespace App\Http\Controllers;

use App\Models\post_category;
use App\Http\Requests\Storepost_categoryRequest;
use App\Http\Requests\Updatepost_categoryRequest;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storepost_categoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(post_category $post_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post_category $post_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatepost_categoryRequest $request, post_category $post_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post_category $post_category)
    {
        //
    }
}
