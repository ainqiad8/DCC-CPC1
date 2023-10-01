<?php

namespace App\Http\Controllers;

use App\Models\CoverLetter;
use Illuminate\Http\Request;

class CoverletterController extends Controller
{
   public static $UPLOAD_DIR="storage/coverletters/";

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
    public function index()
    {
        $coverletters=Coverletter::all();
        return view('backend.coverletters.index',compact('coverletters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coverletters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->only('title','version');
        if ($request->hasFile('file')) {
            $filename=$this->uploadFile($request->file('file'));
            $data['file']=$filename;


        }
        if($request->has('is_active')){
            $data['is_active']=true;

        }
        else{
            $data['is_active']=false;
        }
        CoverLetter::Create($data);

        return redirect() ->route('admin.coverletters.index')
        ->with('success', 'file created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coverletter $coverletter)
    {
        return view('backend.coverletters.show',compact('coverletter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coverletter $coverletter)
    {
        return view('backend.coverletters.edit',compact('coverletter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coverletter $coverletter)
    {
        $data=$request->only('title','version');
        if ($request->hasFile('file')) {
            $this->deleteFile($coverletter->file);
            $filename=$this->uploadFile($request->file('file'));
            $data['file']=$filename;


        }
        if($request->has('is_active')){
            $data['is_active']=true;

        }
        else{
            $data['is_active']=false;
        }

        $coverletter->update($data);

        return redirect()->route('admin.coverletters.index')
            ->with('success', 'file created successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coverletter $coverletter)
    {
        $this->deleteFile($coverletter->file);
        $coverletter->delete();
        return redirect()->route('admin.coverletters.index');
    }
}
