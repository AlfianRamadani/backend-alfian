<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Handling;
use App\Models\Education;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setactives;

class EducationViewController extends Controller
{
    public function index()
    {
        $EducationData = Education::get();
        $actives = setactives::first()->get();
        return view("Education.index", compact("EducationData", "actives"));

    }


    public function create()
    {
        $form = [

            'school' => [
                [
                    'name' => 'school',
                    'type' => 'text',
                ],
            ],
            'major' => [
                [
                    'name' => 'major',
                    'type' => 'text',
                ],
            ],
            'period' => [
                [
                    'name' => 'period',
                    'type' => 'text',
                ],
            ],
        ];

        return view("education.create", compact('form'));
    }

    public function store(Request $request)
    {
      

            $storeData = Education::create([
                "school" => $request->school,
                "major" => $request->major,
                "period" => $request->period,
      
            ]);
            return redirect()->route('education.index')->with('status', 'Education created successfully');
        
    }

    public function show($id)
    {
        // Code to display specific Education
    }

    public function edit($id)
    {
        $EducationData = Education::find($id);
        $selectedEditId = $id;

        $form = [

            'school' => [
                [
                    'name' => 'school',
                    'type' => 'text',
                    'value' => $EducationData['school'],
                ],
            ],
            'major' => [
                [
                    'name' => 'major',
                    'type' => 'text',
                    'value' => $EducationData['major'],
                ],
            ],
            'period' => [
                [
                    'name' => 'period',
                    'type' => 'text',
                    'value' => $EducationData['period'],
                ],
            ],
           
        ];

        return view('education.edit', compact('form', 'selectedEditId'));
    }
    public function update(Request $request, $id)
    {
    
                $updateOrCreateData = Education::updateOrCreate(
                    ['id' => $id],
                    [
                "school" => $request->school,
                "major" => $request->major,
                "period" => $request->period,
                    ]
                );
                return redirect()->route('education.index')->with('status', 'Education updated successfully');
    }

    public function destroy($id)
    {
        $deleteData = Education::findOrFail($id);
        $selectedActive = setactives::find(1);
        $deleteData->delete();
        return redirect()->route('education.index')->with('status', 'Education deleted successfully');
    }
}


