<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Handling;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setactives;

class ProjectViewController extends Controller
{
    public function index()
    {
        $ProjectData = Project::get();
        return view("Project.index", compact("ProjectData"));

    }


    public function create()
    {
        $form = [

            'title' => [
                [
                    'name' => 'title',
                    'type' => 'text',
                ],
            ],
            'description' => [
                [
                    'name' => 'description',
                    'type' => 'text',
                ],
            ],
            'featured_img' => [
                [
                    'name' => 'featured_img',
                    'type' => 'file',
                ],
            ],
     
            
        ];

        return view("project.create", compact('form'));
    }

    public function store(Request $request)
    {
        $fileName = "";
        if ($request->hasFile('featured_img')) {
            $fileName = time() . '.' . $request->file("featured_img")->extension();
            $uploadingFile = Handling::Upload($fileName, $request->file("featured_img"), 'public/featured_img');
            if (!$uploadingFile) {
                return redirect()->back()->with("error_status", "Ooops something wrong with your image");
            }

            }
                $storeData = Project::create([
                    "title" => $request->title,
                    "description" => $request->description,
                    "featured_img" => "public/featured_img/".$fileName,
                ]);
                return redirect()->route('project.index')->with('status', 'Project created successfully');
    }

    public function show($id)
    {
        // Code to display specific Project
    }

    public function edit($id)
    {
        $ProjectData = Project::find($id);
        $selectedEditId = $id;

        $form = [

            'title' => [
                [
                    'name' => 'title',
                    'type' => 'text',
                    'value' => $ProjectData->title,

                ],
            ],
            'description' => [
                [
                    'name' => 'description',
                    'type' => 'text',
                    'value' => $ProjectData->description,
                ],
            ],
            'featured_img' => [
                [
                    'name' => 'featured_img',
                    'type' => 'file',
                    'value' => $ProjectData->featured_img,

                ],
            ],


        ];

        return view('Project.edit', compact('form', 'selectedEditId'));
    }
    public function update(Request $request, $id)
    {
        // Temukan proyek berdasarkan id
        $project = Project::find($id);

        if (!$project) {
            return redirect()->back()->with("error_status", "Project not found");
        }

        $fileName = $project->featured_img; // default to existing image

        if ($request->hasFile('featured_img')) {
            $fileName = time() . '.' . $request->file("featured_img")->extension();
            $uploadingFile = Handling::Upload($fileName, $request->file("featured_img"), 'public/featured_img');
            if (!$uploadingFile) {
                return redirect()->back()->with("error_status", "Ooops something wrong with your avatar");
            }
            $fileName = 'public/featured_img/' . $fileName;
        }

        // Update data project
        $project->update([
            "title" => $request->title,
            "description" => $request->description,
            "featured_img" => $fileName,
        ]);

        return redirect()->route('project.index')->with('status', 'Project updated successfully');
    }


    public function destroy($id)
    {
        $deleteData = Project::findOrFail($id);
        $deleteData->delete();
        return redirect()->route('project.index')->with('status', 'Project deleted successfully');
    }
}


