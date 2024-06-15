<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Handling;
use App\Models\SocialMedia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialMediaViewController extends Controller
{
    public function index()
    {
        $SocialMediaData = SocialMedia::get();
        return view("social_media.index", compact("SocialMediaData"));
    }


    public function create()
    {
        $form = [

            'platform' => [
                [
                    'name' => 'platform',
                    'type' => 'text',
                ],
            ],
            'link' => [
                [
                    'name' => 'link',
                    'type' => 'text',
                ],
            ],
           
        ];

        return view("social_media.create", compact('form'));
    }

    public function store(Request $request)
    {


        $storeData = SocialMedia::create([
            "platform" => $request->platform,
            "link" => $request->link,

        ]);
        return redirect()->route('social-media.index')->with('status', 'SocialMedia created successfully');
    }

    public function show($id)
    {
        // Code to display specific SocialMedia
    }

    public function edit($id)
    {
        $SocialMediaData = SocialMedia::find($id);
        $selectedEditId = $id;

        $form = [

            'platform' => [
                [
                    'name' => 'platform',
                    'type' => 'text',
                    'value' => $SocialMediaData['platform'],
                ],
            ],
            'link' => [
                [
                    'name' => 'link',
                    'type' => 'text',
                    'value' => $SocialMediaData['link'],
                ],
            ],
           

        ];

        return view('social_media.edit', compact('form', 'selectedEditId'));
    }
    public function update(Request $request, $id)
    {

        $updateOrCreateData = SocialMedia::updateOrCreate(
            ['id' => $id],
            [
                "platform" => $request->platform,
                "link" => $request->link,
               
            ]
        );
        return redirect()->route("social-media.index")->with('status', 'SocialMedia updated successfully');
    }

    public function destroy($id)
    {
        $deleteData = SocialMedia::findOrFail($id);
        $deleteData->delete();
        return redirect()->route('social-media.index')->with('status', 'SocialMedia deleted successfully');
    }
}
