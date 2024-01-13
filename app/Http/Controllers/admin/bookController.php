<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\contacts;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function list(Request $request)
    {
        $books = book::all();
        return view('back.book.list', compact('books'));
    }

    public function add(Request $request)
    {
        return view('back.book.form');
    }

    public function edit(Request $request, int $id)
    {
        $book = book::find($id);
        $mainContacts = contacts::all();


//        dd($book->Contacts()->get());
        return view('back.book.form', compact('book','mainContacts'));

    }

    public function addSave(Request $request, int $id)
    {
//        dd($request->all());


        $valRules = [
            'title' => 'required',
            'year' => 'required|numeric',
            'image' => 'image',

        ];
        $valMassage = [

            'title.required' => 'ورود عنوان الزامیست',

            'year.required' => 'ورود سال  الزامیست',
            'year.numeric' => ' سال  باید عدد باشد ',
            'image.image' => 'عکس ارسالی معتبر نیست',
        ];

        $this->validate($request, $valRules, $valMassage);
//        dd(str_replace('/' , '-' , $request->birthday));
//        dd(Verta::parseFormat('Y/m/d', $request->birthday)->toCarbon()->format('Y.m.d'));

        if ($id == -1) {
            $book = book::create([
                'title' => $request->title,
                'other_title' => $request->other_title,
                'uID' => $request->uID,
                'publication' => $request->publication,
                'ISBN' => $request->ISBN,
                'AddedID' => $request->AddedID,
                'congressClassification' => $request->congressClassification,
                'deweyClassification' => $request->deweyClassification,
                'nationalBibliographyNumber' => $request->nationalBibliographyNumber,
                'year' => $request->year,
                'location' => $request->location,
                'frost' => $request->frost,
                'appearance' => $request->appearance,
                'notes' => $request->notes,
                'contents' => $request->contents,
                'Issue' => $request->Issue,
                'image' => $request->image ? $request->image : '',
            ]);
        } else {
            $book = book::find($id);
            $book->title = $request->title;
            $book->other_title = $request->has('other_title')?$request->other_title :null;
            $book->publication = $request->has('publication')?$request->publication :null;
            $book->ISBN = $request->has('ISBN')?$request->ISBN :null;
            $book->uID = $request->has('uID')?$request->uID :null;
            $book->AddedID = $request->has('AddedID')?$request->AddedID :null;
            $book->congressClassification = $request->has('congressClassification')?$request->congressClassification :null;
            $book->deweyClassification = $request->has('deweyClassification')?$request->deweyClassification :null;
            $book->nationalBibliographyNumber = $request->has('nationalBibliographyNumber')?$request->nationalBibliographyNumber :null;
            $book->location = $request->has('location')?$request->location :null;
            $book->frost = $request->has('frost')?$request->frost :null;
            $book->appearance = $request->has('appearance')?$request->appearance :null;
            $book->notes = $request->has('notes')?$request->notes :null;
            $book->contents = $request->has('contents')?$request->contents :null;
            $book->Issue = $request->has('Issue')?$request->Issue :null;
            $book->year = $request->year;
            $book->image = $request->image ? $request->image : $book->image;
            $book->save();
        }
        if ($request->files->count() > 0) {
            $book->image = $request->file('image')->getClientOriginalName();
            $book->save();
            $request->file('image')->move(storage_path('app/public/images/books/'), $request->file('image')->getClientOriginalName());
        }

        return redirect()->route('dashboard.book.list');
    }

    public function delete(Request $request, int $id)
    {
        book::destroy([$id]);
        return redirect()->route('dashboard.book.list');

    }

    public function detach(Request $request, int $id, int $userid)
    {

        $book = book::find($id);
        if ($book) {
            $book->Contacts()->detach([$userid]);
        }
        return redirect()->route('dashboard.book.edit', $id);
    }
    public function attach(Request $request, int $id, int $userid)
    {


        $book = book::find($id);
        $ids=$book->Contacts()->pluck('contact_id')->toArray();

//        dd($ids);
        if(in_array($userid , $ids)){
            return redirect()->route('dashboard.book.edit', $id);
        }
//        if ()
        if ($book) {
            $book->Contacts()->attach([$userid]);
        }
        return redirect()->route('dashboard.book.edit', $id);
    }
}
