<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MediaFile;
use App\Http\Requests\Admin\UpdateMediaFileRequest;
use App\Http\Requests\Admin\StoreMediaFileRequest;

class MediaFilesController extends Controller
{
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
        $data = mediaFile::all();

        return view('admin.media-files.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media-files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaFileRequest $request)
    {

        $data = $request->except([
            '_token',
            '_method',
            'file'
        ]);

        //move | upload file on server
        $file             = $request->file('file');
        $extension        = $file->getClientOriginalExtension(); // getting file extension
        $filename         = 'front\media-file-' . time() . '.' . 'webp';
        $convertedImage = convertImage($file, $filename);
        $data['filename'] = $convertedImage->basename;

        mediaFile::create($data);

        return redirect()
            ->route('admin.media-files.index')
            ->with('success', 'Media File has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data = mediaFile::find($id);

        return view('admin.media-files.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mediaFile::find($id);

        return view('admin.media-files.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaFileRequest $request, $id)
    {
        //check file if exists
        if ($request->hasfile('file')) {

            //move | upload file on server
            $file      = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename  = 'front\media-file-' . time() . '.' . 'webp';
            $convertedImage = convertImage($file, $filename);

            //remove/unlink if New uploaded successfully
            if (
                file_exists(uploadsDir('front') . $filename)
                && !empty($request->previous_image && file_exists(uploadsDir('front') . $request->previous_image))
            ) {
                unlink(public_path(uploadsDir('front') . $request->previous_image));
            }
        } else {
            $filename = $request->previous_image;
        }

        $data = $request->except([
            '_token',
            '_method',
            'previous_image',
            'file'
        ]);

        $data['filename'] = $convertedImage->basename;
        mediaFile::where('id', $id)->update($data);

        return redirect()
            ->route('admin.media-files.index')
            ->with('success', 'Media File updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = mediaFile::find($id);

        if ($data->filename != '' && file_exists(uploadsDir('front') . $data->filename)) {
            unlink(uploadsDir('front') . $data->filename);
        }

        mediaFile::where('id', $id)->delete();

        return redirect()
            ->route('admin.media-files.index')
            ->with('success', 'Gallery was removed successfully!');
    }
}
