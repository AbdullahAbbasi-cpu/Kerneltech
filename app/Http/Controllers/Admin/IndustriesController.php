<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Industries;
use App\Http\Requests\Admin\StoreIndustriesRequest;
use App\Http\Requests\Admin\UpdateIndustriesRequest;


class IndustriesController extends Controller
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
        $data = Industries::orderBy('created_at', 'desc')->get();
        return view('admin.industries.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.industries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIndustriesRequest $request)
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
            $filename      = 'industry-image-'.time() . '.' . $extension;
            $file->move(uploadsDir('industries'), $filename);
            $data['image'] = $filename;
            $imageFileName = $filename;
        }
        $Banner = industries::create([
            'title' => $request->title,
            'image' => $imageFileName,
            'is_active' => $request->is_active,
        ]);
        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'industry has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Industry = industries::where('id',$id)->first();
        return view('admin.industries.show', compact('Industry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = industries::find($id);
        return view('admin.industries.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIndustriesRequest $request, string $id)
    {
        $imageFileName = '';
        if ($request->hasFile('image')) {
            $file          = $request->file('image');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'industry-img-'.time() . '.' . $extension;
            $file->move(uploadsDir('industries'), $filename);
            $data['image'] = $filename;
            $imageFileName = $filename;
        }
        $Industry = industries::where('id', $id)->first();
        if ($Industry) {
            $updateData = [
                'title' => $request->title,      
                'is_active' => $request->is_active,
            ];

            if ($imageFileName !== '') {
                $updateData['image'] = $imageFileName;
            }



            $Industry->update($updateData);
        }


        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'Industry has been Updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $data = industries::find($id);
        
       if ($data) {
            if ($data->image != '' && file_exists(uploadsDir('industries') . $data->image)) {
                unlink(uploadsDir('industries') . $data->image);
            }
            industries::where('id', $id)->delete();
        } 

        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'Industry was removed successfully!');
    }

    public function isActive(Request $request)
    {           
        if (isset($request)) {
            $id = $request->id;
            $isChecked = $request->isChecked;
            $fieldToUpdate = 'is_active';
            industries::where('id', $id)->update([$fieldToUpdate => $isChecked ? 1 : 0]);
            return response()->json(['message' => ucfirst($request->type) . ' page updated successfully']);
        } else {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }        
    }
}
