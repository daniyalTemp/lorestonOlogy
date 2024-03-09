<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contacts;
use App\Models\job;
use App\Models\paper;
use App\Models\userTypes;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class contactTypeConteoller extends Controller
{

    public function list(Request $request)
    {
        $types = userTypes::all();
        return view('back.contact.types.list', compact('types'));
    }

    public function add(Request $request)
    {
        return view('back.contact.types.form');
    }


    public function edit(Request $request, int $id)
    {
        $type = userTypes::find($id);
//        dd($type->contacts()->get());
        return view('back.contact.types.form' , compact('type'));
    }

    public function delete(Request $request, int $id)
    {
//        dd($id);
        userTypes::destroy([$id]);
        return redirect()->route('dashboard.contact.listTypes');
    }

    public function addSave(Request $request, int $id)
    {
//        dd($request->all());

        $this->validate($request,
            [
                'name' => 'required',

            ]
            ,
            [
                'name.required' => 'ورود نام  الزامیست',
            ]
        );

        if ($id == -1) {
            userTypes::create([
                'name' => $request->name,

            ]);
            return redirect()->route('dashboard.contact.listTypes');
        } else {
            $type = userTypes::find($id);
            $type->name = $request->name;

            $type->save();

            return redirect()->route('dashboard.contact.listTypes');

        }

        return view('back.contact.types.list');
    }
    public function detach(Request $request, int $id, int $userid)
    {

        $Type = userTypes::find($id);
        if ($Type) {
            $Type->contacts()->detach([$userid]);
        }
        return redirect()->route('dashboard.contact.edit', $userid);
    }
    public function attach(Request $request, int $id, int $userid)
    {

        $Type = userTypes::find($id);
        $ids=$Type->contacts()->pluck('user_id')->toArray();
        if(in_array($userid , $ids)){
            return redirect()->route('dashboard.contact.edit', $userid);
        }
        if ($Type) {
            $Type->contacts()->attach([$userid]);
        }
        return redirect()->route('dashboard.contact.edit', $userid);
    }


}
