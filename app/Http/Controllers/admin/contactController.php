<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\ImortContacts;
use App\Models\contacts;
use App\Models\education;
use App\Models\job;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class contactController extends Controller
{
    public function list(Request $request)
    {
        $contacts = contacts::all();
        return view('back.contact.list', compact('contacts'));
    }

    public function add(Request $request)
    {
        return view('back.contact.form');
    }

    public function edit(Request $request, int $id)
    {
        $contact = contacts::find($id);
//        dd($contact->Documents()->get());
        return view('back.contact.form', compact('contact'));

    }

    public function addSave(Request $request, int $id)
    {
//        dd($request->all());


        $valRules = [
            'Name' => 'required',
//            'email' => 'email',
//            'image' => 'image',

        ];
        $valMassage = [
            'Name.required' => 'ورود نام الزامیست',
            'email.email' => 'ایمیل وارد شده معتبر نیست',
            'image.image' => 'عکس ارسالی معتبر نیست',
        ];

        $this->validate($request, $valRules, $valMassage);
//        dd(str_replace('/' , '-' , $request->birthday));
//        dd(Verta::parseFormat('Y/m/d', $request->birthday)->toCarbon()->format('Y.m.d'));
//        if ($request->has('birthday')) {
//            $date = Verta::parseFormat('Y/m/d', $request->birthday)->toCarbon()->format('Y.m.d');
//        } else {
//            $date = null;
//        }
        if ($id == -1) {
            $contact = contacts::create([
                'Name' => $request->Name,
                'bornIN' => $request->bornIN,

                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'interests' => $request->interests,
                'sex' => $request->sex,
                'type' => $request->type,
                'other' => $request->other,
                'birthday' => $request->birthday ? $request->birthday : null,
                'image' => $request->image ? $request->image : '',
                'congrats' => $request->has('congrats') ? true : false,
            ]);
        } else {
            $contact = contacts::find($id);
            $contact->Name = $request->Name;
//            $contact->lastName = $request->lastName;
            $contact->email = $request->email;
            $contact->image = $request->image ? $request->image : $contact->image;
            $contact->phone = $request->phone;
            $contact->bornIN = $request->bornIN;
            $contact->address = $request->address;
            $contact->type = $request->type;
            $contact->sex = $request->sex;
            $contact->interests = $request->interests;
            $contact->other = $request->other;
            $contact->birthday = $request->birthday ? $request->birthday : null;
            $contact->congrats = $request->has('congrats') ? true : false;
            $contact->save();
        }
        if ($request->files->count() > 0) {
            $contact->image = $request->file('image')->getClientOriginalName();
            $contact->save();
            $request->file('image')->move(storage_path('app/public/images/contacts/'), $request->file('image')->getClientOriginalName());
        }

        return redirect()->route('dashboard.contact.list');
    }

    public function delete(Request $request, int $id)
    {
        contacts::destroy([$id]);
        return redirect()->route('dashboard.contact.list');


    }


    public function showProfile(Request $request, int $id)
    {
        $contact = contacts::find($id);
//        dd($contact->Educations()->get());
        return view('back.contact.profile', compact('contact'));
    }

    public function addEducation(Request $request, int $idUser)
    {
        $contact = contacts::find($idUser);
        return view('back.contact.education.form', compact('contact'));

    }

    public function editEducation(Request $request, int $id)
    {
        $education = education::find($id);
        $contact = $education->contact()->get()[0];
//       dd( $education->contact()->get());
        return view('back.contact.education.form', compact('education', 'contact'));
    }

    public function deleteEducation(Request $request, int $id)
    {

    }

    public function addSaveEducation(Request $request, int $id)
    {

        $this->validate($request,
            [
                'grade' => 'required',
                'major' => 'required',
                'location' => 'required',
                'uni' => 'required',
                'year' => 'required|numeric',


            ]
            ,
            [
                'grade.required' => 'ورود مقطع الزامیست',
                'major.required' => 'ورود رشته الزامیست',
                'uni.required' => 'ورود دانشگاه الزامیست',
                'year.required' => 'ورود سال اخذ الزامیست',
                'year.numeric' => ' سال اخذ باید عدد باشد ',
            ]
        );

        if ($id == -1) {
            education::create([
                'grade' => $request->grade,
                'major' => $request->major,
                'location' => $request->location,
                'uni' => $request->uni,
                'year' => $request->year,
                'contact_id' => $request->contact_id,
            ]);
            return redirect()->route('dashboard.contact.edit', $request->contact_id);
        } else {
            $education = education::find($id);
            $education->grade = $request->grade;
            $education->major = $request->major;
            $education->uni = $request->uni;
            $education->year = $request->year;
            $education->location = $request->location;
            $education->contact_id = $request->contact_id;
            $education->save();

            return redirect()->route('dashboard.contact.edit', $request->contact_id);

        }
    }

    public function addJob(Request $request, int $idUser)
    {
        $contact = contacts::find($idUser);
        return view('back.contact.job.form', compact('contact'));

    }

    public function editJob(Request $request, int $id)
    {
        $job = job::find($id);
        $contact = $job->contact()->get()[0];
//       dd( $education->contact()->get());
        return view('back.contact.job.form', compact('job', 'contact'));
    }

    public function deleteJob(Request $request, int $id)
    {

    }

    public function addSaveJob(Request $request, int $id)
    {

        $this->validate($request,
            [
                'location' => 'required',
                'position' => 'required',
                'duration' => 'required',
                'city' => 'required',
                'contact_id' => 'required',
            ]
            ,
            [
                'location.required' => 'ورود محل خدمت الزامیست',
                'position.required' => 'ورود سمت الزامیست',
                'duration.required' => 'ورود مدت  الزامیست',
                'city.required' => 'ورود شهر خدمت الزامیست',
            ]
        );

        if ($id == -1) {
            job::create([
                'position' => $request->position,
                'duration' => $request->duration,
                'location' => $request->location,
                'city' => $request->city,
                'contact_id' => $request->contact_id,
            ]);
            return redirect()->route('dashboard.contact.edit', $request->contact_id);
        } else {
            $job = job::find($id);
            $job->position = $request->position;
            $job->duration = $request->duration;
            $job->location = $request->location;
            $job->city = $request->city;
            $job->contact_id = $request->contact_id;
            $job->save();

            return redirect()->route('dashboard.contact.edit', $request->contact_id);

        }
    }


    public function import(Request $request)
    {
        if ($request->files->count() > 0) {
            if ($request->file('exelFile')->getClientOriginalExtension() == 'xlsx') {
                //import exel
                $request->file('exelFile')->move(storage_path('app/public/exelFiles/'), $request->file('exelFile')->getClientOriginalName());

                Excel::import(new ImortContacts, storage_path('app/public/exelFiles/' . $request->file('exelFile')->getClientOriginalName()));
            }
        }
        return redirect()->route('dashboard.contact.list');

    }


}
