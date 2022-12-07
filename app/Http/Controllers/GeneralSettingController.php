<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingRequest;
use App\Models\GeneralSetting;
use Artesaos\SEOTools\Facades\SEOTools;
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
        // General Setting of the website
        $general_setting = GeneralSetting::first();

        SEOTools::setTitle("General Setitngs | Dashboard");
        SEOTools::setDescription("$general_setting->site_meta_description");
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'webiste');

        return view('pages.admin.general-settings', [
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
