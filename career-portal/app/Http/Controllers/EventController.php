<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public static $UPLOAD_DIR = "storage/events/";

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
        $events = Event::all();
        return view('backend.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('title', 'short_description', 'description', 'event_date');
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
        Event::create($data);
        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('backend.events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('backend.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->only('title', 'short_description', 'description', 'event_date');
        if($request->has('is_active')){
            $data['is_active'] = true;
        }
        else{
            $data['is_active'] = false;
        }
        if ($request->hasFile('thumbnail')) {
            $this->deleteFile($event->thumbnail);
            $file_name = $this->uploadFile($request->thumbnail);
            $data['thumbnail'] = $file_name;
        }
        $event->update($data);
        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Event $event)
    {
        $this->deleteFile($event->thumbnail);
        $event->delete();
        return redirect()->route('admin.events.index');
    }
}
