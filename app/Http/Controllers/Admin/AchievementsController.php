<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Achievements;
use App\Http\Requests\Admin\StoreAchievementsRequest;
use App\Http\Requests\Admin\UpdateAchievementsRequest;

class AchievementsController extends Controller
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
        $data = Achievements::orderBy('created_at', 'desc')->get();
        return view('admin.Achievements.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAchievementsRequest $request)
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
            $filename      = 'achievement-image-'.time() . '.' . $extension;
            $file->move(uploadsDir('achievements'), $filename);
            $data['image'] = $filename;
            $imageFileName = $filename;
        }
        $Banner = achievements::create([
            'title' => $request->title,
            'images' => $imageFileName,
            'is_active' => $request->is_active,
            // 'heading' => $request->heading,

        ]);
        return redirect()
            ->route('admin.achievements.index')
            ->with('success', 'achievement has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Achievement = achievements::where('id',$id)->first();
        return view('admin.achievements.show', compact('Achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = achievements::find($id);
        return view('admin.achievements.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAchievementsRequest $request, string $id)
    {
        $imageFileName = '';
        if ($request->hasFile('image')) {
            $file          = $request->file('image');
            $extension     = $file->getClientOriginalExtension();
            $filename      = 'Achievement-img-'.time() . '.' . $extension;
            $file->move(uploadsDir('achievements'), $filename);
            $data['image'] = $filename;
            $imageFileName = $filename;
        }
        $Achievement = achievements::where('id', $id)->first();
        if ($Achievement) {
            $updateData = [
                'title' => $request->title,
                'heading' => $request->heading,
                'is_active' => $request->is_active,
            ];

            if ($imageFileName !== '') {
                $updateData['images'] = $imageFileName;
            }
            $Achievement->update($updateData);
        }


        return redirect()
            ->route('admin.achievements.index')
            ->with('success', 'Achievement has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = achievements::find($id);
            
           if ($data) {
                if ($data->images != '' && file_exists(uploadsDir('achievements') . $data->images)) {
                    unlink(uploadsDir('achievements') . $data->images);
                }
                achievements::where('id', $id)->delete();
            }
    
            return redirect()
                ->route('admin.achievements.index')
                ->with('success', 'achievement was removed successfully!');
    }
}
