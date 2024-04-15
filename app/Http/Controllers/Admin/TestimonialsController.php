<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Http\Requests\Admin\StoreTestimonialRequest;
use App\Http\Requests\Admin\UpdateTestimonialRequest;

class TestimonialsController extends Controller
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
        $data = Testimonials::orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->except([
            '_token',
            '_method',
            'image'
        ]);

        // move uploaded file on server.
        $imageFileName = '';
        if ($request->hasFile('image')) {
            $file          = $request->file('image');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'testimonial-img-'.time() . '.' . $extension;
            $file->move(uploadsDir('testimonials'), $filename);
            $data['image'] = $filename;
            $imageFileName = $filename;
        }
        $Testimonial = Testimonials::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageFileName,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);
        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonials has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Testimonial = Testimonials::where('id',$id)->first();
        return view('admin.testimonials.show', compact('Testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Testimonials::find($id);
        return view('admin.testimonials.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, $id)
    {
        $imageFileName = '';
        if ($request->hasFile('image')) {
            $file          = $request->file('image');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'testimonial-img-'.time() . '.' . $extension;
            $file->move(uploadsDir('testimonials'), $filename);
            $data['image'] = $filename;
            $imageFileName = $filename;
        }
        $Testimonial = Testimonials::where('id', $id)->first();
        if ($Testimonial) {
            $updateData = [
                'name' => $request->name,
                'description' => $request->description,       
                'is_active' => $request->is_active,
                'designation' => $request->designation,
            ];

            if ($imageFileName !== '') {
                $updateData['image'] = $imageFileName;
            }



            $Testimonial->update($updateData);
        }


        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Testimonials::find($id);
        
        if ($data) {
            if ($data->image != '' && file_exists(uploadsDir('testimonials') . $data->image)) {
                unlink(uploadsDir('testimonials') . $data->image);
            }
            Testimonials::where('id', $id)->delete();
        } 

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial was removed successfully!');
    }


    public function isActive(Request $request)
    {           
        if (isset($request)) {
            $id = $request->id;
            $isChecked = $request->isChecked;
            $fieldToUpdate = 'is_active';
            Testimonials::where('id', $id)->update([$fieldToUpdate => $isChecked ? 1 : 0]);
            return response()->json(['message' => ucfirst($request->type) . ' page updated successfully']);
        } else {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }        
    }
}
