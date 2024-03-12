<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function getFacebookLinks()
    {
        $works = Work::where(['type'=>'facebook'])->get();
        return response()->json($works);
    }

    public function getYoutubeLinks()
    {
        $works = Work::where(['type'=>'youtube'])->get();
        return response()->json($works);
    }
    
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
             // حفظ الصورة
             $file_name = $this->saveImage($request->photo, 'images/dashboard/works');

             $worksData = $request->only(['description', 'link', 'type']);
 
             $work = Work::create([
                 'description' => $worksData['description'],
                 'link' => $worksData['link'],
                 'photo' => $file_name,
                 'type' => $worksData['type'], // إضافة النوع هنا
             ]);
            return response()->json(['message' => 'Work added successfully', 'work' => $work], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while adding the work', 'message' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $work = Work::findOrFail($id);
    
            // Check if a new photo is uploaded
            if ($request->hasFile('photo')) {
                // Save new photo
                $file_name = $this->saveImage($request->photo, 'images/dashboard/works');
    
                // Delete old photo if exists
                if ($work->photo) {
                    Storage::delete('images/dashboard/works/' . $work->photo);
                }
            } else {
                $file_name = $work->photo; // Keep the existing photo
            }
    
            // Update work with new photo, description, and link
            $work->update([
                'description' => $request->description,
                'link' => $request->link, // Update the link
                'photo' => $file_name,
            ]);
            return response()->json(['message' => 'Work updated successfully', 'work' => $work], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the work', 'message' => $e->getMessage()], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $work = Work::findOrFail($id);
            $deleted = $work->delete();
    
            if ($deleted) {
                return response()->json(['message' => 'Work deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete work'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the work', 'message' => $e->getMessage()], 500);
        }
    
    }
}