<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationRequest;
use App\Models\Information;



class FormSubmitController extends Controller
{
    public function InformationForm(InformationRequest $request)
    {
        $updateOrCreateData = Information::updateOrCreate(
            ['id' => 1],
            [
                "name" => $request->name,
                "country" => $request->country,
                "position" => $request->position,
                "email" => $request->email,
                "contact_person" => $request->contact_person,
                "projects_done" => $request->projects_done,
                "experience" => $request->experience,
                "satisfication" => $request->satisfaction,
                "avatar" => $request->avatar,

            ]
        );
        return redirect()->route('information')->with('status', 'Information updated successfully');
    }
}
