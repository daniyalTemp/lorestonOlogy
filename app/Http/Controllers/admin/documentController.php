<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\BookImport;
use App\Imports\DocumentImport;
use App\Models\contacts;
use App\Models\documents;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class documentController extends Controller
{
    public function list(Request $request)
    {
        $documents = documents::all();
//        dd($documents);
        return view('back.document.list', compact('documents'));
    }

    public function add(Request $request)
    {
        return view('back.document.form');
    }

    public function edit(Request $request, int $id)
    {
        $document = documents::find($id);
        $mainContacts=contacts::all();
        return view('back.document.form', compact('document' , 'mainContacts'));

    }

    public function addSave(Request $request, int $id)
    {

//        dd($request->all());


        if ($id == -1) {
            $document = documents::create([
                'document_id' => $request->document_id,
                'author' => $request->author,
                'collection' => $request->collection,
                'replication_status' => $request->replication_status,
                'language' => $request->language,
                'appearance_characteristics' => $request->appearance_characteristics,
                'start_finish_version' => $request->start_finish_version,
                'sources_work' => $request->sources_work,
                'uncontrolled_subjects' => $request->uncontrolled_subjects,
                'maintenance_center' => $request->maintenance_center,
                'country' => $request->country,
                'city' => $request->city,
                'version_recovery_number' => $request->version_recovery_number,
                'Replication_specification_note' => $request->Replication_specification_note,
                'note' => $request->notes,
                'general_note' => $request->general_note,
                'other' => $request->other,
                'image' => $request->image ? $request->image : '',
            ]);
        } else {

            $document = documents::find($id);
            $document->image = $request->image ? $request->image : '';
            $document->document_id = $request->document_id ? $request->document_id : '';;
            $document->author = $request->author ? $request->author : '';;
            $document->collection = $request->collection ? $request->collection : '';;
            $document->replication_status = $request->replication_status ? $request->replication_status : '';;
            $document->language = $request->language ? $request->language : '';;
            $document->appearance_characteristics = $request->appearance_characteristics ? $request->appearance_characteristics : '';;
            $document->start_finish_version = $request->start_finish_version ? $request->start_finish_version : '';;
            $document->sources_work = $request->sources_work ? $request->sources_work : '';;
            $document->uncontrolled_subjects = $request->uncontrolled_subjects ? $request->uncontrolled_subjects : '';;
            $document->maintenance_center = $request->maintenance_center ? $request->maintenance_center : '';;
            $document->country = $request->country ? $request->country : '';;
            $document->city = $request->city ? $request->city : '';;
            $document->version_recovery_number = $request->version_recovery_number ? $request->version_recovery_number : '';;
            $document->Replication_specification_note = $request->Replication_specification_note ? $request->Replication_specification_note : '';;
            $document->note = $request->notes ? $request->notes : '';;
            $document->general_note = $request->general_note ? $request->general_note : '';;
            $document->other = $request->other ? $request->other : '';;
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


    public function detach(Request $request, int $id, int $userid)
    {

        $document = documents::find($id);
        if ($document) {
            $document->Contacts()->detach([$userid]);
        }
        return redirect()->route('dashboard.document.edit', $id);
    }

    public function attach(Request $request, int $id, int $userid)
    {


        $document = documents::find($id);
        $ids = $document->Contacts()->pluck('contact_id')->toArray();

//        dd($ids);
        if (in_array($userid, $ids)) {
            return redirect()->route('dashboard.document.edit', $id);
        }
//        if ()
        if ($document) {
            $document->Contacts()->attach([$userid]);
        }
        return redirect()->route('dashboard.document.edit', $id);
    }

    public function import(Request $request)
    {
        if ($request->files->count() > 0) {
            if ($request->file('exelFile')->getClientOriginalExtension() == 'xlsx') {
                //import exel
                $request->file('exelFile')->move(storage_path('app/public/exelFiles/'), $request->file('exelFile')->getClientOriginalName());

                Excel::import(new DocumentImport,storage_path('app/public/exelFiles/'. $request->file('exelFile')->getClientOriginalName()));
            }
        }
        return redirect()->route('dashboard.document.list');

    }


}
