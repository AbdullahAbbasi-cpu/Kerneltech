<?php

namespace App\Http\Controllers\Api;

use App\Models\Banners;
use Illuminate\Http\Request;

class bannerController extends Controller
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
        $pathname = basename($request->input('pathname'));
        print_r($pathname);
        if ($pathname == "") {
            $pathname = "home";
        }
        $banner = Banners::where('page_to_show_slider_on', $pathname)->first();
        if($banner && $banner->is_active == 1) {
            $imagePath = '/uploads/banners/' . $banner->image;
            $imageUrl = asset($imagePath);
            $bannerData = $banner->toArray();
            $bannerData['banner_image_url'] = $imageUrl;
            return response()->json(['bannerData' => $bannerData]);
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
