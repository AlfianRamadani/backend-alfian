<?php

namespace App\Http\Controllers\Web;

use App\Models\setactives;
use App\Http\Requests\StoresetactivesRequest;
use App\Http\Requests\UpdatesetactivesRequest;
use App\Http\Controllers\Controller;


class SetactivesController extends Controller
{
   public function setInformation($id){
      $data = setactives::findOrFail(1);
      $data->update([
         'information_id' => $id
      ]);
      return redirect()->back()->with('status', 'successfully activated the selected information');
   }
   public function setEducation($id){
      $data = setactives::findOrFail(1);
      $data->update([
         'education_id' => $id
      ]);
      return redirect()->back()->with('status', 'successfully activated the selected education');
   }
   public function setWork($id){
      $data = setactives::findOrFail(1);  
      $data->update([
         'journey_id' => $id
      ]);
      return redirect()->back()->with('status', 'successfully activated the selected journey');
   }
   
}
