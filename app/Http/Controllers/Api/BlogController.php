<?php

namespace App\Http\Controllers\Api;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogData(Request $request) {
        $blogs = Blog::where('is_active', 1)->get();
        if($blogs->isNotEmpty()) {
            $blogs->transform(function ($blog) {
                $imagePath = '/uploads/blogs/' . $blog->featured_image;
                $imageUrl = asset($imagePath);
                $blog->featured_image_url = $imageUrl;
                return $blog;
            });
            return response()->json($blogs);
        } else {
            return response()->json(['Message' => 'No Blogs Record found.']);
        }
    } 

    public function markDownCreation(){

        $directoryPath = base_path("/kt-vue/content/articles/");
        File::cleanDirectory($directoryPath);

        $blogs = Blog::where('is_active', 1)->get();
        if($blogs->isNotEmpty()) {
            $blogs->transform(function ($blog) {
                $imagePath = '/uploads/blogs/' . $blog->featured_image;
                $authorPath = '/uploads/blogs/' . $blog->author_picture;
                $imageUrl = asset($imagePath);
                $authorUrl = asset($authorPath);
                $slug = Str::slug($blog->title, '-');
                $blog->featured_image_url = $imageUrl;
                $blog->author_picture_url = $authorUrl;
                $blog->more_to_read_date = $blog->created_at->format('M d, Y');
                $blog->slug = $slug;


                $markdownContent = "---\n";
                $markdownContent .= "author:\n";
                $markdownContent .= "  name: " . $blog->author_name . "\n";
                $markdownContent .= "  bio: " . $blog->author_description . "\n";
                $markdownContent .= "  image: " . $blog->author_picture_url . "\n\n\n";
                $markdownContent .= "title: \"" . $blog->title . "\"\n";
                $markdownContent .= "slug: \"" . $blog->slug . "\"\n";
                $markdownContent .= "img: " . $blog->featured_image_url . "\n";
                $markdownContent .= "description: \"" . $blog->description . "\"\n";
                $markdownContent .= "published_date: " . $blog->created_at->format('M d, Y') . "\n";
                $markdownContent .= "categories:\n";
                $markdownContent .= " - " . $blog->category . "\n";
                // foreach ($blog->category as $singleCategory) {
                //     $markdownContent .= "  - " . $singleCategory . "\n";
                // }
                $markdownContent .= "---\n\n";

                $filePath = base_path("/kt-vue/content/articles/$slug.md");
                File::put($filePath, $markdownContent);

                return $blog;
            });
            return response()->json($blogs);
        } else {
            return response()->json(['Message' => 'No Blogs Record found.']);
        }
    }

    public function allCategories(){
        $categories = Blog::where('is_active', 1)->pluck('category');
        if($categories->isNotEmpty()) {
            return response()->json($categories);
        } else {
            return response()->json(['Message' => 'No Blogs Record found.']);
        }
    }
}
