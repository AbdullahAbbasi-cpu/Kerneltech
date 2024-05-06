<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Banners;
use App\Http\Requests\Admin\StoreBannerRequest;
use App\Http\Requests\Admin\UpdateBannerRequest;

class BannersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banners::orderBy('created_at', 'desc')->get();

        // dd($data);

        return view('admin.banners.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $existingOptions = Banners::pluck('page_to_show_slider_on')->toArray();
        $options = [
            'home',
            'about',
            'blog',
            'web-application-design',
            'mobile-app-design-services',
            'android-development',
            'hybrid-development',
            'ios-development',
            'mobile-app-development',
            'custom-web-development-services',
            'wordpress-development-services',
            'laravel-development-services',
            'e-commerce-solutions',
            'woocommerce-development-services',
            'opencart-development-services',
            'digital-marketing',
            'privacy-policy',
            'terms-and-condition'
        ];
        $options = array_diff($options, $existingOptions);
        return view('admin.banners.create', ['options' => $options]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $data = $request->except([
            '_token',
            '_method',

        ]);

        // move uploaded file on server.
        $imageFileName = '';
        if ($request->hasFile('image')) {
            $file          = $request->file('image');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'banners\banner-image-' . time() . '.' . 'webp';
            // $file->move(uploadsDir('banners'), $filename);
            $convertedImage =  convertImage($file, $filename);
            $data['image'] = $convertedImage->basename;
            $imageFileName = $convertedImage->basename;
        }
        $Banner = Banners::create([
            'title' => $request->title,
            'image' => $imageFileName,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'page_to_show_slider_on' => $request->page_to_show_slider_on
        ]);
        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */


    public function uploadAndCropImage($uploadedFile, $thumbnailSize, $prefix)
    {
        // Generate a unique filename for the uploaded image
        $imageName = $prefix . '-' . time() . '.' . 'webp';

        // Move the uploaded file to the desired directory
        move_uploaded_file($uploadedFile, uploadsDir('admin') . '/' . $imageName);
        // exit;
        // Open the uploaded image using Intervention Image
        $image = \Image::make(uploadsDir('admin') . '/' . $imageName);

        // Get the original width and height of the image
        $originalWidth = $image->width();
        $originalHeight = $image->height();

        // Determine the size of the square to crop
        $cropSize = min($originalWidth, $originalHeight);

        // Calculate the coordinates to crop a square from the center
        $cropX = ($originalWidth - $cropSize) / 2;
        $cropY = ($originalHeight - $cropSize) / 2;

        // Crop the square from the center
        $image->crop($cropSize, $cropSize, (int) $cropX, (int) $cropY);


        // Resize the cropped square to create a thumbnail
        $image->resize($thumbnailSize, $thumbnailSize);

        // Save the cropped and resized image
        $thumbnailPath = uploadsDir('thumbnail_image') . '/' . $imageName;
        $image->save($thumbnailPath);

        // Return the path to the thumbnail
        return $imageName;
    }

    public function show($id)
    {
        $Banner = Banners::where('id', $id)->first();
        return view('admin.banners.show', compact('Banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Banners::find($id);
        $existingOptions = Banners::pluck('page_to_show_slider_on')->toArray();
        $existingOptions = array_diff($existingOptions, [$data->page_to_show_slider_on]);
        $options = [
            'home',
            'about',
            'blog',
            'web-application-design',
            'mobile-app-design-services',
            'android-development',
            'hybrid-development',
            'ios-development',
            'mobile-app-development',
            'custom-web-development-services',
            'wordpress-development-services',
            'laravel-development-services',
            'e-commerce-solutions',
            'woocommerce-development-services',
            'opencart-development-services',
            'digital-marketing',
            'privacy-policy',
            'terms-and-condition'
        ];
        $options = array_diff($options, $existingOptions);

        return view('admin.banners.edit', ['data' => $data, 'options' => $options]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        $imageFileName = '';
        if ($request->hasFile('image')) {
            $file          = $request->file('image');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'banners\banner-image-' . time() . '.' . 'webp';
            // $file->move(uploadsDir('banners'), $filename);
            $convertedImage = convertImage($file, $filename);
            $data['image'] = $convertedImage->basename;
            $imageFileName = $convertedImage->basename;
        }
        $Banners = Banners::where('id', $id)->first();
        if ($Banners) {
            $updateData = [
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => $request->is_active,
                'page_to_show_slider_on' => $request->page_to_show_slider_on,
            ];

            if ($imageFileName !== '') {
                $updateData['image'] = $imageFileName;
            }



            $Banners->update($updateData);
        }


        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Banners::find($id);

        if ($data) {
            if ($data->image != '' && file_exists(uploadsDir('banners') . $data->image)) {
                unlink(uploadsDir('banners') . $data->image);
            }
            Banners::where('id', $id)->delete();
        }

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner was removed successfully!');
    }

    public function isActive(Request $request)
    {
        if (isset($request)) {
            $id = $request->id;
            $isChecked = $request->isChecked;
            $fieldToUpdate = 'is_active';
            Banners::where('id', $id)->update([$fieldToUpdate => $isChecked ? 1 : 0]);
            return response()->json(['message' => ucfirst($request->type) . ' page updated successfully']);
        } else {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }
    }

    public function StoreImage(Request $request)
    {

        $imageFileName = '';
        if ($request->hasFile('image')) {
            $thumbnailSize = 500;
            $imageFileName = $this->uploadAndCropImage($request->file('image'), $thumbnailSize, 'news-image');
        }
        return response()->json([$imageFileName, $request->image_type]);
    }
}
