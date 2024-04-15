<?php

namespace App\Http\Controllers\Api;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $siteSettings = SiteSetting::first();
        if($siteSettings) {
            if(is_object($siteSettings)) {
                $siteSettings = $siteSettings->toArray();
            }
            if(isset($siteSettings['main_logo']) && !empty($siteSettings['main_logo'])){
                $mainLogoURL = '/uploads/site-settings/' . $siteSettings['main_logo'];
                $siteSettings['main_logo_url'] = asset($mainLogoURL);
            }

            if(isset($siteSettings['sticky_logo']) && !empty($siteSettings['sticky_logo'])){
                $stickyLogoURL = '/uploads/site-settings/' . $siteSettings['sticky_logo'];
                $siteSettings['sticky_logo_url'] = asset($stickyLogoURL);
            }
            return response()->json($siteSettings);
        } else {
            return response()->json(['message' => 'No matching banner found.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
