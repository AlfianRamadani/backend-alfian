<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;


class setInformation extends Controller
{
    public function __invoke($id)
    {
        $record = Information::find($id);

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found!');
        }

        $record->isActive = true;
        $record->save();

        return redirect()->back()->with('status', 'Record activated successfully!');
    }
}
