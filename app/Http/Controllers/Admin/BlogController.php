<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Blog::orderBy('created_at', 'desc')->get();

        return view('admin.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->except([
            '_token',
            '_method',

        ]);

        // move uploaded file on server.
        $FeauturedImageFileName = '';
        if ($request->hasFile('featured_image')) {
            $file          = $request->file('featured_image');

            $extension     = $file->getClientOriginalExtension();
            $path = public_path('uploads/blogs');

            // Check if the directory exists
            if (!file_exists($path)) {
                // Create the directory if it doesn't exist
                mkdir($path, 0777, true);
            }
            $filename      = 'blogs\blog-image-' . time();
            //converted image to webp with compress sizing
            $convertedImage = convertImage($file, $filename, 880, 450, 75);
            // $file->move(uploadsDir('blogs'), $filename);

            $data['featured_image'] = $convertedImage->basename;
            $FeauturedImageFileName = $convertedImage->basename;
        }
        $AuthorImageFileName = '';
        if ($request->hasFile('author_picture')) {
            $file          = $request->file('author_picture');
            $extension     = $file->getClientOriginalExtension();
            $path = public_path('uploads/blogs');
            if (!file_exists($path)) {
                // Create the directory if it doesn't exist
                mkdir($path, 0777, true);
            }
            $filename      = 'blogs\blog-image-' . time() + 1;
            // $file->move(uploadsDir('blogs'), $filename);
            //converted image to webp with compress sizing
            $convertedImage = convertImage($file, $filename, 80, 80, 75);
            $data['author_picture'] = $convertedImage->basename;
            $AuthorImageFileName = $convertedImage->basename;
        }

        // dd($FeauturedImageFileName, $AuthorImageFileName);
        Blog::create([
            'title' => $request->title,
            'featured_image' => $FeauturedImageFileName,
            'author_picture' => $AuthorImageFileName,
            'author_name' => $request->author_name,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'author_description' => $request->author_description,
            'category' => $request->category,

        ]);
        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'blogs has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Blog = Blog::where('id', $id)->first();
        return view('admin.blogs.show', compact('Blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Blog::find($id);
        // dd($data);
        return view('admin.blogs.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, string $id)
    {


        // dd($request->hasFile('image_input'));
        // dd($request->hasFile('auth_image_input'));
        $FeauturedImageFileName = '';
        if ($request->hasFile('featured_image')) {
            $file          = $request->file('featured_image');
            $extension     = $file->getClientOriginalExtension();
            $path = public_path('uploads/blogs');
            if (!file_exists($path)) {
                // Create the directory if it doesn't exist
                mkdir($path, 0777, true);
            }
            $filename      = 'blogs\blog-image-' . time();
            // $file->move(uploadsDir('blogs'), $filename);
            //converted image to webp and compress
            $convertedImage = convertImage($file, $filename, 880, 450, 75);
            $data['featured_image'] = $convertedImage->basename;
            $FeauturedImageFileName = $convertedImage->basename;
        }
        $AuthorImageFileName = '';
        if ($request->hasFile('author_picture')) {
            $file          = $request->file('author_picture');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'blogs\blog-image-' . time() + 1;
            // $file->move(uploadsDir('blogs'), $filename);
            //converted image to webp and compress
            $convertedImage = convertImage($file, $filename, 80, 80, 75);
            $data['author_picture'] = $convertedImage->basename;
            $AuthorImageFileName = $convertedImage->basename;
        }


        $Blogs = Blog::where('id', $id)->first();
        if ($Blogs) {
            $updateData = [
                'title' => $request->title,
                'description' => $request->description,
                'author_description' => $request->author_description,
                'author_name' => $request->author_name,
                'is_active' => $request->is_active,
                'category' => $request->category,
            ];

            if ($FeauturedImageFileName !== '') {
                $updateData['featured_image'] = $FeauturedImageFileName;
            }

            if ($AuthorImageFileName !== '') {
                $updateData['author_picture'] = $AuthorImageFileName;
            }


            $Blogs->update($updateData);
        }


        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Blog::find($id);

        if ($data) {
            if ($data->featured_image != '' && file_exists(uploadsDir('blogs') . $data->featured_image)) {
                if ($data->author_picture != '' && file_exists(uploadsDir('blogs') . $data->author_picture)) {
                    unlink(uploadsDir('blogs') . $data->featured_image);
                    unlink(uploadsDir('blogs') . $data->author_picture);
                } else {

                    unlink(uploadsDir('blogs') . $data->featured_image);
                }
            }
            Blog::where('id', $id)->delete();
        }

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog was removed successfully!');
    }
    public function isActive(Request $request)
    {
        if (isset($request)) {
            $id = $request->id;
            $isChecked = $request->isChecked;
            $fieldToUpdate = 'is_active';
            Blog::where('id', $id)->update([$fieldToUpdate => $isChecked ? 1 : 0]);
            return response()->json(['message' => ucfirst($request->type) . ' page updated successfully']);
        } else {
            return response()->json(['message' => 'Invalid type provided'], 400);
        }
    }
}
