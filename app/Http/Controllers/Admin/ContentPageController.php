<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ContentPage;
class ContentPageController extends Controller {

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
     */
    public function terms()
    {
        $record = ContentPage::where('page_identifier', 'terms-and-condition')->first();
        return view('admin.content-pages.terms', compact('record'));
    }
    public function termsUpdate(Request $request) {
        $data = $request->except([
            '_token',
            '_method',
            'banner_image',
        ]);

        // move uploaded file on server.
        // if ($request->hasFile('banner_image')) {
            //     $file          = $request->file('banner_image');
            //     $extension     = $file->getClientOriginalExtension();
            //     $filename      = 'terms-banner-img-'.time() . '.' . $extension;
            //     $file->move(uploadsDir('content-pages'), $filename);
            //     $data['banner_image'] = $filename;
            //     $imageFileName = $filename;   
            // }
            
            
        $imageFileName = '';
        if ($request->hasFile('banner_image')) {
            $file          = $request->file('banner_image');
            $extension     = $file->getClientOriginalExtension();
            $path = public_path('uploads/content-pages');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $filename      = 'content-pages\terms-banner-img-' .time();
            $convertedImage = convertImage($file, $filename, 1920, 587, 75);
            $data['banner_image'] = $convertedImage->basename;
            $imageFileName = $convertedImage->basename;
        }
        $contentPage = ContentPage::where('page_identifier', $request->page_identifier)->first();
        if ($contentPage) {
            $updatedContent = [
                'banner_title' => $request->banner_title,
                'content' => $request->content,
                'banner_description' => $request->banner_description       
            ];
            if ($imageFileName !== '') {
                $updatedContent['banner_image'] = $imageFileName;
            }
            $contentPage->update($updatedContent);
        }
        return redirect()
            ->route('admin.content-pages.terms')
            ->with('success', 'Terms & Condition Content Updated Successfully.');
    }
    public function privacy()
    {
        $record = ContentPage::where('page_identifier', 'privacy-policy')->first();
        return view('admin.content-pages.privacy', compact('record'));
    }
    public function privacyUpdate(Request $request) {
        $data = $request->except([
            '_token',
            '_method',
            'banner_image',
        ]);

        // move uploaded file on server.
        // $imageFileName = '';
        // if ($request->hasFile('banner_image')) {
        //     $file          = $request->file('banner_image');
        //     $extension     = $file->getClientOriginalExtension();
        //     $filename      = 'privacy-banner-img-'.time() . '.' . $extension;
        //     $file->move(uploadsDir('content-pages'), $filename);
        //     $data['banner_image'] = $filename;
        //     $imageFileName = $filename;
        // }


        $imageFileName = '';
        if ($request->hasFile('banner_image')) {
            $file          = $request->file('banner_image');
            $extension     = $file->getClientOriginalExtension();
            $path = public_path('uploads/content-pages');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $filename      = 'content-pages\privacy-banner-img-' .time();
            $convertedImage = convertImage($file, $filename, 1920, 587, 75);
            $data['banner_image'] = $convertedImage->basename;
            $imageFileName = $convertedImage->basename;
        }


        $contentPage = ContentPage::where('page_identifier', $request->page_identifier)->first();
        if ($contentPage) {
            $updatedContent = [
                'banner_title' => $request->banner_title,
                'content' => $request->content,
                'banner_description' => $request->banner_description       
            ];

            if ($imageFileName !== '') {
                $updatedContent['banner_image'] = $imageFileName;
            }
            $contentPage->update($updatedContent);
        }

        return redirect()
            ->route('admin.content-pages.privacy')
            ->with('success', 'Privacy Policy Content Updated Successfully.');
    }

    public function about()
    {
        $record = ContentPage::where('page_identifier', 'about')->first();
        return view('admin.content-pages.about', compact('record'));
    }
    public function aboutUpdate(Request $request) {
        $data = $request->except([
            '_token',
            '_method',
            'banner_image',
            'about_image_1',
            'about_image_2',

        ]);

        // $imageFileNames = [];
        // $fileTypes = ['banner_image', 'about_image_1', 'about_image_2'];
        // foreach ($fileTypes as $fileType) {
        //     if ($request->hasFile($fileType)) {
        //         $file = $request->file($fileType);
        //         $extension = $file->getClientOriginalExtension();
        //         $filename = $fileType . '-' . time() . '.' . $extension;
        //         $file->move(uploadsDir('content-pages'), $filename);
        //         $imageFileNames[$fileType] = $filename;
        //     }
        // }
        
        $imageFileNames = [];
        $fileTypes = ['banner_image' => ['width' => 1920, 'height' => 587], 'about_image_1' => ['width' => 600, 'height' => 400], 'about_image_2' => ['width' => 600, 'height' => 400]];
        foreach ($fileTypes as $fileType => $dimensions) {
            if ($request->hasFile($fileType)) {
                $file = $request->file($fileType);
                $extension = $file->getClientOriginalExtension();
                $path = public_path('uploads/content-pages');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $width = $dimensions['width'];
                $height = $dimensions['height'];
                $filename = 'content-pages/' . $fileType . '-' . time();
                $convertedImage = convertImage($file, $filename, $width, $height, 75);
                $imageFileNames[$fileType] = $convertedImage->basename;
            }
        }


        $contentPage = ContentPage::where('page_identifier', $request->page_identifier)->first();
        if ($contentPage) {
            $updatedContent = [
                'banner_title' => $request->banner_title,
                'banner_description' => $request->banner_description,       
                'about_content_1' => $request->about_content_1,
                'about_content_2' => $request->about_content_2       
            ];
            foreach ($imageFileNames as $fileType => $filename) {
                if (isset($contentPage->{$fileType})) {
                    $updatedContent[$fileType] = $filename;
                }
            }
            $contentPage->update($updatedContent);
        }

        return redirect()
            ->route('admin.content-pages.about')
            ->with('success', 'About Page Content Updated Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('hi nad how are you');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
