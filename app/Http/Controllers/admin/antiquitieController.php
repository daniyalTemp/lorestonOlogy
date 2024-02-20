<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\DocumentImport;
use App\Models\antiquitie;
use App\Models\antiquitiesTypes;
use App\Models\contacts;
use App\Models\documents;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class antiquitieController extends Controller
{
    public function list(Request $request)
    {
        $antiquities = antiquitie::all();
//        dd($antiquities[0]->Types()->get()->first()->name);
//        dd($documents);
        return view('back.antiquities.list', compact('antiquities'));
    }

    public function add(Request $request)
    {
        $types = antiquitiesTypes::all();
        return view('back.antiquities.form',compact('types'));
    }

    public function edit(Request $request, int $id)
    {
        $types = antiquitiesTypes::all();

        $antiquitie = antiquitie::find($id);
        $mainContacts = contacts::all();
        return view('back.antiquities.form', compact('antiquitie', 'mainContacts' , 'types'));

    }

    public function addSave(Request $request, int $id)
    {

//        dd($request->all());

//dd($request->type_id);
        if ($id == -1) {
            $antiquitie = antiquitie::create([
                'name' => $request->name,
                'address' => $request->address,
                'nationalRegistrationNumber' => $request->nationalRegistrationNumber,
                'nationalRegistrationDate' => $request->nationalRegistrationDate,
                'text' => $request->text,
                'type_id' => $request->type_id,
                'image' => $request->image ? $request->image : '',
            ]);
        } else {

            $antiquitie = antiquitie::find($id);
            $antiquitie->name = $request->name ? $request->name : '';
            $antiquitie->address = $request->address ? $request->address : '';
            $antiquitie->nationalRegistrationNumber = $request->nationalRegistrationNumber ? $request->nationalRegistrationNumber : '';
            $antiquitie->nationalRegistrationDate = $request->nationalRegistrationDate ? $request->nationalRegistrationDate : '';
            $antiquitie->type_id = $request->type_id ? $request->type_id : '';
            $antiquitie->text = $request->text ? $request->text : '';
            $antiquitie->image = $request->image ? $request->image : '';
            $antiquitie->save();
        }
        if ($request->files->count() > 0) {
            $antiquitie->image = $request->file('image')->getClientOriginalName();
            $antiquitie->save();
            $request->file('image')->move(storage_path('app/public/images/antiquities/'), $request->file('image')->getClientOriginalName());
        }

        return redirect()->route('dashboard.antiquities.list');
    }

    public function delete(Request $request, int $id)
    {
        antiquitie::destroy([$id]);
        return redirect()->route('dashboard.antiquities.list');


    }


    public function detach(Request $request, int $id, int $userid)
    {

        $antiquitie = antiquitie::find($id);
        if ($antiquitie) {
            $antiquitie->Contacts()->detach([$userid]);
        }
        return redirect()->route('dashboard.antiquities.edit', $id);
    }

    public function attach(Request $request, int $id, int $userid)
    {


        $antiquitie = antiquitie::find($id);
        $ids = $antiquitie->Contacts()->pluck('contact_id')->toArray();

//        dd($ids);
        if (in_array($userid, $ids)) {
            return redirect()->route('dashboard.antiquities.edit', $id);
        }
//        if ()
        if ($antiquitie) {
            $antiquitie->Contacts()->attach([$userid]);
        }
        return redirect()->route('dashboard.antiquities.edit', $id);
    }

    public function import(Request $request)
    {
        if ($request->files->count() > 0) {
            if ($request->file('exelFile')->getClientOriginalExtension() == 'xlsx') {
                //import exel
                $request->file('exelFile')->move(storage_path('app/public/exelFiles/'), $request->file('exelFile')->getClientOriginalName());

                Excel::import(new DocumentImport, storage_path('app/public/exelFiles/' . $request->file('exelFile')->getClientOriginalName()));
            }
        }
        return redirect()->route('dashboard.antiquities.list');

    }

    public function typeList(Request $request)
    {
        $types = antiquitiesTypes::all();
//        dd($documents);
        return view('back.antiquities.types.list', compact('types'));
    }

    public function typeAdd(Request $request)
    {
        return view('back.antiquities.types.form');
    }

    public function typeEdit(Request $request , int $id)
    {
        $type = antiquitiesTypes::find($id);
        return view('back.antiquities.types.form', compact('type'));    }

    public function typeDelete(Request $request, int $id)
    {
        antiquitiesTypes::destroy([$id]);
        return redirect()->route('dashboard.antiquities.types.list');
    }

    public function typeAddSave(Request $request, int $id)
    {

        if ($id == -1) {
            $type = antiquitiesTypes::create([
                'name' => $request->name,

            ]);
        } else {

            $type = antiquitiesTypes::find($id);
            $type->name = $request->name ? $request->name : '';

            $type->save();
        }


        return redirect()->route('dashboard.antiquities.types.list');
    }

}
