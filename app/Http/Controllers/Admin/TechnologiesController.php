<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Technologies;
use App\Http\Requests\Admin\StoreTechnologiesRequest;
use App\Http\Requests\Admin\UpdateTechnologiesRequest;


class TechnologiesController extends Controller
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
     
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Technologies::orderBy('created_at', 'desc')->get();
        return view('admin.technologies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologiesRequest $request)
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
            $filename      = 'technology-image-'.time() . '.' . $extension;
            $file->move(uploadsDir('technologies'), $filename);
            $data['image'] = $filename;
            $imageFileName = $filename;
        }
        $Banner = technologies::create([
            'title' => $request->title,
            'image' => $imageFileName,
            'is_active' => $request->is_active,
        ]);
        return redirect()
            ->route('admin.technologies.index')
            ->with('success', 'technologies has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Technology = technologies::where('id',$id)->first();
        return view('admin.technologies.show', compact('Technology'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = technologies::find($id);
        return view('admin.technologies.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologiesRequest $request, string $id)
    {
        $imageFileName = '';
        if ($request->hasFile('image')) {
            $file          = $request->file('image');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'technology-img-'.time() . '.' . $extension;
            $file->move(uploadsDir('technologies'), $filename);
            $data['image'] = $filename;
            $imageFileName = $filename;
        }
        $Technology = technologies::where('id', $id)->first();
        if ($Technology) {
            $updateData = [
                'title' => $request->title,      
                'is_active' => $request->is_active,
            ];

            if ($imageFileName !== '') {
                $updateData['image'] = $imageFileName;
            }



            $Technology->update($updateData);
        }


        return redirect()
            ->route('admin.technologies.index')
            ->with('success', 'Technology has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = technologies::find($id);
        
       if ($data) {
            if ($data->image != '' && file_exists(uploadsDir('technologies') . $data->image)) {
                unlink(uploadsDir('technologies') . $data->image);
            }
            technologies::where('id', $id)->delete();
        } 

        return redirect()
            ->route('admin.technologies.index')
            ->with('success', 'Technology was removed successfully!');
    }

    public function isActive(Request $request)
    {           
        if (isset($request)) {
            $id = $request->id;
            $isChecked = $request->isChecked;
            $fieldToUpdate = 'is_active';
            technologies::where('id', $id)->update([$fieldToUpdate => $isChecked ? 1 : 0]);
            return response()->json(['message' => ucfirst($request->type) . ' page updated successfully']);
        } else {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }        
    }
}
