<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\documents;
use Illuminate\Http\Request;

class documentController extends Controller
{
    public function list(Request $request)
    {
        $documents = documents::all();
        return view('back.document.list', compact('documents'));
    }

    public function add(Request $request)
    {
        return view('back.document.form');
    }

    public function edit(Request $request, int $id)
    {
        $document = documents::find($id);

        return view('back.document.form', compact('document'));

    }

    public function addSave(Request $request, int $id)
    {


        $valRules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email',
            'image' => 'image',

        ];
        $valMassage = [
            'firstName.required' => 'ورود نام الزامیست',
            'lastName.required' => 'ورود نام الزامیست',
            'email.email' => 'ایمیل وارد شده معتبر نیست',
            'image.image' => 'عکس ارسالی معتبر نیست',
        ];

        $this->validate($request, $valRules, $valMassage);
//        dd(str_replace('/' , '-' , $request->birthday));
//        dd(Verta::parseFormat('Y/m/d', $request->birthday)->toCarbon()->format('Y.m.d'));
        if ($request->has('birthday')) {
            $date = Verta::parseFormat('Y/m/d', $request->birthday)->toCarbon()->format('Y.m.d');
        }
        else{
            $date=null;
        }
        if ($id == -1) {
            $document = documents::create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $date,
                'image' => $request->image ? $request->image : '',
            ]);
        } else {
            $document = documents::find($id);
            $document->firstName = $request->firstName;
            $document->lastName = $request->lastName;
            $document->email = $request->email;
            $document->image = $request->image ? $request->image : '';
            $document->phone = $request->phone;
            $document->address = $request->address;
            $document->birthday =$date;
            $document->save();
        }
        if ($request->files->count() > 0) {
            $document->image = $request->file('image')->getClientOriginalName();
            $document->save();
            $request->file('image')->move(storage_path('app/public/images/documents/'), $request->file('image')->getClientOriginalName());
        }

        return redirect()->route('dashboard.document.list');
    }

    public function delete(Request $request, int $id)
    {
        documents::destroy([$id]);
        return redirect()->route('dashboard.document.list');


    }

}
