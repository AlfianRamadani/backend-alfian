<?php

namespace App\Http\Controllers;

use App\Models\AccountModel;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $accounts = AccountModel::get();
    return response()->json($accounts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $account = new AccountModel();
        $account->id = \Faker\Factory::create()->uuid();
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = bcrypt($request->password);
        $account->save();
        return response()->json($account);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $account = AccountModel::find($request->id);
        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountModel $accountModel)
    {
        $account = AccountModel::find($request->id);
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = bcrypt($request->password);
        $account->save();
        return response()->json($account);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, AccountModel $accountModel)
    {
        $account = AccountModel::find($request->id);
        $account->delete();
        return response()->json($account);
    }
}
