<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public static $UPLOAD_DIR = "storage/photos/";

    // upload file 

    private function uploadFile($file)
    {
        $date = date('Y-m-d');
        $file_name = $date . '-' . $file->hashName();
        $file->move(self::$UPLOAD_DIR, $file_name);
        return $file_name;
    }

    private function deleteFile($file_name)
    {
        $file_path = self::$UPLOAD_DIR . $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('backend.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoRequest $request)
    {

        if ($request->hasFile('image')) {
            $file_name = $this->uploadFile($request->image);
            $data['image'] = $file_name;
        }
        Photo::create($data);
        return redirect()->route('admin.photos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('backend.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        return view('backend.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {

        if ($request->hasFile('image')) {
            $this->deleteFile($photo->image);
            $file_name = $this->uploadFile($request->image);
            $data['image'] = $file_name;
            $photo->update($data);
        }
        return redirect()->route('admin.photos.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Photo $photo)
    {
        $this->deleteFile($photo->image);
        $photo->delete();
        return redirect()->route('admin.photos.index');
    }
}
