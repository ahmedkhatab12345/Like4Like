<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkRequest;
use App\Models\Work;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Storage;
class WorkController extends Controller
{
    use UploadTrait;
    public function index()
    {
        $works = Work::all();
        return view('dashboard.works.index',compact('works'));
    }

    public function create()
    {
        $works = Work::all();
        return view('dashboard.works.create',compact('works'));
    }

    
    public function store(WorkRequest $request)
{
    try {
        // حفظ الصورة
        $file_name = $this->saveImage($request->photo, 'images/dashboard/works');

        // جلب البيانات من الطلب
        $worksData = $request->only(['description', 'link']);

        // إنشاء عمل جديد
        $work = Work::create([
            'description' => $worksData['description'],
            'link' => $worksData['link'],
            'photo' => $file_name,
        ]);

        // إعادة توجيه المستخدم وعرض رسالة نجاح
        return redirect()->route('works.index')->with('success', 'تم إضافة العمل بنجاح.');

    } catch (\Exception $e) {
        // إعادة توجيه المستخدم وعرض رسالة خطأ
        return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة العمل: ' . $e->getMessage())->withInput();
    }

}


    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $works = Work::find($id);
        if (!$works) {
            return redirect()->route('works.index')->with(['error' => 'هزا العمل غير متاح']);
        }

        return view('dashboard.works.edit', compact('works'));
    }

    public function update(Request $request, $id)
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
    
            return redirect()->route('works.index')->with('success', 'تم تحديث العمل بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث العمل: ' . $e->getMessage())->withInput();
        }
    }
    

    
    public function destroy(string $id)
    {
        $works = Work::destroy($id);

        if ($works) {
            return redirect()->route('works.index')->with('success', 'تم الحزف بنجاح');
        } else {
            return redirect()->route('works.index')->with('error', 'يود مشكله في عمليه الحزف برجاء اعاده المحاوله ف وقت لاحق');
        }
    }
}
