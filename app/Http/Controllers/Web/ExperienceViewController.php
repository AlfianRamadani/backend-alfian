<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Handling;
use App\Models\experience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setactives;

class ExperienceViewController extends Controller
{
    public function index()
    {
        $ExperienceData = experience::get();
        return view("experience.index", compact("ExperienceData"));
    }


    public function create()
    {
        $form = [

            'work' => [
                [
                    'name' => 'work',
                    'type' => 'text',
                ],
            ],
            'division' => [
                [
                    'name' => 'division',
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

        return view("experience.create", compact('form'));
    }

    public function store(Request $request)
    {


        $storeData = experience::create([
            "work" => $request->work,
            "division" => $request->division,
            "period" => $request->period,

        ]);
        return redirect()->route('experience.index')->with('status', 'experience created successfully');
    }

    public function show($id)
    {
        // Code to display specific experience
    }

    public function edit($id)
    {
        $experienceData = experience::find($id);
        $selectedEditId = $id;

        $form = [

            'work' => [
                [
                    'name' => 'work',
                    'type' => 'text',
                    'value' => $experienceData['work'],
                ],
            ],
            'division' => [
                [
                    'name' => 'division',
                    'type' => 'text',
                    'value' => $experienceData['division'],
                ],
            ],
            'period' => [
                [
                    'name' => 'period',
                    'type' => 'text',
                    'value' => $experienceData['period'],
                ],
            ],

        ];

        return view('experience.edit', compact('form', 'selectedEditId'));
    }
    public function update(Request $request, $id)
    {

        $updateOrCreateData = experience::updateOrCreate(
            ['id' => $id],
            [
                "work" => $request->work,
                "division" => $request->division,
                "period" => $request->period,
            ]
        );
        return redirect()->route("experience.index")->with('status', 'experience updated successfully');
    }

    public function destroy($id)
    {
        $deleteData = experience::findOrFail($id);
        $deleteData->delete();
        return redirect()->route('experience.index')->with('status', 'experience deleted successfully');
    }
}
