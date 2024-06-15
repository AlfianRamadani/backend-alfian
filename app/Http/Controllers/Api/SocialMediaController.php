<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Handling;
use App\Helpers\ResponseFormatter;

use App\Models\socialMedia;
use App\Http\Requests\Storesocial_mediaRequest;
use App\Http\Requests\Updatesocial_mediaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = socialMedia::get();
        if ($result) {
            return ResponseFormatter::success($result);
        } elseif (!$result) {
            return  ResponseFormatter::error(NULL, "Error ketika mendapatkan data dari server");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'linkedin' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'discord' => 'required|string',
            'twitter' => 'required|string',

        ]);
        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), "Error Bad Request", 400);
        }


        try {
            $social_media = new socialMedia([
                'linkedin' => $request->linkedin,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'discord' => $request->discord,
                'twitter' => $request->twitter,

            ]);

            $social_media->save();
            return ResponseFormatter::success("Data Added Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), "Error Inserting Data", 400);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {

        $result = SocialMedia::findOrFail($id);
        return ResponseFormatter::success($result, "Successfully Getting Data");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            $selected = socialMedia::findOrFail($id);
            $selected->delete();
            return ResponseFormatter::success("Data Delete Successfully");
        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), "Error Deleting Data", 400);
        }
    }
}
