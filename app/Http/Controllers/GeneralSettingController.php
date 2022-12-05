<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingRequest;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.general-settings', [
            "title" => "General Setitngs",
            "general" => GeneralSetting::where('id', '1')->first(),
            "user" => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralSettingRequest $request, $id)
    {
        $data = $request->all();

        $settings = GeneralSetting::findOrFail($id);
        $settings->update($data);

        return Redirect::route('general-settings.index')->with('success', "Success Update Site Settings!");
    }
}
