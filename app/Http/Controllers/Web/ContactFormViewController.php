<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Handling;
use App\Models\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setactives;

class ContactFormViewController extends Controller
{
    public function index()
    {
        $FormData = Form::simplePaginate(10);
        return view("Form.index", compact("FormData"));

    }

    public function destroy($id)
    {
        $deleteData = Form::findOrFail($id);
        $deleteData->delete();
        return redirect()->route('form.index')->with('status', 'Form deleted successfully');
    }
}


