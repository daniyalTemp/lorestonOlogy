<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contacts;
use App\Models\paper;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class paperController extends Controller
{
    public function list(Request $request)
    {
        $papers = paper::all();
        return view('back.paper.list', compact('papers'));
    }

    public function add(Request $request)
    {
        return view('back.paper.form');
    }

    public function edit(Request $request, int $id)
    {
        $paper = paper::find($id);
        $mainContacts = contacts::all();


//        dd($paper->Contacts()->get());
        return view('back.paper.form', compact('paper','mainContacts'));

    }

    public function addSave(Request $request, int $id)
    {
//        dd($request->all());


        $valRules = [
            'title' => 'required',
            'publication' => 'required',
            'magazine' => 'required',
            'magazineRate' => 'required',
            'year' => 'required|numeric',
            'image' => 'image',

        ];
        $valMassage = [

            'title.required' => 'ورود عنوان الزامیست',
            'publication.required' => 'ورود ناشر الزامیست',
            'magazine.required' => 'ورود مجله الزامیست',
            'magazineRate.required' => 'ورود رتبه مجله الزامیست',
            'year.required' => 'ورود سال  الزامیست',
            'year.numeric' => ' سال  باید عدد باشد ',
            'image.image' => 'عکس ارسالی معتبر نیست',
        ];

        $this->validate($request, $valRules, $valMassage);
//        dd(str_replace('/' , '-' , $request->birthday));
//        dd(Verta::parseFormat('Y/m/d', $request->birthday)->toCarbon()->format('Y.m.d'));

        if ($id == -1) {
            $paper = paper::create([
                'title' => $request->title,
                'publication' => $request->publication,
                'magazine' => $request->magazine,
                'magazineRate' => $request->magazineRate,
                'year' => $request->year,
                'image' => $request->image ? $request->image : '',
            ]);
        } else {
            $paper = paper::find($id);
            $paper->title = $request->title;
            $paper->publication = $request->publication;
            $paper->magazine = $request->magazine;
            $paper->magazineRate = $request->magazineRate;
            $paper->year = $request->year;
            $paper->image = $request->image ? $request->image : $paper->image;
            $paper->save();
        }
        if ($request->files->count() > 0) {
            $paper->image = $request->file('image')->getClientOriginalName();
            $paper->save();
            $request->file('image')->move(storage_path('app/public/images/papers/'), $request->file('image')->getClientOriginalName());
        }

        return redirect()->route('dashboard.paper.list');
    }

    public function delete(Request $request, int $id)
    {
        paper::destroy([$id]);
        return redirect()->route('dashboard.paper.list');

    }

    public function detach(Request $request, int $id, int $userid)
    {

        $paper = paper::find($id);
        if ($paper) {
            $paper->Contacts()->detach([$userid]);
        }
        return redirect()->route('dashboard.paper.edit', $id);
    }
    public function attach(Request $request, int $id, int $userid)
    {


        $paper = paper::find($id);
        $ids=$paper->Contacts()->pluck('contact_id')->toArray();

//        dd($ids);
        if(in_array($userid , $ids)){
            return redirect()->route('dashboard.paper.edit', $id);
        }
//        if ()
        if ($paper) {
            $paper->Contacts()->attach([$userid]);
        }
        return redirect()->route('dashboard.paper.edit', $id);
    }
}
