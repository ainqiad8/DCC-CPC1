<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarouselRequest;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public static $UPLOAD_DIR = "storage/carousels/";

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
        $carousels = Carousel::all();
        return view('backend.carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.carousels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselRequest $request)
    {
        // dd($request->all());
        $data = $request->only('caption');
        $data['is_active'] = $request->has('is_active') ? true : false;
        if ($request->hasFile('image')) {
            $file_name = $this->uploadFile($request->image);
            $data['image'] = $file_name;
        }
        Carousel::create($data);
        return redirect()->route('admin.carousels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        return view('backend.carousels.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        return view('backend.carousels.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarouselRequest $request, Carousel $carousel)
    {
        $data = $request->only('caption');
        $data['is_active'] = $request->has('is_active') ? true : false;
        if ($request->hasFile('image')) {
            $this->deleteFile($carousel->image);
            $file_name = $this->uploadFile($request->image);
            $data['image'] = $file_name;
        }
        $carousel->update($data);
        return redirect()->route('admin.carousels.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Carousel $carousel)
    {
        $this->deleteFile($carousel->image);
        $carousel->delete();
        return redirect()->route('admin.carousels.index');
    }
}
