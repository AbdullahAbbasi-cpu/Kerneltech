<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\mediaFile;
use Illuminate\Http\Request;
use App\Models\WorkingProcess;
use App\Models\Industries;
use App\Models\Testimonials;
use App\Models\Achievements;
use App\Models\Technologies;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;

class PagesController extends Controller
{
    private $pageRepository;
    private $mediaFileRepository;

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
        $data = Page::all();

        return view('admin.pages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // for services
        $headings = WorkingProcess::where('is_active', 1)->pluck('heading')->toArray();
        $industries = Industries::where('is_active', 1)->pluck('title')->toArray();
        $technologies = Technologies::where('is_active', 1)->pluck('title')->toArray();
        $testimonials = Testimonials::where('is_active', 1)->pluck('name')->toArray();


        $achievements = Achievements::where('is_active', 1)->pluck('icon_text')->toArray();
        // we can use this condition once the services records starts to appear on page table
        $services = Page::where('is_active', 1)
            ->where('page_template', 'services')
            ->pluck('title')
            ->toArray();


        return view('admin.pages.create', compact('headings', 'industries', 'technologies', 'testimonials', 'achievements', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {

        $data = $request->except([
            '_token',
            '_method'
        ]);

        // return dd($request);
        // for uploading services icon 
        if ($request->hasFile('icon')) {
            $file          = $request->file('icon');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'pages\services-icon-' . time() . '.' . 'webp';
            $convertedImage = convertImage($file, $filename);
            $data['icon'] = $convertedImage->basename;
            $pageIcon = $convertedImage->basename;
        }


        // FOR FIRST STEP
        // if ($request->hasFile('image_1')) {
        //     $file          = $request->file('image_1');
        //     $extension     = $file->getClientOriginalExtension();
        //     $filename      = 'page-card-1-'.time() . '.' . $extension;
        //     $file->move(uploadsDir('pages'), $filename);
        //     $data['image_1'] = $filename;
        //     $imageFileName_1 = $filename;
        // } 
        // if($request->has('title_1')) {
        //     $title_1 = $request->input('title_1');
        // }
        // if($request->has('description_1')) {
        //     $description_1 = $request->input('description_1');
        // }


        // FOR SECOND STEP
        // if ($request->hasFile('image_2')) {
        //     $file          = $request->file('image_2');
        //     $extension     = $file->getClientOriginalExtension();
        //     $filename      = 'page-card-2-'.time() . '.' . $extension;
        //     $file->move(uploadsDir('pages'), $filename);
        //     $data['image_2'] = $filename;
        //     $imageFileName_2 = $filename;
        // } 
        // if($request->has('title_2')) {
        //     $title_1 = $request->input('title_2');
        // }
        // if($request->has('description_2')) {
        //     $description_1 = $request->input('description_3');
        // }


        // FOR THIRD STEP
        // if ($request->hasFile('image_3')) {
        //     $file          = $request->file('image_3');
        //     $extension     = $file->getClientOriginalExtension();
        //     $filename      = 'page-card-3-' . time() . '.' . $extension;
        //     $file->move(uploadsDir('pages'), $filename);
        //     $data['image_3'] = $filename;
        //     $imageFileName_3 = $filename;
        // } 
        // if ($request->has('title_3')) {
        //     $title_3 = $request->input('title_3');
        // }
        // if ($request->has('description_3')) {
        //     $description_3 = $request->input('description_3');
        // }


        // FOR FOURTH STEP
        // if ($request->hasFile('image_4')) {
        //     $file          = $request->file('image_4');
        //     $extension     = $file->getClientOriginalExtension();
        //     $filename      = 'page-card-4-' . time() . '.' . $extension;
        //     $file->move(uploadsDir('pages'), $filename);
        //     $data['image_4'] = $filename;
        //     $imageFileName_4 = $filename;
        // } 
        // if ($request->has('title_4')) {
        //     $title_4 = $request->input('title_4');
        // }
        // if ($request->has('description_4')) {
        //     $description_4 = $request->input('description_4');
        // }



        for ($i = 1; $i <= 4; $i++) {
            $imageKey = 'image_' . $i;
            $titleKey = 'title_' . $i;
            $descriptionKey = 'description_' . $i;

            if ($request->hasFile($imageKey)) {
                $file = $request->file($imageKey);
                $extension = $file->getClientOriginalExtension();
                $path = public_path('uploads/pages');
                if (!file_exists($path)) {
                    // Create the directory if it doesn't exist
                    mkdir($path, 0777, true);
                }
                $filename = 'pages\page-card-' . $i . '-' . time() . '.' . 'webp';
                // $file->move(uploadsDir('pages'), $filename);
                $convertedImage = convertImage($file, $filename);
                $data[$imageKey] = $convertedImage->basename;
                ${'imageFileName_' . $i} = $convertedImage->basename;
            }

            if ($request->has($titleKey)) {
                ${$titleKey} = $request->input($titleKey);
            }
            if ($request->has($descriptionKey)) {
                ${$descriptionKey} = $request->input($descriptionKey);
            }
        }

        // if (isset($data['industries_to_show'])) {
        //     $data['industries_to_show'] = json_encode($data['industries_to_show']);
        // }

        // if (isset($data['technologies_to_show'])) {
        //     $data['technologies_to_show'] = json_encode($data['technologies_to_show']);
        // }

        // if (isset($data['st_testimonials_to_show'])) {
        //     $data['st_testimonials_to_show'] = json_encode($data['st_testimonials_to_show']);
        // }

        // if (isset($data['ht_testimonials_to_show'])) {
        //     $data['ht_testimonials_to_show'] = json_encode($data['ht_testimonials_to_show']);
        // }

        // if (isset($data['achievements_to_show'])) {
        //     $data['achievements_to_show'] = json_encode($data['achievements_to_show']);
        // }



        $keys = ['industries_to_show', 'technologies_to_show', 'st_testimonials_to_show', 'ht_testimonials_to_show', 'achievements_to_show'];

        foreach ($keys as $key) {
            if (isset($data[$key])) {
                $data[$key] = json_encode($data[$key]);
            }
        }



        Page::create($data);



        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Page::getPageDetailsWithMedia(['pages.id' => $id]);

        return view('admin.pages.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Page::getPageDetailsWithMedia(['pages.id' => $id]);
        $mediaFiles = mediaFile::all();

        return view('admin.pages.edit', compact('data', 'mediaFiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $data = $request->except([
            '_token',
            '_method',
            'page_id'
        ]);

        $page = Page::find($id);

        // Slug of seeder based pages, need not to update,
        // as they are created from seeder.
        if ($page->is_system_page == '1') {
            unset($data['slug']);
        }

        $data['is_system_page'] = (isset($request->is_system_page) && $request->is_system_page == 1) ? $request->is_system_page : 0;

        Page::where('id', $id)->update($data);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::where('id', $id)->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page was removed successfully!');
    }


    public function isActive(Request $request)
    {
        if (isset($request)) {
            $id = $request->id;
            $isChecked = $request->isChecked;
            $fieldToUpdate = 'is_active';
            Page::where('id', $id)->update([$fieldToUpdate => $isChecked ? 1 : 0]);
            return response()->json(['message' => ucfirst($request->type) . ' page updated successfully']);
        } else {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }
    }
}
