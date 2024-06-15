<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Handling;
use App\Models\Information;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setactives;

class InformationViewController extends Controller
{
    public function index()
    {
        $informationData = Information::get();
        $actives = setactives::first()->get();
        return view("Information.index", compact("informationData", "actives"));

    }


    public function create()
    {
        $form = [

            'name' => [
                [
                    'name' => 'name',
                    'type' => 'text',
                ],
            ],
            'country' => [
                [
                    'name' => 'country',
                    'type' => 'text',
                ],
            ],
            'description_1' => [
                [
                    'name' => 'description_1',
                    'type' => 'text',
                ],
            ],
            'description_2' => [
                [
                    'name' => 'description_2',
                    'type' => 'text',
                ],
            ],
            'description_3' => [
                [
                    'name' => 'description_3',
                    'type' => 'text',
                ],
            ],
            'description_4' => [
                [
                    'name' => 'description_4',
                    'type' => 'text',
                ],
            ],
            'position' => [
                [
                    'name' => 'position',
                    'type' => 'text',
                ],
            ],
            'email' => [
                [
                    'name' => 'email',
                    'type' => 'text',
                ],
            ],
            'contact_person' => [
                [
                    'name' => 'contact_person',
                    'type' => 'text',
                ],
            ],
            'projects_done' => [
                [
                    'name' => 'projects_done',
                    'type' => 'text',
                ],
            ],
            'experience' => [
                [
                    'name' => 'experience',
                    'type' => 'text',
                ],
            ],
            'satisfaction' => [
                [
                    'name' => 'satisfaction',
                    'type' => 'text',
                ],
            ],
            'avatar' => [
                [
                    'name' => 'avatar',
                    'type' => 'file',
                ],
            ],
        ];

        return view("Information.create", compact('form'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $fileName = time() . '.' . $request->file("avatar")->extension();
            $uploadingFile = Handling::Upload($fileName, $request->file("avatar"), 'public/avatar');
            if (!$uploadingFile) {
                return redirect()->back()->with("error_status", "Ooops something wrong with your avatar");
            }

            $storeData = Information::create([
                "name" => $request->name,
                "country" => $request->country,
                "description_1" => $request->description_1,
                "description_2" => $request->description_2,
                "description_3" => $request->description_3,
                "description_4" => $request->description_4,
                "position" => $request->position,
                "email" => $request->email,
                "contact_person" => $request->contact_person,
                "projects_done" => $request->projects_done,
                "experience" => $request->experience,
                "satisfication" => $request->satisfaction,
                "avatar" => "public/avatar/".$fileName,
            ]);
            return redirect()->route('information.index')->with('status', 'Information created successfully');
        }
    }

    public function show($id)
    {
        // Code to display specific information
    }

    public function edit($id)
    {
        $informationData = Information::find($id);
        $selectedEditId = $id;

        $form = [

            'name' => [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $informationData['name'],
                ],
            ],
            'country' => [
                [
                    'name' => 'country',
                    'type' => 'text',
                    'value' => $informationData['country'],
                ],
            ],
            'description_1' => [
                [
                    'name' => 'description_1',
                    'type' => 'text',
                    'value' => $informationData['description_1'],
                ],
            ],
            'description_2' => [
                [
                    'name' => 'description_2',
                    'type' => 'text',
                    'value' => $informationData['description_2'],
                ],
            ],
            'description_3' => [
                [
                    'name' => 'description_3',
                    'type' => 'text',
                    'value' => $informationData['description_3'],
                ],
            ],
            'description_4' => [
                [
                    'name' => 'description_4',
                    'type' => 'text',
                    'value' => $informationData['description_4'],
                ],
            ],
            'position' => [
                [
                    'name' => 'position',
                    'type' => 'text',
                    'value' => $informationData['position'],
                ],
            ],
            'email' => [
                [
                    'name' => 'email',
                    'type' => 'text',
                    'value' => $informationData['email'],
                ],
            ],
            'contact_person' => [
                [
                    'name' => 'contact_person',
                    'type' => 'text',
                    'value' => $informationData['contact_person'],
                ],
            ],
            'projects_done' => [
                [
                    'name' => 'projects_done',
                    'type' => 'text',
                    'value' => $informationData['projects_done'],
                ],
            ],
            'experience' => [
                [
                    'name' => 'experience',
                    'type' => 'text',
                    'value' => $informationData['experience'],
                ],
            ],
            'satisfaction' => [
                [
                    'name' => 'satisfaction',
                    'type' => 'text',
                    'value' => $informationData['satisfication'],
                ],
            ],
            'avatar' => [
                [
                    'name' => 'avatar',
                    'type' => 'file',
                    'value' => $informationData['description_1'],
                ],
            ],
        ];

        return view('Information.edit', compact('form', 'selectedEditId'));
    }
    public function update(Request $request, $id)
    {
        $fileName = "";
        if ($request->hasFile('avatar')) {
            $fileName = time() . '.' . $request->file("avatar")->extension();
            $uploadingFile = Handling::Upload($fileName, $request->file("avatar"), 'public/avatar');
            if (!$uploadingFile) {
                return redirect()->back()->with("error_status", "Ooops something wrong with your avatar");
            }

            }
                $updateOrCreateData = Information::updateOrCreate(
                    ['id' => $id],
                    [
                        "name" => $request->name,
                        "country" => $request->country,
                        "position" => $request->position,
                        "email" => $request->email,
                        "contact_person" => $request->contact_person,
                        "projects_done" => $request->projects_done,
                        "experience" => $request->experience,
                        "satisfication" => $request->satisfaction,
                        "avatar" => "public/avatar/".$fileName,
    
                    ]
                );
                return redirect()->back()->with('status', 'Information updated successfully');
    }

    public function destroy($id)
    {
        $deleteData = Information::findOrFail($id);
        $selectedActive = setactives::find(1);
        if ($selectedActive->information_id == $id) {
            return redirect()->back()->with('error_status', 'opss.. it delete the wrong area');

        }
        $deleteData->delete();
        return redirect()->route('information.index')->with('status', 'Information deleted successfully');
    }
}


