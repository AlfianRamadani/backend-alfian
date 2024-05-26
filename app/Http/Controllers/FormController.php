<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\form;
use Illuminate\Http\Request;



class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $form = new form();
        $form->name = $request->name;
        $form->email = $request->email;
        $form->description = $request->description;
        $form->save();
        return ResponseFormatter::success(NULL, "Data Added Successfully");

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(form $form)
    {
        //
    }
}
