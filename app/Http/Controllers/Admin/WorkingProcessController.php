<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\WorkingProcess;
use App\Http\Requests\Admin\StoreWorkingProcessRequest;

class WorkingProcessController extends Controller
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
     */
    public function index()
    {
        $data = WorkingProcess::orderBy('created_at', 'desc')->get();
        return view('admin.working-process.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.working-process.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkingProcessRequest $request)
    {
        // $another = [];
        // dd($request->all());

        $data = $request->except([
            '_token',
            '_method',
        ]);

        // if($request->has('heading')) {
        //     $heading = $request->input('heading');
        // }
        // if($request->has('description')) {
        //     $description = $request->input('description');
        // }
        // if($request->has('is_active')) {
        //     $isActive = $request->input('is_active');
        // }
        // if($request->has('no_of_steps')) {
        //     $isActive = $request->input('is_active');
        // }

        if (isset($request)) {
            $heading = $request->input('heading');
            $description = $request->input('description');
            $isActive = $request->input('is_active');
            $noOfSteps = $request->input('no_of_steps');
        }




        for ($i = 1; $i <= 6; $i++) {
            $imageKey = 'image_' . $i;
            $titleKey = 'title_' . $i;
            $descriptionKey = 'description_' . $i;

            if ($request->hasFile($imageKey)) {
                $file = $request->file($imageKey);
                $extension = $file->getClientOriginalExtension();
                $filename = 'working-process\working-process-image-' . $i . '-' . time() . '.' . 'webp';
                // $file->move(uploadsDir('working-process'), $filename);
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



        WorkingProcess::create([
            'heading' => $heading ?? null,
            'description' => $description ?? null,
            'is_active' => $isActive ?? 0,
            'no_of_steps' => $noOfSteps ?? 0,
            'image_1' => $imageFileName_1 ?? null,
            'title_1' => $title_1 ?? null,
            'description_1' => $description_1 ?? null,
            'image_2' => $imageFileName_2 ?? null,
            'title_2' => $title_2 ?? null,
            'description_2' => $description_2 ?? null,
            'image_3' => $imageFileName_3 ?? null,
            'title_3' => $title_3 ?? null,
            'description_3' => $description_3 ?? null,
            'image_4' => $imageFileName_4 ?? null,
            'title_4' => $title_4 ?? null,
            'description_4' => $description_4 ?? null,
            'image_5' => $imageFileName_5 ?? null,
            'title_5' => $title_5 ?? null,
            'description_5' => $description_5 ?? null,
            'image_6' => $imageFileName_6 ?? null,
            'title_6' => $title_6 ?? null,
            'description_6' => $description_6 ?? null,
        ]);

        return redirect()
            ->route('admin.working-process.index')
            ->with('success', 'Working Process Record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $WorkingProcess = WorkingProcess::where('id', $id)->first();
        return view('admin.working-process.show', compact('WorkingProcess'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = WorkingProcess::find($id);
        return view('admin.working-process.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $workingProcess = WorkingProcess::findOrFail($id);

        $data = $request->except(['_token', '_method']);
        for ($i = 1; $i <= 6; $i++) {
            if ($request->hasFile("image_$i")) {
                $file = $request->file("image_$i");
                $extension = $file->getClientOriginalExtension();
                $filename = 'working-process\working-process-image-' . $i . '-' . time() . '.' . 'webp';
                // $file->move(uploadsDir('working-process'), $filename);
                $convertedImage = convertImage($file, $filename);
                $data["image_$i"] = $convertedImage->basename;
            }
            $data["title_$i"] = $request->input("title_$i");
            $data["description_$i"] = $request->input("description_$i");
        }

        $workingProcess->update($data);

        return redirect()
            ->route('admin.working-process.index')
            ->with('success', 'Working Process Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = WorkingProcess::find($id);

        if ($data) {
            if ($data->image != '' && file_exists(uploadsDir('working-process') . $data->image)) {
                unlink(uploadsDir('working-process') . $data->image);
            }
            WorkingProcess::where('id', $id)->delete();
        }

        return redirect()
            ->route('admin.working-process.index')
            ->with('success', 'Working Process Record removed successfully!');
    }



    public function isActive(Request $request)
    {
        if (isset($request)) {
            $id = $request->id;
            $isChecked = $request->isChecked;
            $fieldToUpdate = 'is_active';
            WorkingProcess::where('id', $id)->update([$fieldToUpdate => $isChecked ? 1 : 0]);
            return response()->json(['message' => ucfirst($request->type) . ' page updated successfully']);
        } else {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }
    }
}
