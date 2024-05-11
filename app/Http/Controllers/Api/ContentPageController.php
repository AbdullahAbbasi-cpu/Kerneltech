<?php

namespace App\Http\Controllers\Api;

use App\Models\ContentPage;
use Illuminate\Http\Request;

class ContentPageController extends Controller
{
    public function termsData(Request $request) {
        $contentPage = ContentPage::where('page_identifier', 'terms-and-condition')->first();
        if ($contentPage) {
            $imagePath = '/uploads/content-pages/' . $contentPage->banner_image;
            $imageUrl = asset($imagePath);
            $responseData = [
                'image_path' => $imageUrl,
                'banner_title' => $contentPage->banner_title,
                'banner_description' => $contentPage->banner_description,
                'content' => $contentPage->content
            ];
            return response()->json($responseData);
        } else {
            return response()->json(['error' => 'Content page not found'], 404);
        }
    }   


    public function privacyData(Request $request) {
        $contentPage = ContentPage::where('page_identifier', 'privacy-policy')->first();
        if ($contentPage) {
            $imagePath = '/uploads/content-pages/' . $contentPage->banner_image;
            $imageUrl = asset($imagePath);
            $responseData = [
                'image_path' => $imageUrl,
                'banner_title' => $contentPage->banner_title,
                'banner_description' => $contentPage->banner_description,
                'content' => $contentPage->content
            ];
            return response()->json($responseData);
        } else {
            return response()->json(['error' => 'Content page not found'], 404);
        }
    } 
    
    public function aboutData(Request $request) {
        $contentPage = ContentPage::where('page_identifier', 'about')->first();
        if ($contentPage) {
            $imagePath = '/uploads/content-pages/' . $contentPage->banner_image;
            $aboutImage1 = '/uploads/content-pages/' . $contentPage->about_image_1;
            $aboutImage2 = '/uploads/content-pages/' . $contentPage->about_image_2;
        
            $responseData = [
                'image_path' => asset($imagePath),
                'banner_title' => $contentPage->banner_title,
                'banner_description' => $contentPage->banner_description,
                'about_image_1' => asset($aboutImage1),
                'about_content_1' => $contentPage->about_content_1,
                'about_image_2' => asset($aboutImage2),
                'about_content_2' => $contentPage->about_content_2,
            ]; 
            return response()->json($responseData);
        } else {
            return response()->json(['error' => 'Content page not found'], 404);
        }
    } 
}
