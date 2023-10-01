<?php

namespace App\Http\Controllers;

use App\Models\Cv;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public static $UPLOAD_DIR = "storage/cvs/";
    private function uploadFile($file)
    {
        $date = date('Y-m-d');
        $filename = $date . '-' . $file->hashName();
        $file->move(self::$UPLOAD_DIR, $filename);
        return $filename;
    }
    private function deleteFile($filename)
    {
        $filepath = self::$UPLOAD_DIR . $filename;
        if (file_exists($filepath)) {
            unlink($filepath);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cvs = Cv::all();
        return view('backend.cvs.index', compact('cvs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.cvs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('title', 'version');
        if ($request->hasFile('file')) {
            $filename = $this->uploadFile($request->file('file'));
            $data['file'] = $filename;
        }

        if ($request->has('is_active')) {
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }
        Cv::create($data);

        return redirect()->route('admin.cvs.index')
            ->with('success', 'file created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Cv $cv)
    {
        return view('backend.cvs.show', compact('cv'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cv $cv)
    {
        return view('backend.cvs.edit', compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cv $cv)
    {

        $data = $request->only('title', 'version');
        if ($request->hasFile('file')) {
            $this->deleteFile($cv->file);
            $filename = $this->uploadFile($request->file('file'));
            $data['file'] = $filename;
        }

        if ($request->has('is_active')) {
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }

        $cv->update($data);

        return redirect()->route('admin.cvs.index')
            ->with('success', 'file created successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cv $cv)
    {
        $this->deleteFile($cv->file);
        $cv->delete();
        return redirect()->route('admin.cvs.index');
    }
}
