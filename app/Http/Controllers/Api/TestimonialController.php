<?php

namespace App\Http\Controllers\Api;

use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialController extends Controller
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
        $testimonials = Testimonials::where('is_active', 1)->get();
        if($testimonials->isNotEmpty()) {
            $testimonials->transform(function ($testimonial) {
                $testimonial->description = strlen($testimonial->description) > 186 ? substr($testimonial->description, 0, 186) . '...' : $testimonial->description;
                return $testimonial;
            });
            $testimonials->transform(function ($testimonial) {
                $imagePath = '/uploads/testimonials/' . $testimonial->image;
                $imageUrl = asset($imagePath);
                $testimonial->testimonial_image_url = $imageUrl;
                return $testimonial;
            });
            $testimonials = $testimonials->toArray();            
            return response()->json($testimonials);
        } else {
            return response()->json(['Message' => 'No Testimonial Record found.']);
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
