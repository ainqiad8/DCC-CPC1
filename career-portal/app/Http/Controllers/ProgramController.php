<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public static $UPLOAD_DIR = "storage/programs/";

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
        $programs = Program::all();
        return view('backend.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('title', 'short_description', 'description', 'program_date');
        if($request->has('is_active')){
            $data['is_active'] = true;
        }
        else{
            $data['is_active'] = false;
        }
        if ($request->hasFile('thumbnail')) {
            $file_name = $this->uploadFile($request->thumbnail);
            $data['thumbnail'] = $file_name;
        }
        Program::create($data);
        return redirect()->route('admin.programs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('backend.programs.show',compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('backend.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $data = $request->only('title', 'short_description', 'description', 'program_date');
        if($request->has('is_active')){
            $data['is_active'] = true;
        }
        else{
            $data['is_active'] = false;
        }
        if ($request->hasFile('thumbnail')) {
            $this->deleteFile($program->thumbnail);
            $file_name = $this->uploadFile($request->thumbnail);
            $data['thumbnail'] = $file_name;
        }
        $program->update($data);
        return redirect()->route('admin.programs.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Program $program)
    {
        $this->deleteFile($program->thumbnail);
        $program->delete();
        return redirect()->route('admin.programs.index');
    }
}
