<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Http\Requests\Admin\UpdateSiteSettingRequest;

class SiteSettingsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $records = SiteSetting::find(1);
        return view('admin.site-settings', compact('records'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateSiteSettingRequest $request, $id)
    {

        // check if main logo exists
        if ($request->hasfile('main_logo') || isset($records->previous_main_logo)) {
            $file      = $request->file('main_logo');
            $extension = $file->getClientOriginalExtension();
            $filename  = 'main-logo-'.time() . '.' . $extension;
            $file->move(uploadsDir('site-settings'), $filename);
            $data['main_logo'] = $filename;
            $mainLogoFilename = $filename;
            if (file_exists(uploadsDir('site-settings').$filename)
                && !empty($request->previous_main_logo && file_exists(uploadsDir('site-settings').$request->previous_main_logo))
            ) {
                unlink(uploadsDir('site-settings').$request->previous_main_logo);
            }
        } else {
            $mainLogoFilename = '';
        }


        // check if sticky logo exists
        if ($request->hasfile('sticky_logo')) {
            $file      = $request->file('sticky_logo');
            $extension = $file->getClientOriginalExtension();
            $filename  = 'sticky-logo-'.time() . '.' . $extension;
            $file->move(uploadsDir('site-settings'), $filename);
            $data['sticky_logo'] = $filename;
            $stickyLogoFilename = $filename;
            
            if (file_exists(uploadsDir('site-settings').$filename)
                && !empty($request->previous_sticky_logo && file_exists(uploadsDir('site-settings').$request->previous_sticky_logo))
            ) {
                unlink(uploadsDir('site-settings').$request->previous_sticky_logo);
            }
        } else {
            $stickyLogoFilename = '';
        }



        $data = $request->except([
            '_token',
            '_method',
            'previous_main_logo',
            'previous_sticky_logo',
            'placeholder_image'
        ]);

        if ($request->hasfile('main_logo')){
            $data['main_logo'] = $mainLogoFilename;
        }
        if ($request->hasfile('sticky_logo')){
            $data['sticky_logo'] = $stickyLogoFilename;
        }
        $data['show_privacy_policy'] =  $request->has('show_privacy_policy') ? 1 : 0;
        $data['show_terms_and_condition'] = $request->has('show_terms_and_condition') ? 1 : 0;

        SiteSetting::where('id', $id)->update($data);

        return redirect()
            ->route('admin.site-settings.index')
            ->with('success', 'Site settings was updated successfully!');
    }
}
