<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    use UploadTrait;

    public function index(){
        $works = Work::all();
        return view('webSite.work.index',compact('works'));
    }

    public function facebook(){
        $works = Work::where(['type'=>'facebook'])->get();
        return view('webSite.work.facebook',compact('works'));
    }


// public function facebook()
// {
//     $works = Work::where(['type' => 'facebook'])
//                 ->whereDate('created_at', Carbon::today())
//                 ->take(10)
//                 ->get();

//     return view('webSite.work.facebook', compact('works'));
// }


    public function faceStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'photo.required' => 'برجاء ادخال صورة الشاشه',
            'photo.image' => 'صوره غير صالحه',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images\dashboard\works');
            }
            $work = Work::create([
                'photo' => $file_name ?? null,
            ]);

        return redirect()->back()->with('success', 'تمت المهمه بنجاح.');

    }

    public function youtube(){
        $works = Work::where(['type'=>'youtube'])->get();
        return view('webSite.work.youtube',compact('works'));
    }

    public function youtStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'photo.required' => 'برجاء ادخال صورة الشاشه',
            'photo.image' => 'صوره غير صالحه',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images\dashboard\works');
            }
            $work = Work::create([
                'photo' => $file_name ?? null,
            ]);

        return redirect()->back()->with('success', 'تمت المهمه بنجاح.');

    }


//     public function showLinks()
// {
//     $links = Link::whereDate('created_at', Carbon::today())->take(10)->get();
//     return view('links.index', compact('links'));
// }


// public function decreaseCount($id)
// {
//     $link = Link::find($id);
//     if ($link) {
//         $link->decrement('remaining_count');
//         return redirect()->back()->with('success');
//     }
//     return redirect()->back()->with('error');
// }




//in view
// @foreach($links as $link)
//     <div>
//         <a href="{{ route('decreaseCount', $link->id) }}">{{ $link->name }}</a>
//         <span>العدد المتبقي: {{ $link->remaining_count }}</span>
//     </div>
// @endforeach
}
